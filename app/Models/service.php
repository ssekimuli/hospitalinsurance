<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $table = "service";
    protected $fillable =[
        'service',
    ];

    public function policyOnService(){

         //return $this->belongsTo(policyservice::class);
        return $this->hasMany(policyservice::class);
    }
}
