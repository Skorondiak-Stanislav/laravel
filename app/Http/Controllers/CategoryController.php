<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\JsonResponse;


class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Category::all());
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $data = $request->all();

        Category::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'type' => $data['type'],
        ]);

        return response()->json(Category::latest()->first()->get());
    }

    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        $category->name = $request['name'];
        $category->description = $request['description'];
        $category->type = $request['type'];
        
        $category->save();

        return response()->json($category, 201);
    }

    public function destroy(Category $category): JsonResponse
    {
        return response()->json($category->delete());
    }
}