<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'disbursement_id','dni_type_id', 'dni', 'type_user', 'name', 'middlename', 'lastname', 'surname', 'email', 'password', 'mobile_code', 'mobile','bank_name','account_number','civil_status', 'avatar', 'valid', 'state','created_at','updated_at','remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){
        if(!empty($value)){
            $this->attributes['password'] = bcrypt($value);
        }
    }

}
