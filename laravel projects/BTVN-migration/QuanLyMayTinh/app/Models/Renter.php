<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Renter extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone_number', 'email'];

    public function laptops()
    {
        return $this->hasMany(Laptop::class);
    }
}
