<?php

namespace App\Article\DTOs;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class ArticleCreateDTO
// extends DataTransferObject
{
    public string $title;

    public string $text;

    public bool $sub_only;
}
