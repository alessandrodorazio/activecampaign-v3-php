<?php

namespace Tchury\Tests;


use Tchury\ActiveCampaign\Client;
use PHPUnit\Framework\TestCase;

/**
 * Class ResourceTestCase
 * @package Tchury\Tests
 */
abstract class ResourceTestCase extends TestCase
{

    /**
     * @var Client
     */
    protected $client;

    public function __construct(string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->client = new Client(
            $_ENV['API_URL'],
            $_ENV['API_TOKEN'],
            $_ENV['EVENT_TRACKING_ACTID'],
            $_ENV['EVENT_TRACKING_KEY']
        );
    }

}