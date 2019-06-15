<?php
require_once('public/db/mysqli.php');
$db = new mysqli_db;
$mysqli_data = $db->getDataMotos();

require_once('public/db/pdo.php');
$db_dpo = new pdo_db();
$dpo_data = $db_dpo->getDataMotos();


  // include 'mysql.php';
  // $db_mysql = new mysql_db();
  // $mysql_data = $db_mysql->getDataMotos();
  // var_dump($mysql_data);

?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="public/css/bootstrap.min.css">

  <title>Hello, world!</title>
  <style>
  .item-moto {
    border: 1px solid red;
  }
  .form-tee {
    margin-top: 40px;
    margin-bottom: 50px;

    
  }
  .form-i {
    border: 1px solid red;
  }
</style>
</head>
<body>

  <h3>Mysqli</h3>
  <div class="container">
    <div class="row all-item">
      <?php foreach ($mysqli_data as $key => $value): ?>

        <div class="col-md-3 item-moto">
          <p>Biển số: <span><?php echo $value['moto_id']; ?></span> </p>
          <p>Tên Xe: <span><?php echo $value['moto_name']; ?></span></p>
          <p>Màu: <span><?php echo $value['moto_color']; ?></span></p>
          <p>Cân nặng: <span><?php echo $value['moto_weight']; ?></span> kg</p>
          <p>Du tích: <span><?php echo $value['moto_size']; ?></span>ml</p>
           <p><a href="" onclick="deleteMoto('<?php echo $value['moto_id']; ?>'); return false;">delete</a></p>
          <p><a href="" onclick="getUpdate('<?php echo $value['moto_name']; ?>', '<?php echo $value['moto_color']; ?>', <?php echo $value['moto_weight']; ?>, <?php echo $value['moto_size']; ?>, '<?php echo $value['moto_id']; ?>'); return false;">update</a></p>
        </div>      
      <?php endforeach ?>
    </div>
  </div>
  <h3>PDO</h3>
  <div class="container">
    <div class="row all-item">
      <?php foreach ($dpo_data as $key => $value): ?>

        <div class="col-md-3 item-moto">
          <p>Biển số: <span><?php echo $value['moto_id']; ?></span> </p>
          <p>Tên Xe: <span><?php echo $value['moto_name']; ?></span></p>
          <p>Màu: <span><?php echo $value['moto_color']; ?></span></p>
          <p>Cân nặng: <span><?php echo $value['moto_weight']; ?></span> kg</p>
          <p>Du tích: <span><?php echo $value['moto_size']; ?></span>ml</p>
          <p><a href="" onclick="deleteMoto('<?php echo $value['moto_id']; ?>'); return false;">delete</a></p>
          <p><a href="" onclick="getUpdate('<?php echo $value['moto_name']; ?>', '<?php echo $value['moto_color']; ?>', <?php echo $value['moto_weight']; ?>, <?php echo $value['moto_size']; ?>, '<?php echo $value['moto_id']; ?>'); return false;">update</a></p>
        </div>      
      <?php endforeach ?>
    </div>
  </div>

  <div class="container form-tee">
    <div class="row">
      <div class="col-md-6 form-i">
   
        <form id="form-mysqli" method="post">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Biển số</label>
              <input type="text" id="moto_id" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label>Tên Xe</label>
              <input type="text" id="moto_name" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label>Dung tích(ml)</label>
              <input type="text" id="moto_size" class="form-control">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Màu Xe</label>
              <input type="text" id="moto_color" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label>Nặng(kg)</label>
              <input type="text" id="moto_weight" class="form-control">
            </div>
          </div>
          <span><b>Mysqli</b></span>
          <button type="submit" id="btn-insert-mysqli" class="btn btn-primary">Nhập</button>
          <button type="submit" id="btn-update-mysqli" class="btn btn-primary">Sửa</button>
          <span><b>PDO</b></span>
          <button type="submit" id="btn-insert-pdo" class="btn btn-primary">Nhập</button>
          <button type="submit" id="btn-update-pdo" class="btn btn-primary">Sửa</button>
        </form>
      </div>
    </div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="public/js/bootstrap.min.js"></script>
  <script src="public/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
    // '_token': token
    function deleteMoto(id)
    {
      $.ajax({
        type: "GET",
        data: {id_delete: id},
        url: 'public/action/mysqli.php',
        dataType: "JSON",
        success: function(reponse){
          loadMotos(reponse);
        }
      });
    }

    function getUpdate(name, color, weight, size, id)
    {
      $('#moto_id').val(id);
      $('#moto_name').val(name);
      $('#moto_color').val(color);
      $('#moto_weight').val(weight);
      $('#moto_size').val(size);
      $('#moto_id_pdo').val(id);
      $('#moto_name_pdo').val(name);
      $('#moto_color_pdo').val(color);
      $('#moto_weight_pdo').val(weight);
      $('#moto_size_pdo').val(size);
    }


      


    function loadMotos(motos)
    {
      $('.all-item').empty();
      for(var i = 0; i < motos.length; i++)
      {
        $('.all-item').append(`
          <div class="col-md-3 item-moto">
            <p>Biển số: <span>${motos[i].moto_id}</span> </p>
            <p>Tên Xe: <span>${motos[i].moto_name}</span></p>
            <p>Màu: <span>${motos[i].moto_color}</span></p>
            <p>Cân nặng: <span>${motos[i].moto_weight}</span> kg</p>
            <p>Du tích: <span>${motos[i].moto_size}</span>ml</p>
            <p><a href="#" onclick="deleteMoto('${motos[i].moto_id}'); return false;">delete</a></p>
            <p><a href="" onclick="getUpdate('${motos[i].moto_name}', '${motos[i].moto_color}', ${motos[i].moto_weight}, ${motos[i].moto_size}, '${motos[i].moto_id}'); return false;">update</a></p>
          </div>
          `);
      }
    }

    function getValueMysqli()
    {
        var moto_id = $('#moto_id').val();
        var moto_name = $('#moto_name').val();
        var moto_color = $('#moto_color').val();
        var moto_weight = $('#moto_weight').val();
        var moto_size = $('#moto_size').val();
        return {'moto_id':moto_id, 'moto_name':moto_name, 'moto_color':moto_color, 'moto_weight':moto_weight, 'moto_size': moto_size};
    }

    $(document).ready(function(){

      $('#btn-insert-mysqli').click(function(){
        var moto_create = getValueMysqli();
        $.ajax({
          type: "GET",
          data: {moto_create},
          url: 'public/action/mysqli.php',
          dataType: "JSON",
          success: function(reponse){
            loadMotos(reponse);
          }
        });
        return false;
      });

      $('#btn-update-mysqli').click(function(){
        var moto_update = getValueMysqli();
        $.ajax({
          type: "GET",
          data: {moto_update},
          url: 'public/action/mysqli.php',
          dataType: "JSON",
          success: function(reponse){
            loadMotos(reponse);
          }
        });
        return false;
      });


      $('#btn-insert-pdo').click(function(){
        var moto_create = getValueMysqli();
        $.ajax({
          type: "GET",
          data: {moto_create},
          url: 'public/action/pdo.php',
          dataType: "JSON",
          success: function(reponse){
            loadMotos(reponse);
          }
        });
        return false;
      });

      $('#btn-update-pdo').click(function(){
        var moto_update = getValueMysqli();
        $.ajax({
          type: "GET",
          data: {moto_update},
          url: 'public/action/pdo.php',
          dataType: "JSON",
          success: function(reponse){
            loadMotos(reponse);
          }
        });
        return false;
      });
    });

  </script>
</body>
</html>
