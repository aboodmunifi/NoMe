<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondCategory extends Model
{
    use HasFactory;

    protected $fillable = ['second_category_name' , 'category_id'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function subCategoryProduct()
    {
        return $this->hasManyThrough( product::class ,SubCategory::class );
    }
}
