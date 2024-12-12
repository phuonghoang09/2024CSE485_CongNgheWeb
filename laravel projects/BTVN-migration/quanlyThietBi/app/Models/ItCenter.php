<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItCenter extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'contact_email'];

    public function devices()
    {
        return $this->hasMany(HardwareDevice::class, 'center_id');
    }
}
