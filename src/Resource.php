<?php
/**
 * Resource.php
 * Date: 08/01/2019
 * Time: 11:12
 */

namespace Tchury\ActiveCampaign;


class Resource
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * Resource constructor.
     * @param $client Client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

}