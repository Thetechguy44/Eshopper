<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primarykey = 'Category_Id';
    protected $fillable = ['Categoryname', 'Description', 'Image'];

    public function subcategories()
    {
        return $this->hasmany(Subcategory::class, 'Category_Id');
    }
}
