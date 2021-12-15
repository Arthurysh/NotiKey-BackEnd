<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'surname' => ['required'],
            'phone' => ['required','min:12', 'numeric'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'surname' => $request->surname,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'user_role' => $request->user_role,
        ]);
    }
    public function addUser(Request $request)
    {

        
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $count = mb_strlen($chars);
        
            for ($i = 0, $paslw = ''; $i < 12; $i++) {
                $index = rand(0, $count - 1);
                $paslw .= mb_substr($chars, $index, 1);
            }
        
            
        

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'surname' => ['required'],
            'phone' => ['required','min:12', 'numeric'],
        ]);

        

        $data = ([
            'email' => $request->email,
            'password' => ($paslw),
        ]);
 
       Mail::to($request->email)->send(new WelcomeMail($data));
       User::create([
        'name' => $request->name,
        'email' => $request->email,
        'surname' => $request->surname,
        'birthday' => $request->birthday,
        'phone' => $request->phone,
        'password' => Hash::make($paslw),
        'user_role' => $request->user_role,
    ]); 
       
    }
}