<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class policyserviceResource extends JsonResource
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
           'service_id'=>$this->service_id,
           'service'=>$this->service,
           'policy_id'=>$this->policy_id,
           'price'=>$this->price, 
        ];

        return parent::toArray($request);
    }
}
