<?php
  require_once('./config.php');
  $id_ticket = $_GET['id'];
  $sql_check = $db->query("SELECT status_pembayaran FROM tiket WHERE id_tiket = '$id_ticket'"); 
  $check_ticket = $sql_check-> fetch();

  if ("$check_ticket[status_pembayaran]" == 0) {
    echo "<script>location.href = '../pay.php?id=$id_ticket'; alert('Anda belum bayar!');</script>;";
  } else {
    echo "<script>location.href = '../ticket.php?id=$id_ticket';</script>";
  }
?>