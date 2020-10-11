<?php

class controllerProducts{

	/*=============================================
	SHOW PRODUCTS
	=============================================*/
	
	static public function ctrShowProducts($item, $value, $order){

		$table = "products";

		$answer = productsModel::mdlShowProducts($table, $item, $value, $order);

		return $answer;

	}

	/*=============================================
	GETTING PRODUCT ID FOR BARCODE
	=============================================*/
	
	static public function ctrGetId($productCode){

		$item = null;
        $value = null;
        $order = "id";

        $idProduct = null;

        $products = ControllerProducts::ctrShowProducts($item, $value, $order);

        // var_dump($products);

        for($i=0; $i < count($products); $i++){

            if($products[$i]["code"] == $productCode){

            	$idProduct = $products[$i]["id"];

            }

        }

		return $idProduct;

	}

	/*=============================================
	CREATE PRODUCTS
	=============================================*/

	static public function ctrCreateProducts(){

		if(isset($_POST["newDescription"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newDescription"]) &&
			   preg_match('/^[0-9]+$/', $_POST["newStock"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["newBuyingPrice"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["newSellingPrice"])){

		   		/*=============================================
				VALIDATE IMAGE
				=============================================*/

			   	$route = "views/img/products/default/anonymous.png";

			   	if(isset($_FILES["newProdPhoto"]["tmp_name"])){

					list($width, $height) = getimagesize($_FILES["newProdPhoto"]["tmp_name"]);

					$newWidth = 500;
					$newHeight = 500;

					/*=============================================
					we create the folder to save the picture
					=============================================*/

					$folder = "views/img/products/".$_POST["newCode"];

					mkdir($folder, 0755);

					/*=============================================
					WE APPLY DEFAULT PHP FUNCTIONS ACCORDING TO THE IMAGE FORMAT
					=============================================*/

					if($_FILES["newProdPhoto"]["type"] == "image/jpeg"){

						/*=============================================
						WE SAVE THE IMAGE IN THE FOLDER
						=============================================*/

						$random = mt_rand(100,999);

						$route = "views/img/products/".$_POST["newCode"]."/".$random.".jpg";

						$origin = imagecreatefromjpeg($_FILES["newProdPhoto"]["tmp_name"]);						

						$destiny = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagejpeg($destiny, $route);

					}

					if($_FILES["newProdPhoto"]["type"] == "image/png"){

						/*=============================================
						WE SAVE THE IMAGE IN THE FOLDER
						=============================================*/

						$random = mt_rand(100,999);

						$route = "views/img/products/".$_POST["newCode"]."/".$random.".png";

						$origin = imagecreatefrompng($_FILES["newProdPhoto"]["tmp_name"]);						

						$destiny = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagepng($destiny, $route);

					}

				}

				$table = "products";

				$data = array("idCategory" => $_POST["newCategory"],
							   "code" => $_POST["newCode"],
							   "description" => $_POST["newDescription"],
							   "stock" => $_POST["newStock"],
							   "buyingPrice" => $_POST["newBuyingPrice"],
							   "sellingPrice" => $_POST["newSellingPrice"],
							   "image" => $route);

				$answer = productsModel::mdlAddProduct($table, $data);

				if($answer == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El Product ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Close"
							  }).then(function(result){
										if (result.value) {

										window.location = "products";


										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Product no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "products";

							}
						})

			  	</script>';
			}

		}

	}

	/*=============================================
	EDIT PRODUCT
	=============================================*/

	static public function ctrEditProduct(){

		if(isset($_POST["editDescription"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editDescription"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editStock"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["editBuyingPrice"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editSellingPrice"])){

		   		/*=============================================
				VALIDATE IMAGE
				=============================================*/

			   	$route = $_POST["currentImage"];

			   	if(isset($_FILES["editImage"]["tmp_name"]) && !empty($_FILES["editImage"]["tmp_name"])){

					list($width, $height) = getimagesize($_FILES["editImage"]["tmp_name"]);

					$newWidth = 500;
					$newHeight = 500;

					/*=============================================
					WE CREATE THE FOLDER WHERE WE WILL SAVE THE PRODUCT IMAGE
					=============================================*/

					$folder = "views/img/products/".$_POST["editCode"];

					/*=============================================
					WE ASK IF WE HAVE ANOTHER PICTURE IN THE DB
					=============================================*/

					if(!empty($_POST["currentImage"]) && $_POST["currentImage"] != "views/img/products/default/anonymous.png"){

						unlink($_POST["currentImage"]);

					}else{

						mkdir($folder, 0755);	
					
					}
					
					/*=============================================
					WE APPLY DEFAULT PHP FUNCTIONS ACCORDING TO THE IMAGE FORMAT
					=============================================*/

					if($_FILES["editImage"]["type"] == "image/jpeg"){

						/*=============================================
						WE SAVE THE IMAGE IN THE FOLDER
						=============================================*/

						$random = mt_rand(100,999);

						$route = "views/img/products/".$_POST["editCode"]."/".$random.".jpg";

						$origin = imagecreatefromjpeg($_FILES["editImage"]["tmp_name"]);						

						$destiny = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagejpeg($destiny, $route);

					}

					if($_FILES["editImage"]["type"] == "image/png"){

						/*=============================================
						WE SAVE THE IMAGE IN THE FOLDER
						=============================================*/

						$random = mt_rand(100,999);

						$route = "views/img/products/".$_POST["editCode"]."/".$random.".png";

						$origin = imagecreatefrompng($_FILES["editImage"]["tmp_name"]);

						$destiny = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagepng($destiny, $route);

					}

				}

				$table = "products";

				$data = array("idCategory" => $_POST["editCategory"],
							   "code" => $_POST["editCode"],
							   "description" => $_POST["editDescription"],
							   "stock" => $_POST["editStock"],
							   "buyingPrice" => $_POST["editBuyingPrice"],
							   "sellingPrice" => $_POST["editSellingPrice"],
							   "image" => $route);

				$answer = productsModel::mdlEditProduct($table, $data);

				if($answer == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "The product has been edited",
							  showConfirmButton: true,
							  confirmButtonText: "Close"
							  }).then(function(result){
										if (result.value) {

										window.location = "products";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡The Product cannot be empty or have special characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "products";

							}
						})

			  	</script>';
			}

		}

	}

	/*=============================================
	GENERATE BARCODE
	=============================================*/

	static public function ctrGenerateBarcode(){

		if(isset($_POST["editDescriptionBarcode"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editDescriptionBarcode"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editStockBarcode"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["editBuyingPriceBarcode"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editSellingPriceBarcode"])){

		   		/*=============================================
				VALIDATE IMAGE
				=============================================*/

			   	$route = $_POST["currentImage"];

			   	if(isset($_FILES["editImage"]["tmp_name"]) && !empty($_FILES["editImage"]["tmp_name"])){

					list($width, $height) = getimagesize($_FILES["editImage"]["tmp_name"]);

					$newWidth = 500;
					$newHeight = 500;

					/*=============================================
					WE CREATE THE FOLDER WHERE WE WILL SAVE THE PRODUCT IMAGE
					=============================================*/

					$folder = "views/img/products/".$_POST["editCode"];

					/*=============================================
					WE ASK IF WE HAVE ANOTHER PICTURE IN THE DB
					=============================================*/

					if(!empty($_POST["currentImage"]) && $_POST["currentImage"] != "views/img/products/default/anonymous.png"){

						unlink($_POST["currentImage"]);

					}else{

						mkdir($folder, 0755);	
					
					}
					
					/*=============================================
					WE APPLY DEFAULT PHP FUNCTIONS ACCORDING TO THE IMAGE FORMAT
					=============================================*/

					if($_FILES["editImage"]["type"] == "image/jpeg"){

						/*=============================================
						WE SAVE THE IMAGE IN THE FOLDER
						=============================================*/

						$random = mt_rand(100,999);

						$route = "views/img/products/".$_POST["editCode"]."/".$random.".jpg";

						$origin = imagecreatefromjpeg($_FILES["editImage"]["tmp_name"]);						

						$destiny = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagejpeg($destiny, $route);

					}

					if($_FILES["editImage"]["type"] == "image/png"){

						/*=============================================
						WE SAVE THE IMAGE IN THE FOLDER
						=============================================*/

						$random = mt_rand(100,999);

						$route = "views/img/products/".$_POST["editCode"]."/".$random.".png";

						$origin = imagecreatefrompng($_FILES["editImage"]["tmp_name"]);

						$destiny = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagepng($destiny, $route);

					}

				}

				$table = "products";

				$data = array("idCategory" => $_POST["generateBarcode"],
							   "code" => $_POST["editCodeBarcode"],
							   "description" => $_POST["editDescriptionBarcode"],
							   "stock" => $_POST["editStockBarcode"],
							   "buyingPrice" => $_POST["editBuyingPriceBarcode"],
							   "sellingPrice" => $_POST["editSellingPriceBarcode"],
							   "image" => $route);

				$answer = productsModel::mdlGenerateBarcode($table, $data);

				if($answer == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "barcode generated",
							  showConfirmButton: true,
							  confirmButtonText: "Close"
							  }).then(function(result){
										if (result.value) {

										window.location = "barcode-print";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡The Product cannot be empty or have special characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "products";

							}
						})

			  	</script>';
			}

		}

	}

	/*=============================================
	DELETE PRODUCT
	=============================================*/
	static public function ctrDeleteProduct(){

		if(isset($_GET["idProduct"])){

			$table ="products";
			$datum = $_GET["idProduct"];

			if($_GET["image"] != "" && $_GET["image"] != "views/img/products/default/anonymous.png"){

				unlink($_GET["image"]);
				rmdir('views/img/products/'.$_GET["code"]);

			}

			$answer = productsModel::mdlDeleteProduct($table, $datum);

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The Product has been successfully deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

								window.location = "products";

								}
							})

				</script>';

			}		
		
		}

	}

	/*=============================================
	SHOW ADDING OF THE SALES
	=============================================*/

	static public function ctrShowAddingOfTheSales(){

		$table = "products";

		$answer = ProductsModel::mdlShowAddingOfTheSales($table);

		return $answer;

	}

}