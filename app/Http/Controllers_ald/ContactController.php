<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function store(Request $request){
        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        //Mail::to( config('mail.from.address') )->send( new ContactEmail($request->only(['name', 'email', 'message'])) );
        Mail::to('io@mountainwilderness.fr')->send(new ContactMail($request));
        return response()->json(['success'=>true]);

    }
}
