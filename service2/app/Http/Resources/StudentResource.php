<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            "name" => $this->name,
            "masv" => $this->masv,
            "email" => $this->email,
            "phone" => $this->phone,
            "birthday" => $this->birthday,
            // "branch" => $this->branch,
            // "class" => $this->class,
            "country" => $this->Country,
            "transcripts" => $this->transcripts,
        ];
    }
}
