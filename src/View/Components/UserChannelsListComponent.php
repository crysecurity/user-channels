<?php


namespace Cr4Sec\UserChannels\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class UserChannelsListComponent extends Component
{
    protected $channels;

    public function __construct($channels)
    {
        $this->channels = $channels;
    }

    public function render()
    {
        return view('components.cr4sec.user-channels-list', [
            'channels' => $this->channels
        ]);
    }
}
