<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Str;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'g-recaptcha-response' => 'recaptcha', //recaptcha validation
        ]);

        if ($validator->fails()) {
            return redirect()->Back()->withInput()->withErrors($validator);
        } else {
            User::create([
                'name' => 'dimmas',
                'email' => 'dimmas@gmail.com',
                'password' => Str::random(5)
            ]);
            Session::flash('message', 'Form submit Successfully.');
        }
        return redirect('/');
    }
}
