<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function getLogin() {
    }
    
    public function login(Request $request) {
    }

    public function getRegister() {
        return view('register');
    }
    
    public function register(Request $request) {
    }

    public function verifyEmailAvailability(Request $request) {
        $user = User::where('email', $request->input('email'))->first();
        
        if(is_null($user)) {
            return response()->json(
                ['status' => 'available']
            );
        } else {
            return response()->json(
                ['status' => 'unavailable']
            );
        }
    }
}
