<?php

namespace App\Comment\Resources;

use Carbon\Carbon;

class CommentResource
{
    public int $id;

    public string $body;

    public int $article_id;

    public int $author;

    public Carbon $created_at;

    public Carbon $updated_at;
}
