<!DOCTYPE html>
<html lang="en">
<head>
  <?php require('components/head.php') ?>
  <title>Tiket</title>
</head>
<body>
  <?php require('components/header.php');
    require("config/config.php");
    $id_ticket = $_GET['id'];
    $sql=$db->query("SELECT * FROM customer 
    INNER JOIN tiket ON customer.id_customer = tiket.id_customer 
    INNER JOIN bus on bus.id_bus = tiket.id_bus WHERE tiket.id_tiket = '$id_ticket'");
    $ticketDetail = $sql->fetch();
  ?>
  <div class="container my-5">
    <h3 class="mb-3">Ticket</h3>
    <div class="p-4 align-items-center rounded shadow bg-light m-3">
      <h2 class="text-center"><span class="badge rounded-pill bg-success">BO<?php echo substr("$ticketDetail[no_telp]", 3, 6); ?>TIKET</span></h2>
      <div class="row">
        <div class="col-md-8">
          <h4>Customer Details</h4>
            <label for="" class="form-label">Full Name - Customer 1</label>
            <input type="email" value="<?php echo "$ticketDetail[nama]"; ?>" class="form-control" id="exampleInputEmail1" disabled>
        </div>

        <div class="col-4 mt-3">
          <h4><?php echo ucwords("$ticketDetail[awal_kbrkt]") , ' - ' , ucwords("$ticketDetail[akhir_kbrkt]") ?></h4>
          <p><?php echo date("D, d-m-Y",strtotime("$ticketDetail[tgl_kbrkt]")) ?></p>
          <p><?php echo "$ticketDetail[nama_bus]"; ?></p>
        </div>
      </div>
    </div>
  </div>
  <?php require('components/footer.php') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>