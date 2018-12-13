<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $per_page_num;

    public function __construct()
    {
        $this->per_page_num = config('app.per_page_num');
    }

    public function response(array $arr)
    {
        $arr += [
            'status' => null,
            'data' => null,
            'msg' => null,
        ];

        return $arr;
    }

    public function returnData($data)
    {
        return $this->response([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function success($msg = '操作成功', $data = null)
    {
        return $this->response([
            'status' => 'success',
            'data' => $data,
            'msg' => $msg,
        ]);
    }

    public function error($msg = '操作有误，请稍后重试', $data = null)
    {
        return $this->response([
            'status' => 'error',
            'data' => $data,
            'msg' => $msg,
        ]);
    }
}
