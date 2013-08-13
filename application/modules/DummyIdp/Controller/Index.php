
<?php
/**
 * SURFconext EngineBlock
 *
 * LICENSE
 *
 * Copyright 2011 SURFnet bv, The Netherlands
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and limitations under the License.
 *
 * @category  SURFconext EngineBlock
 * @package
 * @copyright Copyright © 2010-2011 SURFnet SURFnet bv, The Netherlands (http://www.surfnet.nl)
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 */

require_once ENGINEBLOCK_FOLDER_LIBRARY . 'simplesamlphp/lib/_autoload.php';

class DummyIdp_Controller_Index extends EngineBlock_Controller_Abstract
{
    public function indexAction()
    {
        $samlRequest = $this->decodeSamlRequest($this->getSamlRequest());

        $authNRequestDomElement = $this->authnRequestToDomElement($samlRequest);

        $authnRequest = SAML2_AuthnRequest::fromXML($authNRequestDomElement);

        $samlResponse = $this->factorySaml2PResponse($authnRequest);

        $formHtml = $this->factoryForm($samlResponse);

        $this->setNoRender();
        header('Content-Type: text/html');
        echo $formHtml;
        exit;
    }

    /**
     * @return string
     * @throws Exception
     */
    private function getSamlRequest()
    {
        $samlRequestEncoded = $this->_getRequest()->getQueryParameter('SAMLRequest');
        if (empty($samlRequestEncoded)) {
            throw new Exception('No SAMLRrquest Attribute');
        }

        return $samlRequestEncoded;
    }

    /**
     * @param string $samlRequestEncoded
     * @return string
     */
    private function decodeSamlRequest($samlRequestEncoded)
    {
        return gzinflate(base64_decode($samlRequestEncoded));
    }

    /**
     * @param string $samlRequest
     * @return DOMNode
     */
    private function authnRequestToDomElement($samlRequest)
    {
        $document = new DOMDocument();
        $document->loadXML($samlRequest);
        return $document->getElementsByTagNameNs('urn:oasis:names:tc:SAML:2.0:protocol', 'AuthnRequest')->item(0);
    }

    /**
     * @param int $time
     * @return string
     */
    private function formatTime($time)
    {
        return gmdate('Y-m-d\TH:i:s\Z', $time);
    }

    private function factorySaml2PResponse(
        SAML2_AuthnRequest $authnRequest
    )
    {
        $engineBlockApp = EngineBlock_ApplicationSingleton::getInstance();
        $config = $engineBlockApp->getConfiguration();
        $encryptionConfig = $config->get('encryption')->toArray();

        $sspIdpConfig = array();
        $privateKeyPath = tempnam(sys_get_temp_dir(), 'ssp_private_key');
        file_put_contents($privateKeyPath, $encryptionConfig['key']['private']);
        $sspIdpConfig['privatekey'] = $privateKeyPath;

        $publicKeyPath = tempnam(sys_get_temp_dir(), 'ssp_public_key');
        file_put_contents($publicKeyPath, $encryptionConfig['key']['public']);
        $sspIdpConfig['publickey'] = $publicKeyPath;

        $idpMetadata = new SimpleSAML_Configuration($sspIdpConfig, null);

        $spMetadata = new SimpleSAML_Configuration(array(), null);

        /* $returnAttributes contains the attributes we should return. Send them. */
        $assertion = new SAML2_Assertion();
        $assertion->setIssuer($authnRequest->getIssuer());
        // @todo get this from constant
        $assertion->setNameId(array(
            'Format' => "urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified"
        ));
        $assertion->setNotBefore(time());
        $assertion->setNotOnOrAfter(time() + 5*60);
        $assertion->setValidAudiences(array($authnRequest->getIssuer()));

        // Add a few required attributes
        $returnAttributes = array(
            'urn:mace:dir:attribute-def:uid' => array('johndoe'),
            'urn:mace:terena.org:attribute-def:schacHomeOrganization' => array('example.com'),
        );
        $assertion->setAttributes($returnAttributes);
        $assertion->setAttributeNameFormat(SAML2_Const::NAMEFORMAT_UNSPECIFIED);

        $subjectConfirmation = new SAML2_XML_saml_SubjectConfirmation();
        $subjectConfirmation->Method = SAML2_Const::CM_BEARER;
        $subjectConfirmation->SubjectConfirmationData = new SAML2_XML_saml_SubjectConfirmationData();
        $subjectConfirmation->SubjectConfirmationData->NotOnOrAfter = time() + 5*60;
// @todo set these values
//        $subjectConfirmation->SubjectConfirmationData->Recipient = $endpoint;
        $subjectConfirmation->SubjectConfirmationData->InResponseTo = $authnRequest->getId();
        $assertion->setSubjectConfirmation(array($subjectConfirmation));
        sspmod_saml_Message::addSign($idpMetadata, $spMetadata, $assertion);

        $response = new SAML2_Response();
        $response->setRelayState($authnRequest->getRelayState());
        $response->setDestination($authnRequest->getDestination());
        $response->setIssuer($authnRequest->getIssuer());
        $response->setInResponseTo($authnRequest->getId());
        $response->setAssertions(array($assertion));
        sspmod_saml_Message::addSign($idpMetadata, $spMetadata, $response);

        $samlResponse = $response->toSignedXML();
        $samlResponseXml = $samlResponse->ownerDocument->saveXML($samlResponse);

        return $samlResponseXml;
    }

    /**
     * @param string $samlResponse
     * @return string
     */
    private function factoryForm($samlResponse)
    {
        $samlResponseEncoded = base64_encode($samlResponse);

        $formHtml = <<<FORM_HTML
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <body onload="document.forms[0].submit()">
        <form action="https&#x3a;&#x2f;&#x2f;engine-test.demo.openconext.org&#x2f;authentication&#x2f;sp&#x2f;consume-assertion" method="post">
            <input type="hidden" name="SAMLResponse" value="$samlResponseEncoded"/>
            <input type="submit" value="Continue"/>
        </form>
    </body>
</html>
FORM_HTML;

        return $formHtml;

    }
}
