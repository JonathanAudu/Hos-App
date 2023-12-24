<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'labtests';



    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultation_id');
    }

    public function drug()
    {
        return $this->hasOne(Drug::class, 'labtest_id');
    }
}
