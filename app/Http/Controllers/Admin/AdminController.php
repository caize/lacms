<?php

namespace App\Http\Controllers\Admin;

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
