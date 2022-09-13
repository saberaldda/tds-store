<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        
    }
}
