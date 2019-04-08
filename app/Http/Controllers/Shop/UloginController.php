<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Str;

class UloginController extends Controller
{

// Login user through social network.
    public function login(Request $request)
    {
        // Get information about user.
        $data = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
        $user = json_decode($data, TRUE);

        $network = $user['network'];

        // Find user in DB.
        $userData = User::where('vk_id', $user['uid'])->first();
        // Check exist user.
        if (isset($userData->id)) {
            // Make login user.
            Auth::loginUsingId($userData->id, TRUE);

            return back();
        } // Make registration new user.
        else {

            // Create new user in DB.
            $newUser = User::create([
                'name' => $user['first_name'] . ' ' . $user['last_name'],
                'vk_id' => $user['uid'],
                'password' => Hash::make(Str::random(8)),
                'role' => 0,
            ]);
            // Make login user.
            Auth::loginUsingId($newUser->id, TRUE);

            \Session::flash('flash_message', trans('interface.ActivatedSuccess'));

            return back();
        }
    }
}
