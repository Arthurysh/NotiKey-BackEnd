<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;


class UpdateUserController extends Controller
{
    public function update(Request $request)
    {
        DB::transaction(function() use ($request){

            $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email'],
                'surname' => ['required'],
                'phone' => ['required','min:12', 'numeric'],
                'password' => ['required', 'min:8'],
                'birthday' => ['required'],
            ]);


            $user = Auth::user();
            $user->name = $request->input('name','');
            $user->surname = $request->input('surname','');
            $user->email = $request->input('email','');
            $user->phone = $request->input('phone','');
            $user->birthday = $request->input('birthday','');
            $user->password = Hash::make($request->password);




            $user->save();
        });

        
        return ['message' => 'Updated the user info sucessfully!'];

        
    }
}
