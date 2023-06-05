<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\ProductSection;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productIndex()
    {
        $data = ProductSection::all();
        return response([
            'success' => true,
            'data' => $data
        ]);
    }
//    public function productAdd()
//    {
//        return view('admin.homepage.product_section_add');
//    }
    public function productStore(Request $request)
    {
        $request->validate(
            [
                'p_name'  => 'required'
            ],
            [
                'p_name.required' => 'Name is Required.'
            ]
        );
        $data = ProductSection::newProduct($request);
        return response([
            'success'   => true,
            'data'      => $data
        ]);
//        $notification = array(
//            'message'       => 'ProductSection Created Successfully!',
//            'alert-type'    => 'success'
//        );
//        return redirect('/page-settings/product-index')->with($notification);

    }

    public function productEdit($id)
    {
        $product = ProductSection::find($id);
        return response([
            'data' => $product
        ]);
//        return view('admin.homepage.product_section_update', [
//            'product' => $product
//        ]);
    }
    public function productUpdate(Request $request, $id)
    {
        $request->validate(
            [
                't_name'  => 'required'
            ],
            [
                't_name.required' => 'Name is Required.'
            ]
        );
        ProductSection::updateProduct($request, $id);
        $notification = array(
            'message'       => 'ProductSection Updated Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('/page-settings/product-index')->with($notification);
    }

    public function productStatusUpdate($id)
    {
        if (ProductSection::productStatusUpdate($id))
        {
            $data['success'] = true;
            $data['message'] = 'Status Updated Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Status can not Updated !';
            return response()->json($data, 200);
        }
    }

    public function productDelete($id)
    {
        if (ProductSection::deleteProduct($id))
        {
            $data['success'] = true;
            $data['message'] = 'Product Deleted Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Product can not Deleted !';
            return response()->json($data, 200);
        }
    }
}
