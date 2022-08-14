<?php

namespace App\Article\DTOs;


class ArticleCreateDTO
{
    public string $title;

    public string $description;

    public string $text;

    public bool $sub_only;
}
