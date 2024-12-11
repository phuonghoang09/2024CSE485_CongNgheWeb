<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laptop extends Model
{
    use HasFactory;
    protected $fillable = ['brand', 'model', 'specifications','rental_status', 'rental_id'];

    public function renter()
    {
        return $this->belongsTo(Renter::class);
    }
}
