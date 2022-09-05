<?php

namespace App\Article\Resources;

use Carbon\Carbon;

class ArticleDetailResource
{
    public int $id;

    public string $title;

    public string $description;

    public string $text;

    public string $author;

    public bool $sub_only;

    public Carbon $created_at;

    public Carbon $updated_at;

    public array $comments;
}
