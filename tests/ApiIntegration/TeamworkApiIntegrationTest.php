<?php

namespace ChapterThree\TeamworkAPI\Tests\ApiIntegration;

use ChapterThree\TeamworkAPI\TeamworkClient;
use PHPUnit_Framework_TestCase;

/**
 * @group teamwork-api-integration
 */
class TeamworkApiIntegrationTest extends PHPUnit_Framework_TestCase {

    /**
     * @var \ChapterThree\TeamworkAPI\TeamworkClientInterface
     */
    protected $client;

    public function setUp()
    {
        parent::setUp();

        $this->client = TeamworkClient::create([
            'base_uri' => $_SERVER['BASE_URI'],
            'api_token' => $_SERVER['API_TOKEN'],
        ]);
    }

    public function testGetCommand()
    {
        $result = $this->client->Account()->toArray();

        self::assertArraySubset([
            'STATUS' => 'OK'
        ], $result);

        self::assertNotEmpty($result['account']['companyname']);
    }


}
