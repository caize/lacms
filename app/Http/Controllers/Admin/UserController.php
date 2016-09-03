<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class UserController extends BaseController
{
    /**
     * 登录
     * @param Request $request
     * @return $this
     */
    public function login(Request $request)
    {
        // 已经登录则直接跳转
        if (Session::has('user')) {
            return redirect()->route('admin.index');
        }
        
        if ($request->isMethod('get')) {
            return view('admin.auth.login');
        }
        // 验证表单
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users'], //查询用户
            // 'email' => ['required', 'email', 'unique:users'], //创建用户
            'password' => ['required', 'between:6,16'],
        ], [
            'email.exists' => '邮箱不存在',
            'email.unique' => '邮箱已存在',
            'email.email' => '邮箱格式不正确',
            'email.required' => '邮箱为必填项',
            'password.required' => '密码为必填项',
            'password.between' => '密码长度必须是6-12',
        ]);
        if ($validator->fails()) {
            return $this->respondWithFailedValidation($validator);
        }
        // 创建用户
        // $input = $request->except(['_token']);
        // $input['password'] = bcrypt($request->password);
        // $res = User::create($input);
        
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            // 登录成功
            if (Hash::needsRehash($user->password)) {
                $user->password = bcrypt($request->password);
                $user->save();
            }
            Session::put('user', $user);
            return $this->respondWithSuccess($user, '登录成功');
        }
        return $this->respondWithErrors('账号或密码错误',400);
    }
    /**
     * 退出登录
     * @return mixed
     */
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('admin.login');
    }
}
