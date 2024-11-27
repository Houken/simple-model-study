<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'index_no' => $this->index_no,
            'definition' => $this->definition,
            'book' => BookResource::make($this->whenLoaded('book')),
            'word' => WordResource::make($this->whenLoaded('word')),
            'usages' => UsageResource::make($this->whenLoaded('usages')),
        ];
    }
}
