<?php

namespace Tchury\ActiveCampaign\Tags;

use Tchury\ActiveCampaign\Resource;

/**
 * Class Tags
 * @package Tchury\ActiveCampaign\Tags
 * @see https://developers.activecampaign.com/reference#tags
 */
class Tags extends Resource
{
    /**
     * @param array $tag
     * @return string
     */
    public function create(array $tag) {
        $req = $this->client
            ->getClient()
            ->post('/api/3/tags', [
                'json' => [
                    'tag' => $tag
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * List all tags
     * @see https://developers.activecampaign.com/reference#retrieve-all-tags
     * @param array $query_params
     * @return string
     */
    public function listAll(array $query_params = [])
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/tags', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }

}
