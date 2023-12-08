<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function main()
    {
        $thread = User::all()->where('id', '=', auth()->user()->id);
        foreach ($thread as $t) {
            $th = $t->thread;
        }
        $thread = $th;
        return view('dashboard', ['thread' => $thread]);
    }
}
