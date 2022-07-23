<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sign_table extends Model
{
    use HasFactory;
    protected $table = 'signuser';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'fname', 'lname','dob', 'email','password','mobile','otp',
	];
}
