<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'diagnosis';


    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultation_id');
    }

    public function labtest() {
        return $this->hasOne(LabTest::class, 'diagnosis_id');
    }
}
