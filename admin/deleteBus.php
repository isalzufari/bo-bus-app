<?php 
  require_once("../config/config.php");
  $id = $_GET['id'];

  $remove = $db->exec("DELETE FROM bus WHERE id_bus=$id");
  if($remove>0){
    echo "<script>alert('Berhasil dihapus'); javascript:history.go(-1)</script>";
  }
?>