<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::all());

        
    }
    public function store(StoreCategoryRequest $request)
    {
        $data=$request->all();
        
        Category::create([
            'name' =>$data['name'],
            'descrition' =>$data['description'],
            "type" =>$data["type"]
        
        ]);
        
        return Category::latest()->first()->get();
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        dd($category, $request->all());
    }
}