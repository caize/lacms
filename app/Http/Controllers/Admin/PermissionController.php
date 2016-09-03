<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Http\Requests;

class PermissionController extends BaseController
{
    /**
    *  权限节点  列表
    */
    public function index()
    {
        return view('admin.permission.index')->with('user', session('user'));
    }
}
