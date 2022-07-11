<?php

namespace App\Article\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Comment\Resources\CommentResource;

class ArticleDetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,
            'author' => $this->author,
            'sub_only' => $this->sub_only,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'comments' => CommentResource::collection($this->comments),
        ];
    }
}
