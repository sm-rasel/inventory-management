<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $dates = ['deleted_at'];
    protected $fillable = ['category_id', 'product_name', 'stock_qty', 'status'];

    public static $product;

    public static function newProduct($request)
    {
        self::$product                  = new Product();
        self::$product->category_id     = $request->category_id;
        self::$product->product_name    = $request->product_name;
        self::$product->stock_qty       = $request->stock_qty;
        self::$product->status          = 1;
        self::$product->save();
        return self::$product;
    }
    public static function updateProduct($request, $id)
    {
        self::$product                  = Product::find($id);
        self::$product->category_id     = $request->category_id;
        self::$product->product_name    = $request->product_name;
        self::$product->stock_qty       = $request->stock_qty;
        self::$product->save();
        return self::$product;
    }

    public static function productStatusUpdate($id)
    {
        self::$product = Product::findOrFail($id);
        if (self::$product->status == 1){
            self::$product->update(['status' => 2]);

        }else{
            self::$product->update(['status' => 1]);
        }
        return self::$product;
    }

    public static function deleteProduct($id)
    {
        self::$product = Product::findOrFail($id);
        if (self::$product)
        {
            self::$product->delete();
            return true;
        }
        else
        {
            return false;
        }

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
