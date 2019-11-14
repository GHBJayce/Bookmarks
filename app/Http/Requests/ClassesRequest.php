<?php

namespace App\Http\Requests;

class ClassesRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:class',
            'pid' => 'nullable|integer',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '分类名称',
            'pid' => '上一级',
        ];
    }
}
