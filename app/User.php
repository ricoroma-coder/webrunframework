<?php 

namespace App;

use App\General\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
class User extends Auth 
{
	protected $table = 'users';
	protected $fillable = ['name','username','email','password'];
	protected $primaryKey = 'username';
	public $incrementing = false;
	protected $keyType = 'string';
	protected $attributes = [
		'name' => null,
		'username' => null,
		'email' => null,
		'password' => null,
		'lost_pass' => 0,
		'active' => 1
	];
	
	public static function findUser($field, $value)
	{
		return static::query()->where($field, $value)->first();
	}

	public function sendEmail($subject, $message)
	{
		$mail = new PHPMailer(true);
		try
		{
			$mail->isSMTP();
			$mail->SMTPAuth = true;
			$mail->Username = 'ricoroma14@gmail.com';
			$mail->Password = 'Henriquepires1998';
			$mail->SMTPSecure = 'tls';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->setFrom('ricoroma14@gmail.com', 'Sistema');
			$mail->addAddress($this->email,$this->name);
			$mail->isHTML(true);
			$mail->Subject = $subject;
			$mail->Body = $message;
			$mail->AltBody = "Esta é a mensagem padrão para servidores que não aceitam HTML\n" . $message;
			$mail->send();

			return true;
		}
		catch(Exception $e)
		{
			return $mail->ErrorInfo;
		}
	}

	public function session()
	{
		$_SESSION['USER'] = $this->id;
	}
}