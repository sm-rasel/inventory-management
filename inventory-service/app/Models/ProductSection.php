<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSection extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $dates = ['deleted_at'];
    protected $fillable = ['p_name', 'p_status'];

    public static $productSection;

    public static function newProduct ($request)
    {
        self::$productSection              = new ProductSection();
        self::$productSection->p_name      = $request->p_name;
        self::$productSection->p_status    = 1;
        self::$productSection->save();
        return self::$productSection;
    }
    public static function updateProduct ($request, $id)
    {
        self::$productSection          = ProductSection::findOrFail($id);
        self::$productSection->p_name  = $request->p_name;
        self::$productSection->update();
        return self::$productSection;
    }

    public static function productStatusUpdate($id)
    {
        self::$productSection  = ProductSection::findOrFail($id);
        if (self::$productSection->p_status == 1){
            self::$productSection->update(['p_status' => 2]);
            return true;
        }else{
            if (self::$productSection->update(['p_status' => 1]))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        return self::$productSection;
    }

    public static function deleteProduct($id)
    {
        self::$productSection  = ProductSection::findOrFail($id);
        if (self::$productSection)
        {
            self::$productSection->delete();
            return true;
        }else{
            return false;
        }
    }

}
