<?php

namespace Tchury\Tests;


use Tchury\ActiveCampaign\Client;

/**
 * Class ClientTest
 * @package Tchury\Tests
 */
class ClientTest extends ResourceTestCase
{

    public function testClient()
    {
        $this->assertEquals($_ENV['API_URL'], $this->client->getApiUrl());
        $this->assertEquals($_ENV['API_TOKEN'], $this->client->getApiToken());

        $config = $this->client->getClient()->getConfig();

        $this->assertArrayHasKey(Client::HEADER_AUTH_KEY, $config['headers']);

        $this->assertEquals($_ENV['API_TOKEN'], $config['headers'][Client::HEADER_AUTH_KEY]);
    }

}