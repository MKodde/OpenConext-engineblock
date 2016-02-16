<?php

class EngineBlock_Saml2_IdGenerator_Fixture implements EngineBlock_Saml2_IdGenerator
{
    const FIXTURE_FILE = 'tmp/eb-fixtures/saml2/id';

    /**
     * @var \OpenConext\EngineBlockFunctionalTestingBundle\Fixtures\IdFrame
     */
    protected $frame;

    public function __construct()
    {
    }

    public function generate($prefix = 'EB', $usage = EngineBlock_Saml2_IdGenerator::ID_USAGE_OTHER)
    {
        if (!file_exists(ENGINEBLOCK_FOLDER_ROOT . self::FIXTURE_FILE)) {
            $defaultGenerator = new EngineBlock_Saml2_IdGenerator_Default();
            return $defaultGenerator->generate($prefix);
        }

        if (!isset($this->frame)) {
            $this->loadFrame();
        }

        if (!$this->frame->has($usage)) {
            throw new \RuntimeException(
                "Unable to find a fixture for usage '$usage' in the current frame. Frame contents: " .
                print_r($this->frame->getAll(), true)
            );
        }

        return $this->frame->get($usage);
    }

    protected function loadFrame()
    {
        $fixture = new \OpenConext\EngineBlockFunctionalTestingBundle\Fixtures\IdFixture(
            new \OpenConext\EngineBlockFunctionalTestingBundle\Fixtures\DataStore\SerializedDataStore(
                ENGINEBLOCK_FOLDER_ROOT . self::FIXTURE_FILE
            )
        );
        $this->frame = $fixture->shiftFrame();
    }
}
