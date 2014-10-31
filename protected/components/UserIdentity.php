<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
public function authenticate()
	{


		$username = $this->username;
		$passwprd = $this->password;
		
		$user = Clientes::model()->find(array('condition'=>"User='$username'"));
		
		if(!empty($user)){
			
			if($passwprd == $user->Pass){
				// authentication is success
// 				die("you are logged");
				$this->errorCode=self::ERROR_NONE;
			}else{
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			}
		}else{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		Yii::app()->user->setState('Tipo',$user->Tipo);
		Yii::app()->user->setState('IdEmpresa',$user->IdEmpresa);
// 		echo ("este es el tipo del usuario" + $user->Tipo);
		return !$this->errorCode;
		}
}