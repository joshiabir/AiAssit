<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Exception;
use App\Models\User;

class GoogleController extends Controller
{
    public function signInwithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    private function create_thread()
    {
        $response = Http::withHeaders([
            'Content-Type' => ' application/json',
            'Authorization' => "Bearer " . env('OPEN_AI') . "",
            "OpenAI-Beta" => "assistants=v1",
        ])->post("https://api.openai.com/v1/threads");
        $res = json_decode($response);
        return $res;
    }
    public function callbackToGoogle()
    {


        $user = Socialite::driver('google')->user();

        $finduser = User::where('gauth_id', $user->id)->first();

        if ($finduser) {

            Auth::login($finduser);

            return redirect('/dashboard');
        } else {

            $thread = $this->create_thread();
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'gauth_id' => $user->id,
                'gauth_type' => 'google',
                'password' => encrypt('admin@123'),
                'thread' => $thread->id
            ]);
            Http::withHeaders([
                'Content-Type' => 'application/x-www-form-urlencoded',
            ])->post(env('SLACK_URL'), [
                        "text" => "A new email registered - $user->email",
                        "icon_emoji" => "panda_face",
                        "username" => "Poco"
                    ]);
            Auth::login($newUser);
            return redirect('/dashboard');
        }
    }
}
