<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerkCard extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'card_num', 'user_id', 'shop_id', 'points'
    ];

    public function user() {
        return $this->belongsTo(User::class,'id','user_id');
    }

    public function shop() {
        return $this->belongsTo(Shop::class,'id','shop_id');
    }
}
