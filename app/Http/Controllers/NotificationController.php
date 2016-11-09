<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class NotificationController extends Controller
{
    public function Index()
    {
        return view('notification');
    }

    public function store(Request $request)
    {
        $pusher = App::make('pusher');
        $notifyText = e($request->input('notify_text'));
        $socket_id = e($request->input('socket_id'));

        $pusher->trigger('new-notification',
            'notifications',
            array('text' => $notifyText),
            $socket_id
        );


    }
}
