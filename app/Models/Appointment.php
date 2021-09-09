<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Customer;
use App\Models\About;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customers(){
        $this->belongsTo(Customer::class);
    }

    public function abouts(){
        return $this->hasMany(About::class);
    }
}
