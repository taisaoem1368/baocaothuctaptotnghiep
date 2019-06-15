<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;
$_DIR_ = dirname(dirname(__FILE__));
include_once $_DIR_."\public\db\mysqli.php";

class MysqliTest extends TestCase
{
  private $moto_input = array(
            'moto_id' => '59X3-77777',
            'moto_name' => 'Exciter 150',
            'moto_weight' => '150',
            'moto_color' => 'Xanh dương',
            'moto_size' => '120',
        );

  public function testGetAllDataMotoReturnsArrayMotosUsePDO()
  {
    $mysqli = new \mysqli_db();
    $motos = $mysqli->getDataMotos();
    $this->assertInternalType('array', $motos);
  }

  public function testInsertMotoReturnsIsTrueUseMysqli()
  {
    $mysqli = new \mysqli_db();
    $moto = $mysqli->insertMoto($this->moto_input);
    $this->assertTrue($moto);
  }

  public function testsCheckExistMotoReturnTrueUseMysqli()
  {
    $mysqli = new \mysqli_db();
    $this->assertTrue($mysqli->checkExistMoto('59T1-55555'));
  }

  public function testsCheckExistMotoReturnsFalseUseMysqli()
  {
    $mysqli = new \mysqli_db();
    $this->assertFalse($mysqli->checkExistMoto('59T1-5555556'));
  }

  public function testInsertMotoReturnsIsFalseUseMysqli()
  {
    $mysqli = new \mysqli_db();
    $moto = $mysqli->insertMoto($this->moto_input);
    $this->assertFalse($moto);
  }

  public function testUpdateMotoReturnsIsTrueUseMysqli()
  {
    $mysqli = new \mysqli_db();
    $moto = $mysqli->updateMoto(array(
            'moto_id' => $this->moto_input['moto_id'],
            'moto_name' => 'Ablack',
            'moto_weight' => '120',
            'moto_color' => 'Đen',
            'moto_size' => '120',
        ));
    $this->assertTrue($moto);
  }

  public function testUpdateMotoReturnsIsFalseUseMysqli()
  {
    $mysqli = new \mysqli_db();
    $moto = $mysqli->updateMoto(array(
            'moto_id' => '123123a',
            'moto_name' => 'Ablack',
            'moto_weight' => '120abc',
            'moto_color' => 'Đen',
            'moto_size' => '120abc',
        ));
    $this->assertFalse($moto);
  }

  public function testDeleteMotoReturnsIsTrueUseMysqli()
  {
    $mysqli = new \mysqli_db();
     $moto = $mysqli->deleteMoto($this->moto_input['moto_id']);
     $this->assertTrue($moto);
  }

  public function testDeleteMotoReturnsIsFalseUseMysqli()
  {
     $mysqli = new \mysqli_db();
     $moto = $mysqli->deleteMoto($this->moto_input['moto_id']);
     $this->assertFalse($moto);
  }
}

