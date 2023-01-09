<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Affiliation extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id', 'shop_id', 'role_id'
    ];

    public function user() {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function shop() {
        return $this->hasOne(Shop::class,'id','shop_id')->with('products');
    }

    public function role() {
        return $this->hasOne(UserRole::class,'id','role_id'); 
    }
}
