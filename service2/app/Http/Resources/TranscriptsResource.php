<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TranscriptsResource extends JsonResource
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
            "score_1" => $this->score_1,
            "score_2" => $this->score_2,
            "score_3" => $this->score_3,
            "score_4" => $this->score_4,
            "score_5" => $this->score_5,
        ];
    }
}
