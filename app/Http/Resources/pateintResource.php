<?php

namespace App\Http\Resources;
use App\Models\company;
use Illuminate\Http\Resources\Json\JsonResource;

class pateintResource extends JsonResource
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
            'Fname'=>$this->Fname,
            'Lname'=>$this->Lname,
            'gender'=>$this->gender,
            'DoB'=>$this->DoB,
            'address'=>$this->address,
            'Email'=>$this->Email,
            'insuranceCompany'=>$this->company,
            'service'=>$this->service,
            'policy'=>$this->policies,
            'price'=>$this->policyservice,
            'start_date'=>$this->policies,
            'end_date'=>$this->policies,
        ];
        return parent::toArray($request);
    }
}
