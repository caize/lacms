<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use Cache;
use Session;

class PermissionController extends BaseController
{
    /**
     *  [权限节点  列表]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-10T11:02:33+0800
     *  @return   [type]                   [description]
     */
    public function index()
    {
        // return view('admin.permission.index');
        // Cache::forever(config('admin.globals.cache.menuList'),$menuList);
        // Cache::forever('user',auth()->user()->toArray());
        // dd(auth()->user()->toArray());
        // Session::put('key', auth()->user()->toArray());
        // dump('ddddd');
        return view('admin.permission.index');
    }
    /**
     *  [权限节点  添加]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-10T11:02:44+0800
     *  @return   [type]                   [description]
     */
    public function create()
    {
        return view('admin.permission.add');
    }
    /**
     *  [权限节点  保存]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-10T11:02:54+0800
     *  @param    Request                  $request [description]
     *  @return   [type]                            [description]
     */
    public function store(Request $request)
    {
        
    }
}
