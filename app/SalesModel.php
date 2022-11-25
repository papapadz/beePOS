<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesModel extends Model
{
    use SoftDeletes;
    protected $connection = 'mysql';
    protected $primaryKey = 'sales_id';
    protected $table = 'tbl_sales';
    protected $fillable = [
        'product_id', 'qty', 'price_id', 'discount_amount', 'user_id'
    ];

    public function transaction() {
        return $this->belongsTo(TransactionsModel::class,'transaction_id','transaction_id');
    }

    public function products() {
        return $this->hasOne(ProductsModel::class,'product_id','product_id')->with('price');
    }

    public function user() {
        return $this->hasOne(User::class,'id','user_id');
    }

}