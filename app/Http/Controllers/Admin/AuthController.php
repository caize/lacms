<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

use App\Services\Admin\AuthService;

class AuthController extends Controller
{
    protected $service;

    public function __construct(AuthService $service){
        $this->service  = $service;
    }
    /**
     *  [管理员登陆]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-10T11:01:41+0800
     *  @param    Request                  $request [description]
     *  @return   [type]                            [description]
     */
    public function login(Request $request)
    {
        // 已经登录则直接跳转
        if (Auth::user()) {
            return redirect()->route('admin.index');
        }
        if ($request->isMethod('get')) {
            return view('admin.auth.login');
        }
        // // 验证表单
        // $validator = Validator::make($request->all(), [
        //     'email' => ['required', 'email', 'exists:users'], //查询用户
        //     // 'email' => ['required', 'email', 'unique:users'], //创建用户
        //     'password' => ['required', 'between:6,16'],
        // ], [
        //     'email.exists' => '邮箱不存在',
        //     'email.unique' => '邮箱已存在',
        //     'email.email' => '邮箱格式不正确',
        //     'email.required' => '邮箱为必填项',
        //     'password.required' => '密码为必填项',
        //     'password.between' => '密码长度必须是6-12',
        // ]);
        // if ($validator->fails()) {
        //     return $this->respondWithFailedValidation($validator);
        // }
        // User::create([
        //     'name' => 'admin',
        //     'email' => $request->input('email'),
        //     'password' => bcrypt($request->input('password')),
        // ]);
        // if (Auth::guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
        //     // 认证通过...
        //     return $this->respondWithSuccess(Auth::user()->toArray(), '登录成功');
        // }
        // return $this->respondWithErrors('账号或密码错误',400);
    }
    /**
     *  [postLogin 登陆]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-10T12:02:24+0800
     *  @param    UserRequest              $request [description]
     *  @return   [type]                            [description]
     */
     // UserRequest 验证
    // public function postLogin(UserRequest $request)
    // {
    //     if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
    //         // 认证通过...
    //         return $this->respondWithSuccess(Auth::user()->toArray(), '登录成功');
    //     }
    //     return $this->respondWithErrors('账号或密码错误',400);
    // }
    // AuthValidator 验证
    public function postLogin(Request $request)
    {
        return $this->service->postLogin($request);
    }
    /**
     *  [logout description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-10T11:02:05+0800
     *  @return   [type]                   [description]
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
