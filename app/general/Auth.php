<?php 

namespace App\General;

use App\General\Validate;

class Auth extends Validate {

	public function checkAuthenticable($data) {
		$obj = $this::where('username', $data['username'])->first();

		if (isset($obj) && !empty($obj)) {
 			if (password_verify($data['password'], $obj->password)) {
 				return $obj;
 			}
 			else {
 				return false;
 			}
 		}
 		else
 			return false;
	}

	public function session() {
		if (isset($_SESSION))
			session_destroy();
		session_start();
		$_SESSION['obj'] = $this->id;
	}

}