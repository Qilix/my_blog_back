<?php

namespace App\Article\Factories;

use App\Article\DTOs\ArticleUpdateDTO;
use Illuminate\Http\Request;

class ArticleUpdateFactory
{

    public static function fromRequest(Request $request): ArticleUpdateDTO
    {
        $dto = new ArticleUpdateDTO();

        $dto->title = $request->get('title');
        $dto->description = $request->get('description');
        $dto->text = $request->get('text');
        $dto->sub_only = $request->get('sub_only');

        return $dto;
    }
}
