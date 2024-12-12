<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{

    // $table->string('first_name');
    //         $table->string('last_name');
    //         $table->date('date_of_birth');
    //         $table->string('parent_phone');
    //         $table->unsignedBigInteger('class_id');
    //         $table->foreign('class_id')->references('id')->on('my_classes')->onDelete('cascade');
    //         $table->timestamps();
    use HasFactory;
    protected $fillable = ['last_name', 'date_of_birth', 'parent_phone', 'my_class_id'];
    public function my_class()
    {
        return $this->belongsTo(MyClass::class);
    }
}
