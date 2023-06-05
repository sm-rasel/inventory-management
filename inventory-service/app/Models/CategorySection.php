<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategorySection extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';
    protected $dates = ['deleted_at'];
    protected $fillable = ['product_id', 'c_name', 'c_qty', 'c_status'];

    public static $categorySection;

    public static function newCategory($request)
    {
        self::$categorySection                  = new CategorySection();
        self::$categorySection->product_id      = $request->product_id;
        self::$categorySection->c_name          = $request->c_name;
        self::$categorySection->c_qty           = $request->c_qty;
        self::$categorySection->c_status        = 1;
        self::$categorySection->save();
    }
    public static function updateCategory($request, $id)
    {
        self::$categorySection                  = CategorySection::find($id);
        self::$categorySection->product_id      = $request->product_id;
        self::$categorySection->c_name          = $request->c_name;
        self::$categorySection->c_qty           = $request->c_qty;
        self::$categorySection->update();
    }

    public static function categoryStatusUpdate($id)
    {
        self::$categorySection = CategorySection::findOrFail($id);
        if (self::$categorySection->c_status == 1){
            self::$categorySection->update(['c_status' => 2]);
            return true;
        }else{
            if (self::$categorySection->update(['c_status' => 1]))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public static function deleteCategory($id)
    {
        self::$categorySection = CategorySection::findOrFail($id);
        if (self::$categorySection)
        {
            self::$categorySection->delete();
            return true;
        }
        else
        {
            return false;
        }

    }

    public function product()
    {
        return $this->belongsTo(ProductSection::class);
    }
}
