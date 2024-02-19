<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
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
            'content' => $this->content,
            'userId' => $this->user_id,
            'userName' => $this->user->name,
            'user' => $this->user,
            'userEmail' => $this->user->email,
            'image' => $this->user->image,
            'description' => $this->user->description,
            'category' => $this->user->category,
            'postId' => $this->post_id,
            'updatedAt' => $this->updated_at->toIso8601String(),
            'createdAt' => $this->created_at->toIso8601String()
        ];
    }
}
