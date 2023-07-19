<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['sub_category_name' , 'second_category_id'];

    public function secondCategory()
    {
        return $this->belongsTo(SecondCategory::class);
    }

    public function products()
    {
        return $this->hasMany(product::class);
    }
}
