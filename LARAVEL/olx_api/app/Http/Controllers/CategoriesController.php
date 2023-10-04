<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoriesController extends Controller {
    public function index(Request $r): JsonResponse {
        $categories = Category::all();
        return response()-> json(['data'=> $categories]);
    }
}
