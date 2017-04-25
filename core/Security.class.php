<?php
class Security{


	public static function connect($email, $pwd){

		//Essayer de récupérer le mot de passe ne bdd pour l'email correspondant $email
		$user = new Users();
		$resultat = $user->getOneBy("email", $email);
		if(!empty($resultat) && password_verify($pwd,$resultat["password"])){
			
			$newAccessToken = self::createAccesstoken();

			$user->setId($resultat["id"]);
			$user->setEmail($email);
			$user->setPassword($pwd);
			$user->setCountry($resultat["country"]);
			$user->setAccesstoken($newAccessToken);
			$user->save();

			$_SESSION["email"] = $email;
			$_SESSION["accesstoken"] = $newAccessToken;


			return true;
		}
		return false;
	}



	public static function isConnected(){

		if(isset($_SESSION["email"]) && isset($_SESSION["accesstoken"]) ){
			$user = new Users();


			//Est ce que en base j'ai une ligne avec cet email et cet accesstoken
			if($user->exist( [
					"email"=>$_SESSION["email"],
					"accesstoken"=>$_SESSION["accesstoken"]
				])){

				//Si oui alors regénérer un nouvel accesstoken en bdd et en session
				$newAccessToken = self::createAccesstoken();
				$_SESSION["accesstoken"] = $newAccessToken;
				$user->update(["accesstoken"=>$newAccessToken], ["email"=>$_SESSION["email"]]);

				return true;
			}
		}else{
			self::logout();
			return false;
		}
	}


	public static function createAccesstoken(){
		//32 caractères
		return md5(uniqid());
	}




	public static function logout(){
		session_destroy();
	}



}







