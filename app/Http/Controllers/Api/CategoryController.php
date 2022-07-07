<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\CategoryRepository;
use App\Repository\CateogryRepository;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function list() {
        return sendResponse(
            CategoryResource::collection($this->category->list()),
        200);
    }
}
