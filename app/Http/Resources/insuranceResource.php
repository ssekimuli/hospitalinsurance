<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class insuranceResource extends JsonResource
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
            'pateints_id'=>$this->pateints_id,
            'policy_ID'=>$this->policy_ID,
            'policyservice'=>$this->policy,//$this->load('policyservice'),
        ];
        return parent::toArray($request);
    }
}
