<?php

namespace App\Http\Controllers\API\V1\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Admin\StoreCategoryRequest;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function store(StoreCategoryRequest $request)
    {
        $sotre_result = CategoryService::store($request);

        if ($sotre_result) {
            return $this->handleSuccess([$sotre_result], config('story.message.create'));
        }

        return $this->handleError(config('story.message.fail_create'), [], Response::HTTP_NO_CONTENT);
    }
}
