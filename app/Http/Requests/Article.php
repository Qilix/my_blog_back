<?php

namespace App\Rules;

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Article extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|string|unique:articles,title',
            'text' => 'required',
            'author' => 'required|string',
            'sub_only' => 'boolean',
        ];

        // switch ($this->getMethod()) {
        //     case 'POST':
        //         return $rules;

        //     case 'PUT':
        //         return [
        //             'article_id' => 'required|integer|exists:articles,id',
        //             'title' => ['required', Rule::unique('articles')->ignore($this->title, 'title')]
        //         ] + $rules;
        //     case 'DELETE':
        //         return [
        //             'article_id' => 'required|integer|exists:articles,id'
        //         ];
        // }
    }
}
