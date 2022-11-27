<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
 
    use SoftDeletes;

    protected $connection = 'mysql';
    public $table      = 'tbl_users';
    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'person_id', 'email', 'username', 'password', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function person() {
        return $this->hasOne(Person::class,'person_id','id');
    }

    public function affiliation() {
        return $this->hasOne(Affiliation::class,'user_id','id');
    }
    
    public function perkCards() {
        return $this->hasMany(PerkCard::class,'user_id','id');
    }
}
