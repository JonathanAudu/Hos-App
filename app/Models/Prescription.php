<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function drug()
    {
        return $this->belongsTo(Drug::class,  'drug_id');
    }
}
