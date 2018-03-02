<?php

return [
    'suite_name'               => 'SURFconext',
    'organisation_noun'        => 'institution',
    'organisation_noun_plural' => 'institutions',
    'account_noun'             => 'institutional account',

    // Footer
    'serviceprovider_link'  => '<a href="https://www.surfconext.nl/" target="_blank">%suiteName%</a>',
    'terms_of_service_link' => '<a href="https://wiki.surfnet.nl/display/conextsupport/Terms+of+Service+%28EN%29" target="_blank">Terms of Service</a>',

    // Help page
    'help_page_content' => <<<HTML
<h1>Help</h1>
<p>Check the FAQ below if you have any questions about this screen or about SURFconext.</p>

<p>For more detailed information, please visit <a href="https://support.surfconext.nl/">the SURFconext support page</a>
   or contact the SURFconext helpdesk at <a href="mailto:help@surfconext.nl">help@surfconext.nl</a></p>
<div class="results">
    <ul id="faq" class="faq">
        <li class="open">
             <h3>Why this screen?</h3>
             <p>You can log in to this service with your institutional account. In this screen, you select the institution you are affiliated with.</p>
        </li>
        <li>
            <h3>What is SURFconext?</h3>
             <p>SURFconext is a next generation collaboration infrastructure that creates new opportunities to collaborate online based on a combination of federation technology, group management, concepts from social networking and applications from different providers. SURFconext allows you to access online services with the username and password issued to you by your own institution.</p>
        </li>
        <li>
            <h3>How do you login via SURFconext?</h3>
            <ul>
                <li>Click on your institution in this screen.</li>
                <li>You will then be redirected to the log-in page of your institution where you can log in.</li>
                <li>Your institution will notify SURFconext that you have logged in successfully.</li>
                <li>You will be taken to the service for which you have logged in. You can then start using that service.</li>
            </ul>
        </li>
        <li>
            <h3>Is SURFconext secure?</h3>
            <p>Your institution and SURFnet believe that user privacy is extremely important.<br />
            <br />
             Personal details are only provided to a service provider if these details are needed to use the service. Contractual agreements between your institution, SURFconext and the service provider guarantee that your personal details will be handled and processed with care.<br /><br />
If  you ave any questions about your privacy and the policy applied, please visit <a href="https://wiki.surfnet.nl/display/conextsupport/">the SURFconext support page</a> for more information or contact the SURFconext helpdesk at <a href="mailto:help@surfconext.nl">help@surfconext.nl</a>.
            </p>
        </li>
        <li>
            <h3>My institution is not listed. What should I do?</h3>
            <p>If your institution is not listed, then it is either not linked to SURFconext or your institution may not allow access to this particular service. Go back to the page for the service. In some cases, there will be alternative ways of logging in.</p>
        </li>
        <li>
            <h3>My institution does not allow access to the service. What should I do?</h3>
            <p>It is possible that your institution is connected to SURFconext but has not (or not yet) made any arrangements with the service provider about the use of the service. We will forward your request to your institution. Based on your request your institution may consider to add this service to its service portfolio.</p>
        </li>
        <li>
            <h3>I have asked my institution for access but I still cannot get access. Why not?</h3>
            <p>Apparently, your institution has not arranged a license yet or, access to this service is not on the roadmap of your institution. Such decisions are beyond the scope and control of SURFnet.</p>
        </li>
        <li>
            <h3>In my browser I cannot select my institution. What should I do?</h3>
            <p>The dialog box to select your institution can be used in most popular browsers, including Internet Explorer, Firefox, Chrome, and Safari. Other browsers may not be supported. Your browser must support the use of cookies and JavaScript.</p>
        </li>
    </ul>
</div>
HTML
    ,

    // Request Access Form
    'send_confirm_desc'     => '<p>Your request has been forwarded to your %organisationNoun%. Further settlement and decisions on the availability of this service will be taken by the ICT staff of your %organisationNoun%.</p>

    <p>SURFnet has forwarded your request, but the decision and planning to make this service available depends on the ICT policy of your %organisationNoun%.</p>

    <p>If you have any questions about your request, please contact <a href="mailto:help@surfconext.nl">help@surfconext.nl</a></p>',

    // Consent page
    'consent_attribute_source_voot'           => 'Group membership',
    'consent_attribute_source_sab'            => 'SURFnet Autorisatie Beheer',
    'consent_attribute_source_orcid'          => 'ORCID iD',
    'consent_attribute_source_surfmarket_entitlements' => 'SURFmarket entitlements',
    'consent_attribute_source_logo_url_voot'  => 'https://static.surfconext.nl/media/aa/voot.png',
    'consent_attribute_source_logo_url_sab'   => 'https://static.surfconext.nl/media/aa/sab.png',
    'consent_attribute_source_logo_url_orcid' => 'https://static.surfconext.nl/media/aa/orcid.png',
    'consent_attribute_source_logo_url_surfmarket_entitlements' => 'https://static.surfconext.nl/media/aa/surfmarket_entitlements.png',

    // Consent slidein: About SURFconext
    'consent_slidein_about_text'  => <<<'TXT'
<h1>Logging in through %suiteName%</h1>
<img src="/images/about-surfconext.png" alt="%suiteName% diagram"/>
<p>Via %suiteName%, researchers, staff and students can easily and securely log in into various cloud services using their own %accountNoun%. %suiteName% offers extra privacy protection by sending a minimum set of personal data to these cloud services.</p>
<p>Curious about which services already received your information before through %suiteName%? Visit your <a href="%profileUrl%">%suiteName% profile page</a>.</p>

<h1>%suiteName% is part of SURF</h1>
<p>SURF is the collaborative ICT organisation for Dutch education and research.</p>
<p>SURF provides access to the best possible internet and IT facilities to students, teachers and researchers in the Netherlands. Want to know more about SURF? Have a look at the <a href="https://www.surf.nl/" target="_blank">website from SURF</a>.</p>
TXT
    ,

    //Error screens
    'error_help_desc'               => '<p>
        Please visit <a href="https://support.surfconext.nl/" target="_blank">the %suiteName% support pages</a> for help solving this problem. These pages also contain contact information for the support team if the problem persists.
    </p>',
    'error_no_consent_desc'         => 'This application can only be used when you share the mentioned information.<br /><br />

If you want to use this application you have to:<br />
<ul><li>restart your browser</li>
<li>login again</li>
<li>share your information</li></ul>',
    'error_no_idps_desc'            => '<p>
The service you\'re trying to reach (&lsquo;Service Provider&rsquo;) is not accessible through %suiteName%.<br /><br />

Visit <a href="https://wiki.surfnet.nl/x/m69WAw" target="_blank">the %suiteName% support pages</a> for more support, if you think you should have access to this service.
        <br /><br />
    </p>',
    'error_session_lost_desc'       => '<p>
We somehow lost where you wanted to go. Did you wait too long? If so, try again first. Does your browser accept cookies? Are you using an outdated URL or bookmark?<br /><br />
Visit <a href="https://wiki.surfnet.nl/x/jq9WAw" target="_blank">the %suiteName% supportpages</a> for more extensive support on this error.
        <br /><br />
    </p>',

    'error_authorization_policy_violation_desc'       => '<p>
        You have successfully logged in at your %organisationNoun%, but unfortunately you cannot use this service (the &lsquo;Service Provider&rsquo;) because you have no access. Your %organisationNoun% limits access to this service with an <i>authorization policy</i>. Please contact the helpdesk of your %organisationNoun% if you think you should be allowed access to this service.
    </p>',
    'error_unknown_service_provider_desc'     => '<p>
Your requested service couldn\'t be found. Visit <a href="https://wiki.surfnet.nl/x/k69WAw" target="_blank">the %suiteName% supportpages</a> for more extensive support on this error.
    </p>',

    'error_generic_desc'                => '<p>
Your log-in has failed and we don\'t know exactly why. Try again first, and if that doesn\'t work visit <a href="https://wiki.surfnet.nl/x/iq9WAw" target="_blank">the %suiteName% supportpages</a> for more support with this error. On that page you can also find how to contact us if the error persists.
    </p>',
    'error_stuck_in_authentication_loop_desc' => '<p>
        You\'ve successfully authenticated at your Identity Provider but the service you are trying to access sends you back again to %suiteName%. Because you are already logged in, %suiteName% then forwards you back to the service, which results in an infinite black hole. Likely, this is caused by an error at the Service Provider. Visit <a href="https://support.surfconext.nl" target="_blank">the %suiteName% support pages</a> for more extensive support on this error.
    </p>',

    'error_unknown_service_desc'    => '<p>Your requested service couldn\'t be found. Please contact the %suiteName% helpdesk at <a href="mailto:help@surfconext.nl">help@surfconext.nl</a></p>',

    // Logout
    'logout_information_link' => '<a href="https://wiki.surfnet.nl/display/conextsupport/Log+out+SURFconext">More information about secure log out</a>',
];
