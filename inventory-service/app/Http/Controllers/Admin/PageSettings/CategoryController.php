<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\CategorySection;
use App\Models\ProductSection;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryIndex()
    {
        $categories = CategorySection::all();
//        return view('admin.homepage.category_section', [
//            'categories' => $categories
//        ]);
        return response([
            'success' => true,
            'data' => $categories
        ]);
    }
    public function categoryAdd()
    {
        $products = ProductSection::all();
        return view('admin.homepage.category_section_add',[
            'products' => $products
        ]);
    }
    public function categoryStore(Request $request)
    {
        $request->validate(
            [
                'c_name'    => 'required',
                'c_qty'     => 'required|numeric'
            ],
            [
                'c_name.required'   => 'Category Name is Required.',
                'c_qty.required'    => 'Quantity is Required',
                'c_qty.numeric'     => 'Quantity must be type of Number'
            ]
        );
        CategorySection::newCategory($request);
        $notification = array(
            'message'       => 'Category Section Created Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('/page-settings/category-index')->with($notification);
    }
    public function categoryEdit($id)
    {
        $category   = CategorySection::find($id);
        $products  = ProductSection::all();
        return view('admin.homepage.category_section_update', [
            "category"      => $category,
            "products"     => $products
        ]);
    }
    public function categoryUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'i_name'    => 'required',
                'i_qty'     => 'required|numeric'
            ],
            [
                'i_name.required'   => 'Item Name is Required.',
                'i_qty.required'    => 'Quantity is Required',
                'i_qty.numeric'     => 'Quantity must be type of Number'
            ]
        );
        CategorySection::updateCategory($request, $id);
        $notification = array(
            'message'       => 'Item Section Updated Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('/page-settings/category-index')->with($notification);
    }

    public function categoryStatusUpdate($id)
    {
        if (CategorySection::categoryStatusUpdate($id))
        {
            $data['success'] = true;
            $data['message'] = 'Status Updated Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Status Can not Updated !';
            return response()->json($data, 200);
        }
    }

    public function categoryDelete($id)
    {
        if (CategorySection::deleteCategory($id))
        {
            $data['success'] = true;
            $data['message'] = 'Category Deleted Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Category Can not Deleted !';
            return response()->json($data, 200);
        }
    }
}
