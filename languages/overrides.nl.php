<?php

return [
    'suite_name' => 'SURFconext',
    'organisation_noun' => 'instelling',
    'organisation_noun_plural' => 'instellingen',
    'account_noun' => 'instellingsaccount',

    // Footer
    'serviceprovider_link'  => '<a href="https://www.surfconext.nl/" target="_blank">%suiteName%</a>',
    'terms_of_service_link' => '<a href="https://wiki.surfnet.nl/display/conextsupport/Terms+of+Service+%28NL%29" target="_blank">Gebruiksvoorwaarden</a>',

    // Help page
    'help_page_content' => <<<HTML
<h1>Help</h1>
<p><p>Heb je vragen over dit scherm of de SURFconext dienstverlening, bekijk dan de antwoorden bij de FAQ hieronder.</p>

<p>Staat je vraag er niet bij, of ben je niet tevreden met een antwoord? Bezoek dan <a href="https://wiki.surfnet.nl/display/conextsupport/">de SURFconext support pagina</a> of stuur een mail naar <a href="mailto:help@surfconext.nl">help@surfconext.nl</a></p></p>

<div class="results">
    <ul id="faq" class="faq">
        <li class="open">
            <h3>Waarom dit scherm?</h3>
            <p>Je kunt met je instellingsaccount inloggen bij deze dienst. In dit scherm geef je aan via welke instelling je wilt inloggen.</p>
        </li>
        <li>
            <h3>Wat is SURFconext?</h3>
            <p>SURFconext is een verbindingsinfrastructuur die een aantal bouwstenen voor online samenwerking met elkaar verbindt. Die bouwstenen zijn services voor federatieve authenticatie, groepsbeheer, sociale netwerken en cloud applicaties van verschillende aanbieders. Met SURFconext is het mogelijk om met je eigen instellingsaccount toegang te krijgen tot diensten van verschillende aanbieders.</p>
        </li>
        <li>
            <h3>Hoe werkt inloggen via SURFconext?</h3>
            <ul>
                <li>Je selecteert in dit scherm je eigen instelling.</li>
                <li>Je wordt doorgestuurd naar een inlogpagina van je eigen instelling. Daar log je in.</li>
                <li>Je instelling geeft door aan SURFconext dat je succesvol bent ingelogd.</li>
                <li>Je wordt doorgestuurd naar de dienst waarop je hebt ingelogd om deze te gaan gebruiken.</li>
            </ul>
        </li>
        <li>
            <h3>Is de SURFconext infrastructuur veilig?</h3>
            <p>Jouw instelling en SURFnet hechten veel belang aan de privacy van gebruikers.<br /><br />
               Persoonsgegevens worden alleen verstrekt aan een dienstaanbieder wanneer dat noodzakelijk is voor het gebruik van de dienst. Contractuele afspraken tussen jouw instelling, SURFnet en de dienstaanbieder waarborgen dat er zorgvuldig wordt omgegaan met jouw persoonsgegevens.<br /><br />
              Het privacybeleid voor deze dienstverlening is in detail beschreven en na te lezen op <a href="https://wiki.surfnet.nl/display/conextsupport/">de SURFconext support pagina</a>. Heb je vragen ten aanzien van het privacybeleid van SURFconext, mail deze dan naar de SURFconext helpdesk via <a href="mailto:help@surfconext.nl">help@surfconext.nl</a>.
            </p>
        </li>
        <li>
            <h3>Ik zie mijn instelling er niet tussen staan, wat nu?</h3>
            <p>Staat jouw instelling niet in de lijst? Dan is jouw instelling waarschijnlijk nog niet aangesloten op SURFconext. Ga terug naar de pagina van de dienst; soms biedt een dienst ook alternatieve manieren om in te loggen.</p>
        </li>
        <li>
            <h3>Mijn instelling geeft geen toegang tot deze dienst, wat nu?</h3>
            <p>Het kan zijn dat je instelling wel is aangesloten op SURFconext maar (nog) geen afspraken heeft gemaakt met de dienstaanbieder over het gebruik van deze dienst. Wij zullen je verzoek doorsturen naar de verantwoordelijke binnen jouw instelling die de toegang tot diensten organiseert. Wellicht is jouw verzoek voor je instelling aanleiding om alsnog afspraken met deze dienstaanbieder te maken.</p>
        </li>
        <li>
            <h3>Ik heb toegang aangevraagd voor mijn instelling, maar mijn instelling geeft nog steeds geen toegang. Waarom niet?</h3>
            <p>Blijkbaar is jouw instelling nog niet tot een overeenkomst met de dienstaanbieder gekomen of, het gebruik van deze dienst is niet wenselijk binnen jouw instelling. SURFnet heeft geen controle over de snelheid waarmee je antwoord of toegang krijgt. Die verantwoordelijkheid en zeggenschap ligt bij de instelling.</p>
        </li>
        <li>
            <h3>Ik kan in mijn browser mijn instelling niet selecteren, wat nu?</h3>
            <p>Het keuzescherm van SURFconext is te gebruiken in de meest gangbare browsers waaronder, Internet Explorer, Firefox, Chrome en Safari. Andere browsers worden mogelijk niet ondersteund. Verder moet je browser het gebruik van cookies en javascript toestaan.</p>
        </li>
    </ul>
</div>
HTML
    ,

    // Request Access Form
    'send_confirm_desc'     => '<p>SURFnet stuurt je verzoek door aan de juiste persoon binnen jouw %organisationNoun%. Het is aan deze persoon om actie te ondernemen op basis van jouw verzoek. Het kan zijn dat er nog afspraken gemaakt moeten worden tussen jouw %organisationNoun% en de dienstaanbieder.</p>

    <p>SURFnet faciliteert het doorsturen van je verzoek maar heeft geen controle over de snelheid waarmee je antwoord of toegang krijgt.</p>

    <p>Heb je vragen over je verzoek, neem dan contact op met <a href="mailto:help@surfconext.nl">help@surfconext.nl</a></p>',

    // Consent page
    'consent_attribute_source_voot'           => 'Groepslidmaatschap',
    'consent_attribute_source_sab'            => 'SURFnet Autorisatie Beheer',
    'consent_attribute_source_orcid'          => 'ORCID iD',
    'consent_attribute_source_surfmarket_entitlements' => 'SURFmarket entitlements',
    'consent_attribute_source_logo_url_voot'  => 'https://static.surfconext.nl/media/aa/voot.png',
    'consent_attribute_source_logo_url_sab'   => 'https://static.surfconext.nl/media/aa/sab.png',
    'consent_attribute_source_logo_url_orcid' => 'https://static.surfconext.nl/media/aa/orcid.png',
    'consent_attribute_source_logo_url_surfmarket_entitlements' => 'https://static.surfconext.nl/media/aa/surfmarket_entitlements.png',

    // Consent slidein: About SURFconext
    'consent_slidein_about_text'  => <<<'TXT'
<h1>Inloggen met %suiteName%</h1>
<img src="/images/about-surfconext.png" alt="%suiteName% diagram"/>
<p>Via %suiteName% loggen onderzoekers, medewerkers en studenten met hun eigen %accountNoun% veilig en gemakkelijk in bij clouddiensten van verschillende aanbieders. %suiteName% biedt extra privacy-bescherming doordat een minimaal aantal persoonlijke gegevens wordt doorgegeven aan deze clouddiensten.</p>
<p>Zien waar je al eerder toestemming voor hebt gegeven? Bekijk hier je <a href="%profileUrl%" target="_blank">%suiteName% profielpagina</a>.</p>

<h1>%suiteName% is onderdeel van SURF</h1>
<p>SURF is de ICT-samenwerkingsorganisatie van het onderwijs en onderzoek in Nederland.</p>
<p>Dankzij SURF beschikken studenten, docenten en onderzoekers in Nederland over de best mogelijke ICT-voorzieningen voor toponderzoek en talentontwikkeling. Meer weten over SURF? Bekijk hier de <a href="https://www.surf.nl/" target="_blank">website van SURF</a>.</p>

TXT
    ,

    // Error screens
    'error_help_desc'                   => '<p>
        Bezoek <a href="https://support.surfconext.nl/" target="_blank">de %suiteName% support pagina\'s</a> voor ondersteuning bij deze foutmelding. Hier kun je ook vinden hoe je contact kunt opnemen met het supportteam als de fout aanblijft.
    </p>',
    'error_no_consent_desc'             => 'Deze applicatie kan enkel worden gebruikt wanneer de vermelde informatie wordt gedeeld.<br /><br />

Als je deze applicatie wilt gebruiken moet je:<br />
<ul><li>de browser herstarten</li>
<li>opnieuw inloggen</li>
<li>jouw informatie delen</li></ul>',
    'error_no_idps'                     => 'Error - Geen %organisationNounPlural% gevonden',
    'error_no_idps_desc'                => '<p>
        De dienst die je probeert te benaderen (de &lsquo;Service Provider&rsquo;) is niet toegankelijk via de %suiteName%-infrastructuur.<br /><br />
        Bezoek <a href="https://wiki.surfnet.nl/pages/viewpage.action?pageId=54691917" target="_blank">de %suiteName% support pagina\'s</a> voor meer ondersteuning bij deze foutmelding, als je denkt daadwerkelijk toegang te moeten hebben tot deze dienst.
        <br /><br />
    </p>',
    'error_session_lost_desc'           => '<p>
We weten helaas niet waar je heen wilt. Heb je te lang gewacht? Probeer het dan eerst opnieuw. Accepteert je browser wel cookies? Maak je gebruik van een te oude link of bookmark?<br /><br />
Bezoek <a href="https://wiki.surfnet.nl/pages/viewpage.action?pageId=52331093" target="_blank">de %suiteName% support pagina\'s</a> voor meer ondersteuning bij deze foutmelding. Hier kun je ook vinden hoe je contact kunt opnemen met het supportteam als de fout aanblijft.
        <br /><br />
    </p>',

    'error_authorization_policy_violation_desc'       => '<p>
        Je bent succesvol ingelogd bij jouw %organisationNoun%, maar je kunt geen gebruik maken van deze dienst omdat je geen toegang hebt. Voor deze dienst (de &lsquo;Service Provider&rsquo;) heeft jouw %organisationNoun% met <i>autorisatieregels</i> ingesteld dat alleen bepaalde gebruikers toegang krijgen. Neem contact op met de (IT-)servicedesk van je %organisationNoun% als je vindt dat je wel toegang moet hebben.
    </p>',
    'error_unknown_service_provider_desc'     => '<p>
        Er kon geen Service Provider worden gevonden met het opgegeven EntityID.
        Neem contact op met de %suiteName% helpdesk op <a href="mailto:help@surfconext.nl">help@surfconext.nl</a>.
    </p>',
    'error_unknown_issuer_desc'     => '<p>
Je aangevraagde dienst kon niet worden gevonden. Bezoek <a href="https://wiki.surfnet.nl/pages/viewpage.action?pageId=53018683" target="_blank">de %suiteName% support pagina\'s</a> voor meer ondersteuning bij deze foutmelding.
    </p>',
    'error_generic_desc'                => '<p>
Inloggen is niet gelukt en we kunnen je niet precies vertellen waarom. Probeer het eerst eens opnieuw, en bezoek anders <a href="https://wiki.surfnet.nl/pages/viewpage.action?pageId=52331091" target="_blank">de %suiteName% support pagina\'s</a> voor ondersteuning bij deze foutmelding. Hier kun je ook vinden hoe je contact kunt opnemen met het supportteam als de fout aanblijft.
    </p>',
    'error_stuck_in_authentication_loop_desc' => '<p>
        Je bent succesvol ingelogd bij je Identity Provider maar de dienst waar je naartoe wilt stuurt je weer terug naar %suiteName%. Omdat je succesvol bent ingelogd, stuurt %suiteName% je weer naar de dienst, wat resulteert in een oneindig zwart gat. Dit komt waarschijnlijk door een foutje aan de kant van de dienst. Bezoek <a href="https://support.surfconext.nl" target="_blank">de %suiteName% support pagina\'s</a> voor meer ondersteuning bij deze foutmelding.
    </p>',

    'error_unknown_service_desc'    => '<p>Deze dienst is niet bekend. Neem contact op met de %suiteName% helpdesk op <a href="mailto:help@surfconext.nl">help@surfconext.nl</a></p>',

    // Logout
    'logout_information_link' => '<a href="https://wiki.surfnet.nl/display/conextsupport/Uitloggen+%suiteName%">Meer informatie over veilig uitloggen</a>',
];
