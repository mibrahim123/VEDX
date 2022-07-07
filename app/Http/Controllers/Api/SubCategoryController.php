<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\CategoryRepository;
use App\Http\Resources\CategoryResource;

class SubCategoryController extends Controller
{
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function list(Request $request) {
        $request->validate([
            'parent_id' => 'required|exists:categories,id'
        ]);

        return CategoryResource::collection(
            $this->category->list($request->parent_id)
        );
    }
}
