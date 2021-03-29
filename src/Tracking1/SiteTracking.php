<?php

namespace Tchury\ActiveCampaign\Tracking;

use Tchury\ActiveCampaign\Resource;

/**
 * Class SiteTracking
 * @package Tchury\ActiveCampaign\Tracking
 * @see https://developers.activecampaign.com/reference#site-tracking
 */
class SiteTracking extends Resource
{

    /**
     * Get site tracking status (enabled or disabled)
     * @see https://developers.activecampaign.com/reference#retrieve-site-tracking-status
     * @param array $query_params
     * @return string
     */
    public function retrieveStatus(array $query_params = [])
    {
        $req = $this->client
            ->getClient()
            ->get('api/3/siteTracking', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }

}