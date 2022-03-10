<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pateints extends Model
{
    protected $table="pateints";
    protected $fillable=[
        'Fname',
        'Lname',
        'gender',
        'DoB',
        'address',
        'Email',
    ];

    public function insure(){
        return $this->hasOne(policies::class);
    }

    public function PatientsInsurance(){

         return $this->belongsToMany(insurances::class, 'pateints_id');
    }

    public function PatientTransaction(){

         return $this->belongsToMany(transactions::class,'pateints_id');
    }
}
