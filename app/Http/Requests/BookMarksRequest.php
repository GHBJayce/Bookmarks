<?php

namespace App\Http\Requests;

class BookMarksRequest extends Request
{
    public function rules()
    {
        return [
            'title' => 'nullable|max:30|unique:bookmarks',
            'url' => 'required|url',
            'is_like' => 'nullable|between:0,1',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '书签名称',
            'url' => '书签URL',
            'is_like' => '喜好书签',
        ];
    }

    /**
     * 可接受前端传递参数
     *
     * @return array
     */
    public function acceptFields()
    {
        return ['title', 'url', 'is_like'];
    }
}
