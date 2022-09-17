<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $notifications = $user->notifications()->get()->sortBy('read_at');

        return view('admin.notifications.index', [
            'title'         => __('Notifications'),
            'notifications' =>$notifications,
            'unread'        =>$user->unreadNotifications->count(),
        ]);
    }

    public function show($id)
    {
        $user = Auth::user();
        $notification = $user->notifications()->findOrFail($id);

        $notification->markAsRead();

        if (isset($notification->data['url'])) {
            return redirect($notification->data['url']);
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        $user = Auth::user();
        $notification = $user->notifications()->findOrFail($id);

        $notification->delete();

        return redirect()->back();
    }

    }
