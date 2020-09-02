<?php

namespace Tests\Unit\Channels\Actions;

use Tests\Feature\FeatureCase;
use GetCandy\Api\Core\Channels\Models\Channel;
use GetCandy\Api\Core\Channels\Actions\FetchChannel;

/**
 * @group channels
 */
class FetchChannelTest extends FeatureCase
{
    public function test_can_fetch_record_by_numeric_id()
    {
        $user = $this->admin();
        $channel = factory(Channel::class)->create();

        $record = (new FetchChannel)->actingAs($user)->run([
            'id' => $channel->id,
        ]);

        $this->assertEquals($channel->id, $record->id);
    }

    public function test_can_fetch_record_by_handle()
    {
        $user = $this->admin();
        $channel = factory(Channel::class)->create();


        $record = (new FetchChannel)->actingAs($user)->run([
            'handle' => $channel->handle,
        ]);

        $this->assertEquals($channel->id, $record->id);
    }

}
