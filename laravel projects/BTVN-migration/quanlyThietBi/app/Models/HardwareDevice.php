<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardwareDevice extends Model
{
    use HasFactory;

    protected $fillable = ['device_name', 'type', 'status', 'center_id'];

    public function center()
    {
        return $this->belongsTo(ItCenter::class, 'center_id');
    }
}
