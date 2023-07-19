<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $guarded  = [];



    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function sizes(){
        return $this->hasMany(size::class,'product_id' );
    }

    public function colors(){
        return $this->hasMany(color::class,'product_id' );
    }

    public function images(){
        return $this->hasMany(image::class,'product_id' );
    }

    public function order()
    {
        return $this->hasMany(order::class,'product_id' );
    }

    public function offer()
    {
        return $this->hasOne(offer::class);
    }
}
