<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CatogoryResource;

class CategoryController extends Controller
{
    //
    public function index()
    {
        return inertia()->render('Welcome', [
            'categories' => CatogoryResource::collection(Category::latest()->get())
        ]);
    }
}
