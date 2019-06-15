<?php


use PHPUnit\Framework\TestCase;
$_DIR_ = dirname(dirname(__FILE__));
include_once $_DIR_."\public\db\pdo.php";

class PDOTest extends TestCase
{

  public function testGetAllDataMotoReturnsArrayMotosUsePDO()
  {
    $PDO = new \PDO_db();
    $motos = $PDO->getDataMotos();
    $this->assertInternalType('array', $motos);
    // $this->assertEquals(7, count($motos));
  }

  private $moto_input = array(
            'moto_id' => '59X3-77778',
            'moto_name' => 'Exciter 150',
            'moto_weight' => '150',
            'moto_color' => 'Xanh dương',
            'moto_size' => '150',
        );
  
  public function testInsertMotoReturnsIsTrueUsePDO()
  {
    $PDO = new \PDO_db();
    $moto = $PDO->insertMoto($this->moto_input);
    $this->assertTrue($moto);
  }

  public function testInsertMotoReturnsIsFalseUsePDO()
  {
    $PDO = new \PDO_db();
    $moto = $PDO->insertMoto($this->moto_input);
    $this->assertFalse($moto);
  }

  public function testUpdateMotoReturnsIsTrueUsePDO()
  {
    $PDO = new \PDO_db();
    $moto = $PDO->updateMoto(array(
            'moto_id' => $this->moto_input['moto_id'],
            'moto_name' => 'Ablack',
            'moto_weight' => '120',
            'moto_color' => 'Đen',
            'moto_size' => '120',
        ));
    $this->assertTrue($moto);
  }

  public function testUpdateMotoReturnsIsFalseUsePDO()
  {
    $PDO = new \PDO_db();
    $moto = $PDO->updateMoto(array(
            'moto_id' => '59X3-7aaa7777',
            'moto_name' => 'Ablack',
            'moto_weight' => '120qasdsdaabc',
            'moto_color' => 'Đen',
            'moto_size' => '120abc',
        ));
    $this->assertFalse($moto);
  }

  public function testDeleteMotoReturnsIsTrueUsePDO()
  {
    $PDO = new \PDO_db();
     $moto = $PDO->deleteMoto($this->moto_input['moto_id']);
     $this->assertTrue($moto);
  }
}