<?php

namespace App\Http\Controllers;


use App\Category;

class CategoryController extends Category
{
    public function index(Category $category)
{
    return view('categories.index')->with(['posts' => $category->getByCategory()]);
}
}
