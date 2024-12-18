<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // $table->id();
    //         $table->string('name');
    //         $table->text('description');
    //         $table->decimal('price', 8, 2);
    //         $table->string('image')->nullable();
    //         $table->timestamps();
    protected $fillable = ['name', 'description', 'price', 'image'];
}
