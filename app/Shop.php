<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{   
    use SoftDeletes;
    
    protected $fillable = [
        'name', 'description', 'address', 'muncity_id', 'num_employees', 'business_type', 'website', 'email', 'contact_no'
    ];

    public function city() {
        return $this->belongsTo(City::class,'muncity_id','id');
    }

    public function perkCards() {
        return $this->hasMany(PerkCard::class,'shop_id','id');
    }
}
