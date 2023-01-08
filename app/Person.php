<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;

    protected $fillable = ['lastname','firstname','middlename','birthdate','address','citymun_id','zipcode'];

    public function user() {
        return $this->belongsTo(User::class,'id','person_id');
    }
}
