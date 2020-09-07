<?php

namespace Cr4Sec\UserChannels\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

/**
 * Class Channel
 * @package Cr4Sec\UserChannels\Models
 *
 * @property string $id
 * @property Collection $users
 */
class Channel extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $keyType = 'string';

    /**
     * The "booted" method of the channel.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function (Channel $channel) {
            $channel->id = Str::random(10);
        });
    }

    /**
     * Get the table associated with the model.
     * @return string
     */
    public function getTable(): string
    {
        return config('cr4sec.tables.channels', parent::getTable());
    }

    /**
     * The users that belong to the channel.
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            config('cr4sec.channels.user_model'),
            config('cr4sec.channels.tables.user_channel'),
            'channel_id',
            'user_id'
        );
    }
}
