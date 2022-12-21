<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'style_id' => $this->style_id,
            'user_id' => $this->user_id, 
            'langauage_id' => $this->language_id,
            'title' => $this->title,
            'code' => $this->code,
            'created_at' => $this->created_at->diffForHumans(), 
            'updated_at' => $this->updated_at->diffForHumans(), 
        ];
    }
}
