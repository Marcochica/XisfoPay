<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Transfer extends Authenticatable
{
	use Notifiable;

	protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'customer_id_transfer', 'amount_transfer'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	protected $hidden = [];

	/**
     * Get the DNI types record associated with the employee.
     */
    public function customers()
	{
		return $this->belongsTo('App\User', 'customer_id');
	}

}
