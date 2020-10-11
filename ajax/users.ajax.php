<?php

require_once "../controllers/users.controller.php";
require_once "../models/users.model.php";

class AjaxUsers{

	/*=============================================
	EDIT USER
	=============================================*/

	public $idUser;

	public function ajaxEditUser(){

		$item = "id";
		$value = $this->idUser;

		$answer = ControllerUsers::ctrShowUsers($item, $value);

		echo json_encode($answer);
	}


	/*=============================================
	ACTIVATE USER
	=============================================*/

	public $activateUser;
	public $activateId;	

	public function ajaxActivateUser(){

		$table = "users";
		$item1 = "status";
		$value1 = $this->activateUser;

		$item2 = "id";
		$value2 = $this->activateId;

		$answer = UsersModel::mdlUpdateUser($table, $item1, $value1, $item2, $value2);


	}


	/*=============================================
	VALIDATE IF USER ALREADY EXISTS
	=============================================*/

	public $validateUser;

	public function ajaxValidateUser(){

		$item = "userName";
		$value = $this->validateUser;

		$answer = ControllerUsers::ctrShowUsers($item, $value);

		echo json_encode($answer);

	}

	/*=============================================
	VALIDATE IF EMAIL ALREADY EXISTS
	=============================================*/

	public $validateEmail;

	public function ajaxValidateEmail(){

		$item = "email";
		$value = $this->validateEmail;

		$answer = ControllerUsers::ctrShowUsers($item, $value);

		echo json_encode($answer);

	}

}






/*=============================================
EDIT USER
=============================================*/

if (isset($_POST["idUser"])) {

	$edit = new AjaxUsers();
	$edit -> idUser = $_POST["idUser"];
	$edit -> ajaxEditUser();
}

/*=============================================
ACTIVATE USER
=============================================*/

if (isset($_POST["activateUser"])) {

	$activateUser = new AjaxUsers();
	$activateUser -> activateUser = $_POST["activateUser"];
	$activateUser -> activateId = $_POST["activateId"];
	$activateUser -> ajaxActivateUser();
}


/*=============================================
VALIDATE IF USER ALREADY EXISTS
=============================================*/


if (isset($_POST["validateUser"])) {

	$valUser = new AjaxUsers();
	$valUser -> validateUser = $_POST["validateUser"];
	$valUser -> ajaxValidateUser();
}


/*=============================================
VALIDATE IF EMAIL ALREADY EXISTS
=============================================*/


if (isset($_POST["validateEmail"])) {

	$valEmail = new AjaxUsers();
	$valEmail -> validateEmail = $_POST["validateEmail"];
	$valEmail -> ajaxValidateEmail();
}
