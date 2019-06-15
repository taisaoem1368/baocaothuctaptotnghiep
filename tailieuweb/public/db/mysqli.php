<?php 
// include_once 'public/db/config.php';
$_DIR_ = dirname(dirname(__FILE__));
include_once $_DIR_."\db\config.php";

Class mysqli_db {
	public static $conn;

	public function __construct() {
		/*
			mysqli thủ tục
			$mysqli = mysqli_connect( 'localhost', 'username', 'password', 'database');
		*/
		//mysqli hướng đối tượng
		self::$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		self::$conn->set_charset('utf8');
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	}

	public function __destruct() {
		self::$conn->close();
	}

	public function getData($obj) {
		$arr = array();
		while ($row = $obj->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}

	public function getDataMotos()
	{
		$data = self::$conn->prepare('SELECT * FROM `motos`');
		$data->execute();
		$result = $data->get_result();
		return $this->getData($result);
	}

	public function deleteMoto($id)
	{
		if($this->checkExistMoto($id)) {
			$sql = self::$conn->prepare('DELETE FROM `motos` WHERE `moto_id` = ?');
			$sql->bind_param('s', $id);
			$sql->execute();
			return true;
		} 
		return false;
	}

	public function updateMoto($moto)
	{

		$sql = self::$conn->prepare('UPDATE `motos` SET `moto_name`= ?,`moto_color`= ?,`moto_weight`= ?,`moto_size`= ? WHERE `moto_id` = ?');
		$sql->bind_param('ssiis', $name, $color, $weight, $size, $id);

		if($this->checkExistMoto($moto['moto_id']))
		{
			$id = $moto['moto_id'];
			$name = $moto['moto_name'];
			$color = $moto['moto_color'];
			$weight = $moto['moto_weight'];
			$size = $moto['moto_size'];
		    $sql->execute();
			return true;
		}
		return false;
	}
	
	public function insertMoto($moto)
	{
		
		$sql = self::$conn->prepare('INSERT INTO `motos`(`moto_id`, `moto_name`, `moto_color`, `moto_weight`, `moto_size`) VALUES (?, ?, ?, ?, ?)');
		$sql->bind_param('sssii', $id, $name, $color, $weight, $size);
		try {
			$id = $moto['moto_id'];
			$name = $moto['moto_name'];
			$color = $moto['moto_color'];
			$weight = $moto['moto_weight'];
			$size = $moto['moto_size'];
			$sql->execute();
			return true;
		} catch (Exception $e)
		{	
			return false;
		}
	}

	public function checkExistMoto($moto_id)
	{
		$result = self::$conn->query("SELECT count(*) as 'count' FROM `motos` WHERE `moto_id` = '".$moto_id."'");
		$row = $result->fetch_assoc();
		if((int)$row['count'] <= 0)
			return false;
	 	return true;

	}
}