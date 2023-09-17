<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $table = 'subcategories';
    protected $fillable = ['Subcategory','Category_Id'];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'Category_Id', 'Category_Id');
    }

    public function subsubcategory()
    {
        return $this->hasmany(Subsubcategory::class, 'Subcategory_Id');
    }
}
