<?php 

namespace App;

use App\General\Auth;
 
class User extends Auth {

	protected $table = 'users';
	protected $fillable = ['name','username','email','password'];
    
}