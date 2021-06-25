<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    

   
        // ルーティングに応じて未ログイン時のリダイレクト先を振り分ける
               protected function redirectTo($request)
        {
            return route('login');
        }
            
}

