<?php
/**
 * EventTrackingTest.php
 * Date: 2019-01-29
 * Time: 17:01
 */

namespace Tchury\Tests\Tracking;


use Tchury\ActiveCampaign\Tracking\EventTracking;
use Tchury\Tests\ResourceTestCase;

class EventTrackingTest extends ResourceTestCase
{

    public function testTrackEvent()
    {
        $tracking = new EventTracking($this->client);
        $track = $tracking
            ->trackEvent(
                'test',
                null,
                null
            );

        $event = json_decode($track, true);
        $this->assertArrayHasKey('success', $event);
        $this->assertEquals(1, $event['success']);
    }

}