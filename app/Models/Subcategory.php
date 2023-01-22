<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'num_bedrooms'];

    // subcategories belong to many categories
    public function category() {
        return $this->belongsToMany(Category::class);
    }
}
