<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsubcategory extends Model
{
    use HasFactory;
    protected $table = 'subsubcategories';
    protected $fillable = ['Name','Subcategory_Id'];

    public function Subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'Subcategory_Id', 'Subcategory_Id');
    }

    public function product()
    {
        return $this->hasmany(Products::class, 'Subsubcat_Id');
    }
}
