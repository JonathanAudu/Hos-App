<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function labtest()
    {
        return $this->belongsTo(LabTest::class, 'labtest_id');
    }

    public function prescription()
    {
        return $this->hasOne(Prescription::class);
    }
}
