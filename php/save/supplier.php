<?php
/*******Tabelle Lieferanten******************/
require_once "../controller/Database.php";  
require_once "../model/Supplier.php";
require_once "../controller/SupplierController.php";

$supplier_id = (!empty($_POST["supplier_id"])) ? trim($_POST["supplier_id"]):"";
$msg = "error"; 

if(!empty($_POST["name"])){
	
	$supplierController = new SupplierController();
	$supplier = new Supplier();


	$supplier->setName(trim($_POST["name"]))->setStreet(trim($_POST["street"]))
	->setCity(trim($_POST["city"]))->setCode(trim($_POST["code"]))
	->setTel(trim($_POST["tel"]))->setFax(trim($_POST["fax"]))
	->setMail(trim($_POST["mail"]));

	if(!empty($supplier_id)){	
		if($supplierController->update($supplier, $supplier_id) === true)
			$msg = "updated";
	}
	else{
		if($supplierController->insert($supplier) === true)
			$msg="added";
	}
	echo json_encode(["msg"=>$msg]);
	$supplierController->dbClose();
}

?> 
