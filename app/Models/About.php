<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;

class About extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function appointments(){
        $this->belongsTo(Appointment::class);
    }
}
