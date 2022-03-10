<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class policyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'policy'=>$this->policy,
            'pateints_id'=>$this->pateints_id,
            'Company_ID'=>$this->Company_ID,
            'start_Date'=>$this->start_Date,
            'End_Date'=>$this->End_Date,
            'deducted_amount'=>$this->deducted_amount,
        ];
        return parent::toArray($request);
    }
}
