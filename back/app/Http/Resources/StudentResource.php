<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'id_type' => $this->id_type,
            'id_number' => $this->id_number,
            'genre' => $this->genre,
            'date_of_birth' => $this->date_of_birth,
            'career' => new CareerResource($this->career),
            'email_address' => $this->email_address,
            'phone_number' => $this->phone_number
        ];
    }
}
