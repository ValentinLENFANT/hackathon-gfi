<?php 
class UserController{


	public function addAction($args){

		$userForm = Form::$adduser;
		$userLogForm = Form::$loguser;

		$view = new View("adduser");

		if( isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="POST" ){

			$msgForm = Form::verificator($userForm, $args);
			$view->assign("msgform", $msgForm);
			$view->assign("post", $args);
			
			if( !$msgForm["error"] ){
				$user = new Users($args["email"], $args["pwd"], $args["country"]);
				$user->setAccesstoken( Security::createAccesstoken() );
				$user->save();

			}
		}

		$view->assign("form", $userForm);
		$view->assign("formLog", $userLogForm);


	}


	public function logAction($args){

		//Création des deux formulaires
		$userForm = Form::$adduser;
		$userLogForm = Form::$loguser;

		//précise la vue à afficher
		$view = new View("adduser");

		if( isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="POST" ){
			if( Security::connect($args["email"], $args["pwd"]) ){
				header("Location: ".WEB_PATH);
			}else{
				$msgForm["error"]=true;
				$msgForm["msg"][]="Identifiants incorrects";

				$view->assign("msglogform", $msgForm);
				$view->assign("post", $args);
			}

		}

		$view->assign("form", $userForm);
		$view->assign("formLog", $userLogForm);


	}

	public function logoutAction($args){
		Security::logout();
		header("Location: ".WEB_PATH);
	}


}