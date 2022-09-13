<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class NotificationsMenu extends Component
{

    public $notifications;

    public $unread;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $user = Auth::user();                     // ->take(5)
        $this->notifications = $user->notifications()->whereNull('read_at')->limit(7)->get(); // by default , order to time
        $this->unread = $user->unreadNotifications->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notifications-menu');
    }
}
