<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productIndex()
    {
        $products = Product::all();
        return response([
            'success' => true,
            'data' => $products
        ]);
    }
    public function productStore(Request $request)
    {
        $request->validate(
            [
                'product_name'    => 'required',
                'category_id'    => 'required',
                'stock_qty'     => 'required|numeric'
            ],
            [
                'product_name.required'   => 'Category Name is Required.',
                'category_id.required'   => 'Category Name is Required.',
                'stock_qty.required'    => 'Quantity is Required',
                'stock_qty.numeric'     => 'Quantity must be type of Number'
            ]
        );
        $data = Product::newProduct($request);
        return response([
            "success" => true,
            'data'      => $data
        ]);
    }
    public function productUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'product_name'    => 'required',
                'category_id'    => 'required',
                'stock_qty'     => 'required|numeric'
            ],
            [
                'product_name.required'   => 'Category Name is Required.',
                'category_id.required'   => 'Category Name is Required.',
                'stock_qty.required'    => 'Quantity is Required',
                'stock_qty.numeric'     => 'Quantity must be type of Number'
            ]
        );
        $data = Product::updateProduct($request, $id);

        return response([
            'success' => true,
            'data' => $data
        ]);
    }

    public function productStatusUpdate($id)
    {
        $data = Product::productStatusUpdate($id);
        return response([
            'success' => true,
            'data' => $data
        ]);
    }

    public function productDelete($id)
    {
        if (Product::deleteProduct($id))
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
