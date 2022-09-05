<?php

namespace App\Article\Factories;

use App\Article\DTOs\ArticleCreateDTO;
use Illuminate\Http\Request;

class ArticleCreateFactory
{

    public static function fromRequest(Request $request): ArticleCreateDTO
    {
        $dto = new ArticleCreateDTO();

        $dto->title = $request->get('title');
        $dto->description = $request->get('description');
        $dto->text = $request->get('text');
        $dto->sub_only = $request->get('sub_only');

        return $dto;
    }
}
