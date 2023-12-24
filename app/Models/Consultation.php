<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function examination()
    {
        return $this->belongsTo(Examination::class, 'examination_id');
    }

    public function userpayments()
    {
        return $this->hasMany(UserPayment::class);
    }

    public function labtests()
    {
        return $this->hasOne(Consultation::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
