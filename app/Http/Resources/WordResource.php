<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WordResource extends JsonResource
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
            'english' => $this->english,
            'part_of_speech' => $this->part_of_speech,
            'lines' => LineResource::make($this->whenLoaded('lines')),
        ];
    }
}
