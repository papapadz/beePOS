<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeginningBalancesModel extends Model
{	
    protected $connection = 'mysql';
    protected $primaryKey = 'beginning_balance_id';
    protected $table = 'tbl_beginning_balances';

    protected $fillable = [
        'user_id', 'balance', 'cash_count', 'is_active', 'shop_id'
    ];

    public function user() {
        $this->hasOne(User::class,'id','user_id');
    }
}