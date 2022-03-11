<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class insurances extends Model
{
    use HasFactory;

    protected $table ="insurances";
    protected $fillable=[
        'pateints_id',
        'policy_id',
    ];

    public function insure(){

        return $this->hasMany(policyservice::class);
    }
}
