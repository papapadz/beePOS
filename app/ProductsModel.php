<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsModel extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_products';
    protected $fillable = [
        'product_name', 'product_category', 'quantity', 'description', 'img_file', 'company_id'
    ];

    public function sales() {
        return $this->belongsTo(SalesModel::class,'product_id','product_id');
    }

    public function price() {
        return $this->hasOne(ProductPricesModel::class,'product_id','product_id')->latest();
    }

    public function category() {
        return $this->hasOne(ProductCategoryModel::class,'product_category_id','product_category');
    }

    public function shop() {
        return $this->belongsTo(Shop::class,'id','company_id');
    }
}