<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class companyResource extends JsonResource
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
            'id'=>$this->id,
            'Company'=>$this->CompanyName,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'updated_at'=>$this->updated_at,
        ];
        return parent::toArray($request);
    }
}
