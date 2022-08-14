<?php

namespace App\Article\DTOs;


class ArticleUpdateDTO
{
    public string $title;

    public string $description;

    public string $text;

    public bool $sub_only;
}
