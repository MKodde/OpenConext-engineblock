<?php

use Doctrine\ORM\EntityManager;
use OpenConext\EngineBlock\Metadata\MetadataRepository\MetadataRepositoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as SymfonyContainerInterface;

class EngineBlock_Application_DiContainer extends Pimple
{
    const ATTRIBUTE_METADATA                    = 'attributeMetadata';
    const ATTRIBUTE_DEFINITIONS_DENORMALIZED    = 'attributeDefinitionsDenormalized';
    const ATTRIBUTE_VALIDATOR                   = 'attributeValidator';

    /**
     * @var SymfonyContainerInterface
     */
    protected $container;

    public function __construct(SymfonyContainerInterface $container)
    {
        $this->registerDenormalizedAttributeDefinitions();
        $this->registerAttributeMetadata();
        $this->registerAttributeValidator();

        $this->container = $container;
    }

    /**
     * @return bool
     */
    public function isDebug()
    {
        return (bool) $this->container->getParameter('debug');
    }

    /**
     * @return string
     */
    public function getHostname()
    {
        return (string) $this->container->getParameter('hostname');
    }

    /**
     * @return array
     */
    public function getPhpSettings()
    {
        return (array) $this->container->getParameter('php_settings');
    }

    /**
     * @return \OpenConext\EngineBlockBridge\Logger\AuthenticationLoggerAdapter
     */
    public function getAuthenticationLogger()
    {
        return $this->container->get('engineblock.bridge.authentication_logger_adapter');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function getSymfonyRequest()
    {
        return $this->container->get('request');
    }

    /**
     * @return EngineBlock_Corto_XmlToArray
     */
    public function getXmlConverter()
    {
        return $this->container->get('engineblock.compat.xml_converter');
    }

    /**
     * @return EngineBlock_Corto_Filter_Command_Factory
     */
    public function getFilterCommandFactory()
    {
        return $this->container->get('engineblock.compat.corto_filter_command_factory');
    }

    /**
     * @return EngineBlock_Database_ConnectionFactory
     */
    public function getDatabaseConnectionFactory()
    {
        return $this->container->get('engineblock.compat.database_connection_factory');
    }

    /**
     * @return EngineBlock_Corto_Model_Consent_Factory
     */
    public function getConsentFactory()
    {
        return $this->container->get('engineblock.compat.corto_model_consent_factory');
    }

    /**
     * It has been done with the check to be backwards compatible. Ideally this would be
     * hidden behind a compatibility layer rather than here and in the consumers of this
     * service, but since this will be removed in the future there is no need to
     * introduce additional code for this particular case.
     *
     * @return Zend_Cache_Backend_Apc
     */
    public function getApplicationCache()
    {
        if ($this->container->has('engineblock.compat.zend.apc_cache')) {
            return $this->container->get('engineblock.compat.zend.apc_cache');
        }

        return null;
    }

    /**
     * @return \OpenConext\EngineBlockBundle\AttributeAggregation\AttributeAggregationClientInterface
     */
    public function getAttributeAggregationClient()
    {
        return $this->container->get('engineblock.attribute_aggregation.client');
    }

    /**
     * @return MetadataRepositoryInterface
     */
    public function getMetadataRepository()
    {
        return $this->container->get('engineblock.metadata.repository.cached_doctrine');
    }

    /**
     * @return \OpenConext\EngineBlockBridge\Authentication\Repository\UserDirectoryAdapter
     */
    public function getUserDirectory()
    {
        return $this->container->get('engineblock.bridge.authentication.user_directory');
    }

    /**
     * @return OpenConext\EngineBlockBundle\Configuration\FeatureConfiguration
     */
    public function getFeatureConfiguration()
    {
        return $this->container->get('engineblock.features');
    }

    /**
     * @return OpenConext\EngineBlockBundle\Authentication\AuthenticationLoopGuard
     */
    public function getAuthenticationLoopGuard()
    {
        return $this->container->get('engineblock.authentication.authentication_loop_guard');
    }

    /**
     * @return OpenConext\EngineBlock\Service\ConsentService
     */
    public function getConsentService()
    {
        return $this->container->get('engineblock.service.consent');
    }

    /**
     * @return EngineBlock_TimeProvider_Interface
     */
    public function getTimeProvider()
    {
        return $this->container->get('engineblock.compat.time_provider');
    }

    /**
     * @return EngineBlock_Saml2_IdGenerator
     */
    public function getSaml2IdGenerator()
    {
        return $this->container->get('engineblock.compat.saml2_id_generator');
    }

    /**
     * Classname to use for Message utilities.
     *
     * @return string
     */
    public function getMessageUtilClassName()
    {
       return 'EngineBlock_Ssp_sspmod_saml_SymfonyRequestUriMessage';
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->container->get('doctrine.orm.engineblock_entity_manager');
    }

    /**
     * @deprecated will be replaced with different (incompatible) system in the future
     */
    private function registerDenormalizedAttributeDefinitions()
    {
        $this[self::ATTRIBUTE_DEFINITIONS_DENORMALIZED] = function() {
            $application = EngineBlock_ApplicationSingleton::getInstance();
            $definitionFile = $application->getConfigurationValue(
                'attributeDefinitionFile',
                ENGINEBLOCK_FOLDER_APPLICATION . 'configs/attributes-v2.2.0.json'
            );
            $definitionFileContent = file_get_contents($definitionFile);
            $definitions = json_decode($definitionFileContent, true);

            $denormalizer = new EngineBlock_Attributes_Definition_Denormalizer();
            return $denormalizer->denormalize($definitions);
        };
    }

    /**
     * @deprecated will be replaced with different (incompatible) system in the future
     */
    public function getDenormalizedAttributeDefinitions()
    {
        return $this[self::ATTRIBUTE_DEFINITIONS_DENORMALIZED];
    }

    /**
     * @deprecated will be replaced with different (incompatible) system in the future
     */
    private function registerAttributeMetadata()
    {
        $this[self::ATTRIBUTE_METADATA] = function(EngineBlock_Application_DiContainer $container) {
            return new EngineBlock_Attributes_Metadata(
                $container->getDenormalizedAttributeDefinitions(),
                EngineBlock_ApplicationSingleton::getInstance()->getLogInstance()
            );
        };
    }

    /**
     * @deprecated will be replaced with different (incompatible) system in the future
     * @return EngineBlock_Attributes_Metadata
     */
    public function getAttributeMetadata()
    {
        return $this[self::ATTRIBUTE_METADATA];
    }

    /**
     * @deprecated will be replaced with different (incompatible) system in the future
     */
    public function registerAttributeValidator()
    {
        $this[self::ATTRIBUTE_VALIDATOR] = function(EngineBlock_Application_DiContainer $container) {
            return new EngineBlock_Attributes_Validator(
                $container->getDenormalizedAttributeDefinitions(),
                new EngineBlock_Attributes_Validator_Factory()
            );
        };
    }

    /**
     * @deprecated will be replaced with different (incompatible) system in the future
     * @return EngineBlock_Attributes_Validator
     */
    public function getAttributeValidator()
    {
        return $this[self::ATTRIBUTE_VALIDATOR];
    }

    public function getCutoffPointForShowingUnfilteredIdps()
    {
        return $this->container->getParameter('wayf.cutoff_point_for_showing_unfiltered_idps');
    }

    public function getRememberChoice()
    {
        return $this->container->getParameter('wayf.remember_choice');
    }

    /**
     * @return object|\Symfony\Component\HttpFoundation\Session\Session
     */
    public function getSession()
    {
        return $this->container->get('session');
    }

    /**
     * @return \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected function getSymfonyContainer()
    {
        return $this->container;
    }

    public function getPdpClient()
    {
        return $this->container->get('engineblock.pdp.pdp_client');
    }

    public function getPdpClientId()
    {
        return $this->container->getParameter('pdp.client_id');
    }

    public function getFunctionalTestingPdpClient()
    {
        return $this->container->get('engineblock.functional_testing.fixture.pdp_client');
    }

    /**
     * @return \OpenConext\EngineBlockBundle\Localization\LocaleProvider
     */
    public function getLocaleProvider()
    {
        return $this->container->get('engineblock.locale_provider');
    }

    /**
     * @return \Zend_Translate
     */
    public function getTranslator()
    {
        return $this->container->get('engineblock.compat.translator');
    }

    /**
     * @return array
     */
    public function getEncryptionKeysConfiguration()
    {
        return $this->container->getParameter('encryption_keys');
    }

    /**
     * @return array
     */
    public function getTrustedProxiesIpAddresses()
    {
        return (array) $this->container->getParameter('trusted_proxies');
    }

    /**
     * @return array
     */
    public function getForbiddenSignatureMethods()
    {
        return (array) $this->container->getParameter('forbidden_signature_methods');
    }

    /**
     * @return bool
     */
    public function isUiOptionReturnToSpActive()
    {
        return (bool) $this->container->getParameter('ui_return_to_sp_link');
    }

    /**
     * @return array
     */
    public function getViewConfiguration()
    {
        return (array) [
            'layout' => $this->container->getParameter('view_default_layout'),
            'title' => $this->container->getParameter('view_default_title'),
            'header' => $this->container->getParameter('view_default_header'),
        ];
    }

    /**
     * @return bool
     */
    public function isConsentStoreValuesActive()
    {
        return (bool) $this->container->getParameter('consent_store_values');
    }

    /**
     * @return array
     */
    public function getEdugainMetadataConfiguration()
    {
        return (array) $this->container->getParameter('edugain');
    }

    /**
     * @return string
     */
    public function getGuestStatusQualifier()
    {
        return (string) $this->container->getParameter('addgueststatus_guestqualifier');
    }

    /**
     * @return string
     */
    public function getOpenConextTermsOfUseUrl()
    {
        return (string) $this->container->getParameter('openconext_terms_of_use');
    }

    /**
     * @return string
     */
    public function getCookiePath()
    {
        return (string) $this->container->getParameter('cookie.path');
    }

    /**
     * @return bool
     */
    public function getCookieUseSecure()
    {
        return (bool) $this->container->getParameter('cookie.secure');
    }

    /**
     * @return array
     */
    public function getEmailIdpDebuggingConfiguration()
    {
        return (array) $this->container->getParameter('email_idp_debugging');
    }

    /**
     * @return string
     */
    public function getProfileBaseUrl()
    {
        return (string) $this->container->getParameter('profile_base_url');
    }
}
