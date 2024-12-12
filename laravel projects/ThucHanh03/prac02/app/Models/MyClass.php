<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyClass extends Model
{
    // $table->enum('grade_level', ['Pre-K', 'Kindergarten']);
    //         $table->string('room_number');
    //         $table->timestamps();

    use HasFactory;
    protected $fillable = ['grade_level', 'room_number'];
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
