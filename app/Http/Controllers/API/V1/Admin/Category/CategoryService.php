<?php

namespace App\Http\Controllers\API\V1\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService extends Controller
{

    public static function store(Request $request)
    {

        return Category::query()
                ->create(
                    $request->toArray()
                );
    }

    public static function getAll()
    {
        return Category::all();
    }
}
