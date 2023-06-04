<?php
class SupplierController extends Database{
	public function update(Supplier $supplier, $supplier_id)
	{
		$data = $this->getData($supplier);
		$sql = "UPDATE supplier SET name=?, street=?, city=?, code=?, tel=?, fax=?, mail=? WHERE supplier_id=?";
		$stmt = $this->connexion->prepare($sql);
		$stmt->bind_param("ssssssss", $data["name"], $data["street"], $data["city"], $data["code"], $data["tel"], $data["fax"], $data["mail"], $supplier_id);
		return $stmt->execute();
	}
	
	
	public function insert(Supplier $Supplier)
	{
		$data = $this->getData($Supplier);
		$sql = "INSERT INTO supplier (name, street ,city , code , tel , fax , mail ) VALUES(?,?,?,?,?,?,?)";
		$stmt = $this->connexion->prepare($sql);
		$stmt->bind_param("sssssss", $data["name"], $data["street"], $data["city"], $data["code"], $data["tel"], $data["fax"], $data["mail"]);
		return $stmt->execute();
	}
	
	
	public function getSupplierById($Supplier_id)
	{
		$sql = "SELECT * FROM supplier WHERE supplier_id=?";
		$stmt = $this->connexion->prepare($sql);
		$stmt->bind_param("i", $Supplier_id);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_array();
	}
	
	
	public function getSupplierByName($name)
	{
		$sql = "SELECT  supplier_id, name FROM supplier WHERE name = ? ";
		$stmt = $this->connexion->prepare($sql);
		$stmt->bind_param("s", $name);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	
	public function fetchAllSupplier()
	{
		return $this->select("supplier");
	}
	
	private function getData(Supplier $supplier){
		return [
			"name"    =>  $supplier->getName(),
			"street" =>  $supplier->getStreet(),
			"city"     =>  $supplier->getCity(),
			"code"     =>  $supplier->getCode(),
			"tel"     =>  $supplier->getTel(),
			"fax"     =>  $supplier->getFax(),
			"mail"   => $supplier->getMail()

		];
	}
}
