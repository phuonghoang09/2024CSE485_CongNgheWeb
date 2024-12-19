<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Computer extends Model
{
    use HasFactory;
    protected $fillable = ['cumputer_name', 'model', 'operating_system', 'processor', 'memory', 'available'];
    public function issues()
    {
        return $this->hasMany(Issue::class);
    }
}
