<?php

namespace Cr4Sec\UserChannels\Traits;

use Cr4Sec\UserChannels\Models\Channel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Trait HasChannels
 * @package Cr4Sec\UserChannels\Traits
 *
 * @property-read Collection $channels
 */
trait HasChannels
{
    /**
     * The channels that belong to the user.
     * @return BelongsToMany
     */
    public function channels(): BelongsToMany
    {
        return $this->belongsToMany(
            Channel::class,
            config('cr4sec.channels.tables.user_channel'),
            'user_id',
            'channel_id'
        );
    }

    private function prepareChannels($channels)
    {
        if ($channels instanceof Model) {
            return [$channels->id];
        }

        if ($channels instanceof Collection) {
            return $channels->pluck('id')->toArray();
        }

        if (is_array($channels)) {
            return $channels;
        }

        return [$channels];
    }

    public function attachChannel($channels)
    {
        $ids = array_diff(
            $this->prepareChannels($channels),
            $this->channels->pluck('id')->toArray()
        );

        $this->channels()->attach(Channel::whereIn('id', $ids)->get());
    }
}
