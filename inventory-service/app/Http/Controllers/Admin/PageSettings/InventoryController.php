<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\CategorySection;
use App\Models\InventorySection;
use App\Models\ProductSection;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function inventoryIndex()
    {
        $inventories = InventorySection::all();
//        return view('admin.homepage.inventory_section');
        return response([
            'success'   => true,
            'data'      => $inventories
        ]);
    }

    public function addInventory()
    {
        return view('admin.homepage.inventory_section_add_one');
    }
    public function inventoryStore(Request $request)
    {
        return $request->all();
    }


    public function inventoryAdd()
    {
        $products   = ProductSection::where('p_status', 1)->get();
        $categories = CategorySection::where('c_status', 1)->get();
        return view('admin.homepage.inventory_section_add', [
            'products'      => $products,
            'categories'    => $categories
        ]);
    }

    public function getAllCategory()
    {
        $category = CategorySection::where('product_id', $_GET['id'])->where('c_status', 1)->get();
        return response()->json($category);
    }

}
