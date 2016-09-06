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
        return view('admin.permission.index');
    }
    /**
    *  权限节点  添加
    */
    public function create()
    {
        return view('admin.permission.add');
    }
    /**
    *  权限节点  保存
    */
    public function store(Request $request)
    {   
        // 验证表单
        $validator = Validator::make($request->all(), [
            'parent_id' => ['required'], 
            'name' => ['required'],
            'display_name' => ['required'],
            'description' => ['required'],
            'is_menu' => ['required'],
            'sort' => ['required'],            
        ], [
            'parent_id.required' => '邮箱为必填项',
            'name.required' => '密码为必填项',
            'display_name.required' => '密码长度必须是6-12',
            'description.required' => '密码长度必须是6-12',
            'is_menu.required' => '密码长度必须是6-12',
            'sort.required' => '密码长度必须是6-12',
        ]);
    }
}
