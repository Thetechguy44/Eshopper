<?php

namespace App\Providers;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\Subcategory;

class CategoryComposer
{
    public function compose(View $view)
    {
        $categories = Category::with('subcategories.subsubcategory')->get();
        $view->with('categories', $categories);
    }
    
}
