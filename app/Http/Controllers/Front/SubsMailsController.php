<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\SubsMail;
use Illuminate\Http\Request;

class SubsMailsController extends Controller
{
    public function store(Request $request)
    {
        $subsmail = SubsMail::updateOrCreate(['email' => $request->post('email')]);

        return redirect()->back()
            ->with('success', __('Thank You For Sign Up With Our Email NEWSLETTER Service'));
    }
}
