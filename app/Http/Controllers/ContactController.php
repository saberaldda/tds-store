<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact-us')->with([
            'title' => __('Contact-Us')
        ]); 
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id'   => 'nullable',
            'name'      => 'required',
            'email'     => 'required|email',
            'phone_number' => 'nullable',
            'subject'   => 'required',
            'message'   => 'required'
        ]);

        $contact = Contact::create($request->all());

        return redirect()->back()
            ->with('success', __('We Receive Your Message'));
    }
}
