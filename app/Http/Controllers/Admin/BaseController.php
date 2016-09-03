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
        view()->share('user', session('user')); // 变量共享
    }
    /**
     * 响应成功
     * @param string $message
     * @return \Illuminate\Http\Response
     */
    protected function respondWithSuccess($data, $message = '', $code = 200, $status = 'success')
    {
        return response()->json([
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'result' => $data,
        ]);
    }
    /**
     * 响应所有的validation验证错误
     * @param  \Illuminate\Validation\Validator $validator the validator that failed to pass
     * @return \Illuminate\Http\Response the appropriate response containing the error message
     */
    protected function respondWithFailedValidation(\Illuminate\Validation\Validator $validator)
    {
        // 只取出一条错误信息
        return $this->respondWithErrors($validator->messages()->first(), 400);
    }
    
    /**
     * 响应错误
     * @param string $message
     * @param int $code
     * @param string $status
     * @return Response
     */
    protected function respondWithErrors($message = '', $code = 404, $status = 'error')
    {
        return response()->json([
            'status' => $status,
            'code' => $code,
            'message' => $message,
        ]);
    }
}