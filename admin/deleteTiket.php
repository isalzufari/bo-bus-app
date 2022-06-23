<?php 
  require_once("../config/config.php");
  $id = $_GET['id'];

  $remove = $db->exec("DELETE FROM tiket WHERE id_customer=$id");
  if($remove>0){
    echo "<script>alert('Tiket Berhasil dihapus'); javascript:history.go(-1)</script>";
  }
?>