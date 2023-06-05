<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';
    protected $dates = ['deleted_at'];
    protected $fillable = ['category_name', 'status'];

    public static $category;

    public static function newCategory ($request)
    {
        self::$category              = new Category();
        self::$category->category_name      = $request->category_name;
        self::$category->status    = 1;
        self::$category->save();
        return self::$category;
    }
    public static function updateCategory ($request, $id)
    {
        self::$category          = Category::findOrFail($id);
        self::$category->category_name  = $request->category_name;
        self::$category->update();
        return self::$category;
    }

    public static function categoryStatusUpdate($id)
    {
        self::$category  = Category::findOrFail($id);
        if (self::$category->status == 1){
            self::$category->update(['status' => 2]);
        }else{
            self::$category->update(['status' => 1]);
        }
        return self::$category;
    }

    public static function deleteCategory($id)
    {
        self::$category  = Category::findOrFail($id);
        if (self::$category)
        {
            self::$category->delete();
            return true;
        }else{
            return false;
        }
    }

}
