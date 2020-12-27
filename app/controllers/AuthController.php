<?php 

namespace App\Controllers;

use App\Controllers\Controller;
use App\User;
use App\General\GeneralFunction as Functions;

class AuthController extends Controller 
{

	public function login() 
	{
		if (hasSession())
		{
			Functions::redirect('', '/', []);
		}
		else
		{
			return view('auth/login');
		}
 	}

 	public function forgotPassword() 
 	{
        return view('auth/forgot-password');
 	}

 	public function register($data = []) 
 	{
 		if (hasSession())
 			return redirect('/');
        return view('auth/register', $data['custom']);
 	}

 	public function auth($request) 
 	{
 		$user = new User();
 		$user = $user->checkAuthenticable($request['method']);
 		$redirect = '/';
 		$content = [];
 		if ($user) 
 		{
 			$content = [
				'TYPE' => 'S', 'DESCRIPTION' => 'Conectado com sucesso'
			 ];
 			$user->session();
 		}
 		else 
 		{
 			$content = [
				'TYPE' => 'E', 'DESCRIPTION' => 'Campos inválidos'
			 ];
 			$redirect = '/login';
 		}
 		Functions::redirect($content, $redirect, []);
 	}

 	public function logOut() 
 	{
 		unset($_SESSION['USER']);
 		$content = [
			'TYPE' => 'S',
			'DESCRIPTION' => 'Desconectado com sucesso'
		];
 		Functions::redirect($content,'/', []);
	}
	 
	public function signin($request) 
	{
		$user = new User();

		foreach($request['method'] as $key => $value) 
		{
			$user->$key = $value;
		}

		$rules = [
			'name' => 'require',
			'username' => 'require|unique:users',
			'password' => 'require|min:4|max:16',
			'email' => 'require|email|unique:users'
		];
		$validate['messages'] = $user->validate($rules);

		if (!empty($validate['messages']))
		{
			Functions::redirect($validate['messages'], '/cadastrar', $validate);
		}
		else
		{
			$user->password = password_hash($user->password, PASSWORD_BCRYPT);
			if ($user->save()) 
			{
				$validate['messages'] = ['TYPE' => 'S', 'DESCRIPTION' => 'Cadastrado com sucesso'];
				Functions::redirect($validate['messages'], '/', $validate);
			}
			else 
			{
				$validate['messages'] = ['TYPE' => 'E', 'DESCRIPTION' => 'Houve um erro de conexão'];
				Functions::redirect($validate['messages'], '/cadastrar', $validate);
			}
		}
	}

}