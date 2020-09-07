<?php


namespace Cr4Sec\UserChannels\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ChannelsController extends Controller
{
    private function validateChannelsIds(Request $request)
    {
        return $request->validate([
            'ids' => 'required|array'
        ])['ids'];
    }

    public function index()
    {
        return auth()
            ->user()
            ->channels;
    }

    public function attach(Request $request)
    {
        $ids = $this->validateChannelsIds($request);

        auth()->user()->attachChannel($ids);
    }

    public function detach(Request $request)
    {
        $ids = $this->validateChannelsIds($request);

        auth()
            ->user()
            ->channels()
            ->detach($ids);
    }
}
