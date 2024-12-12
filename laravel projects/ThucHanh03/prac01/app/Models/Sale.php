<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    // $table->id();
    //         $table->integer('quantity');
    //         $table->dateTime('sale_date');
    //         $table->string('customer_phone');
    //         $table->unsignedBigInteger('medicine_id');
    //         $table->timestamps();
    //         $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');

    use HasFactory;
    protected $fillable = ['quantity', 'sale_date', 'customer_phone', 'medicine_id'];
    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
