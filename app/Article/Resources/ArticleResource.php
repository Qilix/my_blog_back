<?php

namespace App\Article\Resources;

use Carbon\Carbon;

class ArticleResource
{
    public int $id;

    public string $title;

    public string $author;

    public bool $sub_only;

    public Carbon $created_at;

    public Carbon $updated_at;
}
