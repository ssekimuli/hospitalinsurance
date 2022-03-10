<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table="company";
    protected $fillable=[
        'CompanyName',
        'phone',
        'email',
    ];

    public function policy(){

        return $this->hasMany(policies::class);
    }
}
