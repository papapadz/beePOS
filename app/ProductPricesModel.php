<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPricesModel extends Model
{
    use SoftDeletes;
    
    protected $connection = 'mysql';
    protected $primaryKey = 'price_id';
    protected $table = 'tbl_product_prices';
    protected $fillable = [
        'product_id', 'unit_cost', 'unit_price'
    ];

    public function sales() {
        return $this->belongsTo(SalesModel::class,'price_id','price_id');
    }

    public function product() {
        return $this->belongsTo(ProductsModel::class,'product_id','product_id');
    }
}