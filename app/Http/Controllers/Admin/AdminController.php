<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends BaseController
{
    /**
    *  后台主界面    *
    */
    public function index()
    {
        return view('admin.index');
    }
}
