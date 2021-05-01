<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminsOtp extends Model
{
	protected $table='admins_otp';
	protected $guard=[];
	public $timestamps=false; 
}
