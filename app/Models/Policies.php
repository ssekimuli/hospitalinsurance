<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policies extends Model
{
    use HasFactory;
    protected $table="policies";
    protected $fillable=[
        'policy',
        'pateints_id',
        'Company_ID',
        'start_Date',
        'End_Date',
        'deducted_amount',
    ];

    public function companyPolicy(){

        return $this->belongsTo(company::class);
    }

    public function servicepolicy(){

         return $this->belongsToMany(policyservice::class);
    }

    public function policy(){

         return $this->belongsToMany(insurances::class);
    }
}
