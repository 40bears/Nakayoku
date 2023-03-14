<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\GeneralNotification;

class NotificationController extends Controller
{
    public function viewNotifications()
    {
        $notifications = auth()->user()->unreadNotifications;
        return view('notification.viewNotifications', compact('notifications'));
    }

    public function sendNotifications(Request $request)
    {
        if ($request['radio'] == 'all') {
            $request->validate([
                'notification_content' => 'required',
            ]);

            $userList = User::get();
            Notification::send($userList, new GeneralNotification($request['notification_content'], $request['link']));
            return redirect()->route('notification-mmt')->with('success', 'Notification sent to all the users');
        } else {

            $request->validate([
                'selected_users' => 'required',
                'notification_content' => 'required',
            ]);

            $userList = User::whereIn('id', explode(',', $request['selected_users']))->get();
            Notification::send($userList, new GeneralNotification($request['notification_content'], $request['link']));
            return redirect()->route('notification-mmt')->with('success', 'Notification sent to ' . count($userList)  . ' users');
        }
    }
}
