<?php

namespace App\Comment\Resources;

use Carbon\Carbon;

class CommentResource
{
    public int $id;

    public string $body;

    public int $author_id;

    public string $author_name;

    public Carbon $created_at;

    public Carbon $updated_at;
}
