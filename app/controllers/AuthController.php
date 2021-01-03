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

	public function recoveryPassword($request)
	{
		$user = new User();

		$user->username = $request['method']['username'];

		$rules = [
			'username' => 'require'
		];
		$validate['messages'] = $user->validate($rules);

		if (!empty($validate['messages']))
		{
			Functions::redirect($validate['messages'], '/recuperar-senha', $validate);
		}
		else
		{
			$searchUser = User::findUser('username', $user->username);
			$emailSubject = 'Recuperar Senha';
			$link = '127.0.0.1:8080/recuperar-senha/recuperar/' . $user->username;
			$emailBody = '<h1><strong>E-mail de recuperação de senha<strong></h1>
			<p>Olá ' . ucwords($searchUser->name) . ', detectei aqui que você esqueceu a sua senha, acesse o link abaixo para receber sua senha</p>
			<p>Clique no link para recuperar a senha: ' . $link . '</p>';
			$user->name = $searchUser->name;
			$user->email = $searchUser->email;
			if ($user->sendEmail($emailSubject, $emailBody) !== true)
			{
				$message = [
					'TYPE' => 'E',
					'DESCRIPTION' => 'Não foi possível mandar o e-mail'
				];
				Functions::redirect($message, '/recuperar-senha', []);
			}
			else
			{
				$message = [
					'TYPE' => 'S',
					'DESCRIPTION' => 'E-mail enviado'
				];
				Functions::redirect($message, '/login', []);
			}
		}
	}

	public function recovery()
	{
		$username = Functions::getUrlContent();
		$user = User::findUser('username', $username);
		$user->lost_pass = 1;
		$password = Functions::newRandomString('ALPHA', 8);
		$user->password = password_hash($password, PASSWORD_BCRYPT);
		if ($user->update() !== true)
		{
			$message = [
				'TYPE' => 'E',
				'DESCRIPTION' => 'Houve um erro ao tentar atualizar a senha'
			];
			Functions::redirect($message, '/recuperar-senha', []);
		}
		else
		{
			$emailSubject = 'Sua nova senha';
			$emailBody = '<h1><strong>Aqui está a sua senha<strong></h1>
			<p>Olá ' . ucwords($user->name) . ', não tenho permissão para buscar sua senha antiga, mas consegui gerar uma nova senha para você!</p>
			<p>Aqui está ela: ' . $password . '</p>
			<p>Esperamos ter ajudado :)</p>';
			if ($user->sendEmail($emailSubject, $emailBody) !== true)
			{
				$message = [
					'TYPE' => 'E',
					'DESCRIPTION' => 'Não foi possível mandar o e-mail com a nova senha, tente novamente mais tarde'
				];
				Functions::redirect($message, '/recuperar-senha', []);
			}
			else
			{
				$message = [
					'TYPE' => 'S',
					'DESCRIPTION' => 'Nova senha enviada por email'
				];
				Functions::redirect($message, '/login', []);
			}
		}
		
	}

}