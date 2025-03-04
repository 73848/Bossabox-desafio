<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TagsResource;
class FerramentasResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        return [
            'id'=> $this->id,
            'title'=> $this->title,
            'link'=> $this->link,
            'description'=> $this->description,
            'tags'=> TagsResource::collection($this->tags)->pluck('name')
        ];
    }
}
