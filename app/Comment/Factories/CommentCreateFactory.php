<?php

namespace App\Comment\Factories;

use App\Comment\DTOs\CommentCreateDTO;
use Illuminate\Http\Request;

class CommentCreateFactory
{

    public static function fromRequest(Request $request): CommentCreateDTO
    {
        $dto = new CommentCreateDTO();

        $dto->body = $request->get('body');

        return $dto;
    }
}
