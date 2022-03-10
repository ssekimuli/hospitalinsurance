<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class transactionResource extends JsonResource
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
            'Amount'=>$this->Amount,
            'pateints_id'=>$this->pateints_id,
            'pateint'=>$this->pateints,
            'Date_paid'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
        return parent::toArray($request);
    }
}
 