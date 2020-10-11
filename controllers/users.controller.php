<?php

class ControllerUsers{

	/*=============================================
	USER LOGIN
	=============================================*/
	
	static public function ctrUserLogin(){

		if (isset($_POST["loginUser"])) {
			
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["loginUser"]) && 
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["loginPass"])) {


				$encryptpass = crypt($_POST["loginPass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				
				$table = 'users';

				$item = 'userName';
				
				$value = $_POST["loginUser"];

				$answer = UsersModel::MdlShowUsers($table, $item, $value);

				

				//var_dump($answer);

				if($answer["userName"] == $_POST["loginUser"] && $answer["password"] == $encryptpass){

					if($answer["status"] == 1){

						$_SESSION["loggedIn"] = "ok";
						$_SESSION["loggedIn"] = "ok";
						$_SESSION["id"] = $answer["id"];
						$_SESSION["name"] = $answer["name"];
						$_SESSION["userName"] = $answer["userName"];
						$_SESSION["photo"] = $answer["photo"];
						$_SESSION["role"] = $answer["role"];
					

						date_default_timezone_set("Asia/Dhaka");

						$date = date('Y-m-d');
						$hour = date('H:i:s');

						$actualDate = $date.' '.$hour;

						$item1 = "lastLogin";
						$value1 = $actualDate;

						$item2 = "id";
						$value2 = $answer["id"];

						$lastLogin = UsersModel::mdlUpdateUser($table, $item1, $value1, $item2, $value2);

						if($lastLogin == "ok"){

							echo '<script>
							
							swal({
								type: "success",
								title: "User '.$answer["userName"].' Logedin succesfully",
								showConfirmButton: true,
								confirmButtonText: "Close"

							}).then(function(result){

								if(result.value){

									window.location = "home";
								}

							});
							
							</script>';	
							
						}
						// echo '<script>

						// 	window.location = "home";

						// </script>';

						 

						}else{

							 echo '<script>
					
								swal({
									type: "error",
									title: "User Not Activated",
									showConfirmButton: true,
									confirmButtonText: "Close"
						
									}).then(function(result){

										if(result.value){

											window.location = "login";
										}

									});
					
							</script>';

						}

				}else{

					 echo '<script>
					
								swal({
									type: "error",
									title: "User or Password incorrect",
									showConfirmButton: true,
									confirmButtonText: "Close"
						
									}).then(function(result){

										if(result.value){

											window.location = "login";
										}

									});
					
							</script>';
					
				}
			}else if (preg_match('/@/', $_POST["loginUser"]) && 
						preg_match('/^[a-zA-Z0-9]+$/', $_POST["loginPass"])) {

					$encryptpass = crypt($_POST["loginPass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					
					$table = 'users';

					$item = 'email';
					
					$value = $_POST["loginUser"];

					$answer = UsersModel::MdlShowUsers($table, $item, $value);

					

					//var_dump($answer);

					if($answer["email"] == $_POST["loginUser"] && $answer["password"] == $encryptpass){

						$_SESSION["loggedIn"] = "ok";
						$_SESSION["loggedIn"] = "ok";
						$_SESSION["id"] = $answer["id"];
						$_SESSION["name"] = $answer["name"];
						$_SESSION["userName"] = $answer["userName"];
						$_SESSION["photo"] = $answer["photo"];
						$_SESSION["role"] = $answer["role"];
					
						// echo '<script>

						// 	window.location = "home";

						// </script>';

						echo '<script>
						
								swal({
									type: "success",
									title: "User '.$answer["userName"].' Logedin succesfully",
									showConfirmButton: true,
									confirmButtonText: "Close"

								}).then(function(result){

									if(result.value){

										window.location = "home";
									}

								});
						
							</script>';

					}else{

						echo '<script>
					
								swal({
									type: "error",
									title: "User or Password incorrect",
									showConfirmButton: true,
									confirmButtonText: "Close"
						
									}).then(function(result){

										if(result.value){

											window.location = "login";
										}

									});
					
							</script>';

					}
			}


		}
	}

	/*=============================================
	USER REGISTER
	=============================================*/

	static public function ctrCreateUser(){

		if (isset($_POST["newUserName"])) {
			
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["newName"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["newUserName"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["newPassword"]) && 
				preg_match('/@/', $_POST["newemail"])){


				/*=============================================
				VALIDATE IMAGE
				=============================================*/

				$photo = "";
			
				if (isset($_FILES["newPhoto"]["tmp_name"])){

					list($width, $height) = getimagesize($_FILES["newPhoto"]["tmp_name"]);
					
					$newWidth = 500;
					$newHeight = 500;

					/*=============================================
					Let's create the folder for each user
					=============================================*/

					$folder = "views/img/users/".$_POST["newUserName"];

					mkdir($folder, 0755);

					/*=============================================
					PHP functions depending on the image
					=============================================*/

					if($_FILES["newPhoto"]["type"] == "image/jpeg"){

						$randomNumber = mt_rand(100,999);
						
						$photo = "views/img/users/".$_POST["newUserName"]."/".$randomNumber.".jpg";
						
						$srcImage = imagecreatefromjpeg($_FILES["newPhoto"]["tmp_name"]);
						
						$destination = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagejpeg($destination, $photo);

					}

					if ($_FILES["newPhoto"]["type"] == "image/png") {

						$randomNumber = mt_rand(100,999);
						
						$photo = "views/img/users/".$_POST["newUserName"]."/".$randomNumber.".png";
						
						$srcImage = imagecreatefrompng($_FILES["newPhoto"]["tmp_name"]);
						
						$destination = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagepng($destination, $photo);
					}

				}

				$table = 'users';

				 $encryptpass = crypt($_POST["newPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$data = array('name' => $_POST["newName"],
							  'userName' => $_POST["newUserName"],
								'password' => $encryptpass,
								'email' => $_POST["newemail"],
								'role' => $_POST["newRole"], 
								'photo' => $photo);

				$answer = UsersModel::mdlAddUser($table, $data);



				if ($answer == 'ok') {

						echo '<script>
						
						swal({
							type: "success",
							title: "User '.$_POST["newName"].' added succesfully",
							showConfirmButton: true,
							confirmButtonText: "Close"

						}).then(function(result){

							if(result.value){

								window.location = "users";
							}

						});
						
						</script>';

				}


			}else{

				echo '<script>
					
					swal({
						type: "error",
						title: "No especial characters or blank fields",
						showConfirmButton: true,
						confirmButtonText: "Close"
			
						}).then(function(result){

							if(result.value){

								window.location = "users";
							}

						});
					
				</script>';
			}
	
		}

	}
	/*=============================================
	SHOW USER
	=============================================*/

	static public function ctrShowUsers($item, $value){

		$table = "users";

		$answer = UsersModel::MdlShowUsers($table, $item, $value);

		return $answer;
	}

	/*=============================================
	EDIT USER
	=============================================*/

	static public function ctrEditUser(){

		if (isset($_POST["EditUserName"])) {
			
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditName"])){

				if (preg_match('/@/', $_POST["Editemail"])){

					/*=============================================
					VALIDATE IMAGE
					=============================================*/

					$photo = $_POST["currentPicture"];

					if(isset($_FILES["editPhoto"]["tmp_name"]) && !empty($_FILES["editPhoto"]["tmp_name"])){

						list($width, $height) = getimagesize($_FILES["editPhoto"]["tmp_name"]);
						
						$newWidth = 500;
						$newHeight = 500;

						/*=============================================
						Let's create the folder for each user
						=============================================*/

						$folder = "views/img/users/".$_POST["EditUserName"];

						/*=============================================
						we ask first if there's an existing image in the database
						=============================================*/

						if (!empty($_POST["currentPicture"])){
							
							unlink($_POST["currentPicture"]);

						}else{

							mkdir($folder, 0755);

						}

						/*=============================================
						PHP functions depending on the image
						=============================================*/

						if($_FILES["editPhoto"]["type"] == "image/jpeg"){

							/*We save the image in the folder*/

							$randomNumber = mt_rand(100,999);
							
							$photo = "views/img/users/".$_POST["EditUserName"]."/".$randomNumber.".jpg";
							
							$srcImage = imagecreatefromjpeg($_FILES["editPhoto"]["tmp_name"]);
							
							$destination = imagecreatetruecolor($newWidth, $newHeight);

							imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

							imagejpeg($destination, $photo);

						}
						
						if ($_FILES["editPhoto"]["type"] == "image/png") {

							/*We save the image in the folder*/

							$randomNumber = mt_rand(100,999);
							
							$photo = "views/img/users/".$_POST["EditUserName"]."/".$randomNumber.".png";
							
							$srcImage = imagecreatefrompng($_FILES["editPhoto"]["tmp_name"]);
							
							$destination = imagecreatetruecolor($newWidth, $newHeight);

							imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

							imagepng($destination, $photo);
						}

					}

					
					$table = 'users';

					if($_POST["EditPasswd"] != ""){

						if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["EditPasswd"])){

							$encryptpass = crypt($_POST["EditPasswd"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

						}

						else{

							echo '<script>
						
								swal({
									type: "error",
									title: "No especial characters in the password or blank fields",
									showConfirmButton: true,
									confirmButtonText: "Close"

									}).then(function(result){
											
										if (result.value) {
							
											window.location = "users";

										}
									});
								
							</script>';
						}
					
					}else{

						$encryptpass = $_POST["currentPasswd"];
						
					}

					$data = array('name' => $_POST["EditName"],
									'userName' => $_POST["EditUserName"],
									'email' => $_POST["Editemail"],
									'password' => $encryptpass,
									'role' => $_POST["EditRole"],
									'photo' => $photo);

					$answer = UsersModel::mdlEditUser($table, $data);

					if ($answer == 'ok') {
						
						echo '<script>
						
							swal({
								type: "success",
								title: "¡User edited succesfully!",
								showConfirmButton: true,
								confirmButtonText: "Close"

							 }).then(function(result){
								
								if (result.value) {

									window.location = "users";
								}

							});
						
						</script>';
					}
					else{
						echo '<script>
							
							swal({
								type: "error",
								title: "No especial characters in the name or blank field",
								showConfirmButton: true,
								confirmButtonText: "Close"
								 }).then(function(result){
										
									if (result.value) {

										window.location = "users";
									
									}

								});
							
						</script>';
					}
				}
			}	
		
		}
	
	}

	/*=============================================
	DELETE USER
	=============================================*/

	static public function ctrDeleteUser(){

		if(isset($_GET["userId"])){

			$table ="users";
			$data = $_GET["userId"];

			if($_GET["userPhoto"] != ""){

				unlink($_GET["userPhoto"]);				
				rmdir('views/img/users/'.$_GET["username"]);

			}

			$answer = UsersModel::mdlDeleteUser($table, $data);

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The user has been succesfully deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"

					  }).then(function(result){
					  	
						if (result.value) {

						window.location = "users";

						}
					})

				</script>';

			}		

		}

	}

}