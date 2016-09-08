<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        view()->share('user', auth()->user()->toArray()); // 变量共享
    }
    
}