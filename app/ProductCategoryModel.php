<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategoryModel extends Model
{

    use SoftDeletes;

    protected $connection = 'mysql';
    protected $primaryKey = 'product_category_id';
    protected $table = 'tbl_product_categories';
    protected $fillable = [
        'category', 'description'
    ];
    
    public function products() {
        return $this->hasMany(ProductsModel::class,'product_category','product_category_id')->with('price');
    }
}