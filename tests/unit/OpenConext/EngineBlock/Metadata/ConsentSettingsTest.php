<?php

namespace OpenConext\EngineBlock\Metadata;

use PHPUnit_Framework_TestCase;

/**
 * @package OpenConext\EngineBlock\Metadata
 */
class ConsentSettingsTest extends PHPUnit_Framework_TestCase
{
    public function testWorkWithEmptySettings()
    {
        $settings = new ConsentSettings([]);

        $this->assertEmpty($settings->getSpEntityIdsWithoutConsent());
    }

    public function testRequiresConsentByDefault()
    {
        $settings = new ConsentSettings([]);

        $this->assertTrue($settings->isEnabled('test'));
    }

    public function testRequiresDefaultConsentIfTypeIsNotConfigured()
    {
        $settings = new ConsentSettings([]);

        $this->assertFalse($settings->isMinimal('test'));
    }

    public function testCanReadAllServiceProviderEntityIds()
    {
        $settings = new ConsentSettings([
            [
                'name' => 'https://example.org/test1',
                'type' => 'no_consent',
            ],
            [
                'name' => 'https://example.org/test2',
                'type' => 'no_consent',
            ]
        ]);

        $this->assertEquals(
            [
                'https://example.org/test1',
                'https://example.org/test2',
            ],
            $settings->getSpEntityIdsWithoutConsent()
        );
    }

    public function testReadsAllConsentTypeOptions()
    {
        $settings = new ConsentSettings([
            [
                'name' => 'https://example.org/test1',
                'type' => 'default_consent',
            ],
            [
                'name' => 'https://example.org/test2',
                'type' => 'minimal_consent',
            ],
            [
                'name' => 'https://example.org/test3',
                'type' => 'no_consent',
            ]
        ]);

        $this->assertFalse($settings->isMinimal('https://example.org/test1'));
        $this->assertTrue($settings->isEnabled('https://example.org/test1'));

        $this->assertTrue($settings->isMinimal('https://example.org/test2'));
        $this->assertTrue($settings->isEnabled('https://example.org/test2'));

        $this->assertFalse($settings->isMinimal('https://example.org/test3'));
        $this->assertFalse($settings->isEnabled('https://example.org/test3'));
    }

    public function testInterpretsNullConsentTypeAsDefault()
    {
        $settings = new ConsentSettings([
            [
                'name' => 'https://example.org/test1',
                'type' => null,
            ]
        ]);

        $this->assertFalse($settings->isMinimal('https://example.org/test1'));
        $this->assertTrue($settings->isEnabled('https://example.org/test1'));
    }

    public function testHandlesMultilingualExplanations()
    {
        $settings = new ConsentSettings([
            [
                'name' => 'https://example.org/test1',
                'type' => null,
                'explanation:en' => 'English explanation',
                'explanation:nl' => 'Uitleg in het Nederlands',
                'explanation:es' => 'Si señor',
            ]
        ]);

        $this->assertTrue($settings->hasConsentExplanation('https://example.org/test1'));
        $this->assertFalse($settings->hasConsentExplanation('https://bogus.example.org'));

        $this->assertCount(3, $settings->getConsentExplanations('https://example.org/test1'));
        $this->assertCount(0, $settings->getConsentExplanations('https://bogus.example.org'));

        $this->assertTrue($settings->hasConsentExplanationIn('en', 'https://example.org/test1'));
        $this->assertTrue($settings->hasConsentExplanationIn('es', 'https://example.org/test1'));
        $this->assertTrue($settings->hasConsentExplanationIn('nl', 'https://example.org/test1'));
        $this->assertFalse($settings->hasConsentExplanationIn('de', 'https://example.org/test1'));

        $this->assertFalse($settings->hasConsentExplanationIn('jp', 'https://bogus.example.org'));

        $this->assertEquals('English explanation', $settings->getConsentExplanationIn('en', 'https://example.org/test1'));
        $this->assertEquals('Si señor', $settings->getConsentExplanationIn('es', 'https://example.org/test1'));
        $this->assertEquals('Uitleg in het Nederlands', $settings->getConsentExplanationIn('nl', 'https://example.org/test1'));
    }
}
