<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pateints;

class transactions extends Model
{
    use HasFactory;
    protected $table="transactions";
    protected $fillable=[
        'Date_paid',
        'Amount',
        'pateints_id',
    ];

    public function Pateints(){

        return $this->belongsTo(Pateints::class);
        //return $this->hasMany(Pateints::class);
    }
}
