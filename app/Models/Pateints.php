<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\transactions;

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


    public function policy(){
        return $this->hasOne(policies::class);
    }

    public function PatientsInsurance(){

         return $this->belongsToMany(insurances::class);
    }

    public function payment(){

         return $this->hasMany(transactions::class);
        //return $this->belongsTo(transactions::class);
        
    }
}
