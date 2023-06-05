<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryIndex()
    {
        $data = Category::all();
        return response([
            'success' => true,
            'data' => $data
        ]);
    }
    public function categoryStore(Request $request)
    {
        $request->validate(
            [
                'category_name'  => 'required'
            ],
            [
                'category_name.required' => 'Name is Required.'
            ]
        );
        $data = Category::newCategory($request);
        return response([
            'success'   => true,
            'data'      => $data
        ]);
    }

    public function categoryUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'category_name'  => 'required'
            ],
            [
                'category_name.required' => 'Name is Required.'
            ]
        );
        $data = Category::updateCategory($request, $id);
        return response([
            'success'   => true,
            'data'      => $data
        ]);
    }

    public function categoryStatusUpdate($id)
    {
        $data = Category::categoryStatusUpdate($id);
        return response(
            [
                'success'  => true,
                'data' => $data
            ]
        );
    }

    public function categoryDelete($id)
    {
        if (Category::deleteCategory($id))
        {
            return response(
                [
                    'success'  => true
                ]
            );
        }
        else
        {
            return response(
                [
                    'success'  => false
                ]
            );
        }
    }
}
