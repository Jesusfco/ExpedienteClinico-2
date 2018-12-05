<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Auth;

class NotificationsController extends Controller
{
    public function get() {
        $auth = Auth::user();

        $notifications = Notification::where('user_id', $auth->id)
        ->orWhere('user_type', $auth->user_type)
        ->limit(30)->get();

        return response()->json($notifications);

    }

    public function setReadNotifications() {

        $auth = Auth::user();
        Notification::where('user_id', $auth->id)->update(['read' => 1]);
        Notification::where('user_type', $auth->user_type)->update(['read' => 1]);

        return response()->json(true);

    }
}
