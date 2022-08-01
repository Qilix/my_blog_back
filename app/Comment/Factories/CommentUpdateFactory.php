<?php

namespace App\Comment\Factories;

use App\Comment\DTOs\CommentUpdateDTO;
use Illuminate\Http\Request;

class CommentUpdateFactory
{

    public static function fromRequest(Request $request): CommentUpdateDTO
    {
        $dto = new CommentUpdateDTO();

        $dto->body = $request->get('body');

        return $dto;
    }
}
