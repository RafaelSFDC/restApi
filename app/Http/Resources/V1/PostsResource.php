<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'image' => $this->image,
            'likes' => $this->likes,
            'user' => $this->user,
            'userId' => $this->user_id,
            'userName' => $this->user->name,
            'userImage' => $this->user->image,
            'category' => $this->category->name,
            'comments' => CommentsResource::collection($this->comments),
            'updatedAt' => $this->updated_at->toIso8601String(),
            'createdAt' => $this->created_at->toIso8601String(),
        ];
    }
}
