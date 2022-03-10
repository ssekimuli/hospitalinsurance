<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class policyservice extends Model
{
    protected $table="policyservice";
    protected $fillable=[
        'service_id',
        'policy_id',
        'price',
    ];
}
