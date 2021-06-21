<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class TestAutController extends Controller
{
    public function sendinfotest()
    {
        return "Hello world";
    }

}