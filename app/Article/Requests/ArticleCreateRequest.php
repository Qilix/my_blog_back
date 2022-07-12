<?php

namespace App\Article\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'author' => 'required|string',
            'sub_only' => 'boolean',
            'comments' => '',
        ];
    }
}