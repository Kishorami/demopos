<?php

require_once 'connection.php';

class productsModel{
	
	/*=============================================
	SHOWING PRODUCTS
	=============================================*/

	static public function mdlShowProducts($table, $item, $value, $order){

		if($item != null){

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY $order DESC");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY $order DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ADDING PRODUCT
	=============================================*/
	static public function mdlAddProduct($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(idCategory, code, description, image, stock, buyingPrice, sellingPrice) VALUES (:idCategory, :code, :description, :image, :stock, :buyingPrice, :sellingPrice)");

		$stmt->bindParam(":idCategory", $data["idCategory"], PDO::PARAM_INT);
		$stmt->bindParam(":code", $data["code"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
		$stmt->bindParam(":image", $data["image"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $data["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":buyingPrice", $data["buyingPrice"], PDO::PARAM_STR);
		$stmt->bindParam(":sellingPrice", $data["sellingPrice"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITING PRODUCT
	=============================================*/
	static public function mdlEditProduct($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET idCategory = :idCategory, description = :description, image = :image, stock = :stock, buyingPrice = :buyingPrice, sellingPrice = :sellingPrice WHERE code = :code");

		$stmt->bindParam(":idCategory", $data["idCategory"], PDO::PARAM_INT);
		$stmt->bindParam(":code", $data["code"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
		$stmt->bindParam(":image", $data["image"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $data["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":buyingPrice", $data["buyingPrice"], PDO::PARAM_STR);
		$stmt->bindParam(":sellingPrice", $data["sellingPrice"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	Generate Barcode
	=============================================*/
	static public function mdlGenerateBarcode($table, $data){


		

		  // var_dump($data);

		// include '../extensions/barcode/barcode128.php';
		include 'barcode.php';
		// include 'views/modules/barcode-print.php';
		$product = $data['description'];
		$product_id = $data['code'];
		$rate = $data['sellingPrice'];
		$quantity = $data['stock'];

		// for($i=1;$i<=$quantity;$i++){
		// 	echo "<p class='inline'><span ><b>Item: $product</b></span>".bar128(stripcslashes($data['code']))."<span ><b>Price: ".$rate." </b><span></p>&nbsp&nbsp&nbsp&nbsp";
		// }

		 // return "ok";

	}




	/*=============================================
	DELETING PRODUCT
	=============================================*/

	static public function mdlDeleteProduct($table, $data){

		$stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");

		$stmt -> bindParam(":id", $data, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	UPDATE PRODUCT
	=============================================*/

	static public function mdlUpdateProduct($table, $item1, $value1, $value){

		$stmt = Connection::connect()->prepare("UPDATE $table SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $value, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	SHOW ADDING OF THE SALES
	=============================================*/	

	static public function mdlShowAddingOfTheSales($table){

		$stmt = Connection::connect()->prepare("SELECT SUM(sales) as total FROM $table");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}
}