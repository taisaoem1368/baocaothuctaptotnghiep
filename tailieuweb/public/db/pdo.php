<?php 


$_DIR_ = dirname(dirname(__FILE__));
include_once $_DIR_."\db\config.php";

Class pdo_db {

	public static $conn;

	public function __construct() {
		self::$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
		self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		self::$conn->exec("set names utf8");
	}

	public function __destruct() {
		self::$conn = null;
	}

	public function getDataMotos()
	{
		$data = self::$conn->prepare('SELECT * FROM `motos`');
		$data->execute();
		return $data->fetchAll(PDO::FETCH_ASSOC);
	}

	public function checkExistMoto($id)
	{
		$data = self::$conn->prepare('SELECT * FROM `motos` WHERE `moto_id` = "'.$id.'"');
		$data->execute();
		if(count($data->fetchAll(PDO::FETCH_ASSOC)) <= 0)
			return false;
		return true;
	}

	public function deleteMoto($id)
	{
		self::$conn->prepare('DELETE FROM `motos` WHERE `moto_id` = :id')->execute(array(':id' => $id));
		return true;
	}

	public function updateMoto($moto)
	{

			$data = array(
					':id' => $moto['moto_id'],
					':name' => $moto['moto_name'],
					':color' => $moto['moto_color'],
					':weight' => ($moto['moto_weight'] != '') ? $moto['moto_weight'] : 0, 
					':size' => ($moto['moto_weight'] != '') ? $moto['moto_size'] : 0,
				);
			$sql = 'UPDATE `motos` SET `moto_name`= :name,`moto_color`= :color,`moto_weight`= :weight,`moto_size`= :size WHERE `moto_id` = :id';

			if($this->checkExistMoto($moto['moto_id'])) {
				self::$conn->prepare($sql)->execute($data);
				return true;
			}
			return false;
	}
	
	public function insertMoto($moto)
	{

		$data = array(
			':id' => $moto['moto_id'],
			':name' => $moto['moto_name'],
			':color' => $moto['moto_color'],
			':weight' => ($moto['moto_weight'] != '') ? $moto['moto_weight'] : 0, 
			':size' => ($moto['moto_weight'] != '') ? $moto['moto_size'] : 0,
		);

		$sql = 'INSERT INTO `motos` (`moto_id`, `moto_name`, `moto_color`, `moto_weight`, `moto_size`) VALUES (:id, :name, :color, :weight, :size)';
		try{
			$stmt = self::$conn->prepare($sql);
			$stmt->execute($data);
			return true;
		} catch (PDOException $e){
			return false; 
		}
	}
}

