<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventorySection extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'inventories';
    protected $dates = ['deleted_at'];
    protected $fillable = ['product_id', 'category_id', 'in_qty', 'in_status'];
}
