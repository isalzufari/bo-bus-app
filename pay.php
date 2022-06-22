<!DOCTYPE html>
<html lang="en">
<head>
  <?php require('components/head.php') ?>
  <title>Pay Order</title>
</head>
<body>
  <?php require('components/header.php');
  require("config/config.php");
  $id_ticket = $_GET['id'];
  $sql=$db->query("SELECT * FROM customer 
  INNER JOIN tiket ON customer.id_customer = tiket.id_customer 
  INNER JOIN bus on bus.id_bus = tiket.id_bus WHERE tiket.id_tiket = '$id_ticket'");
  $ticketDetail = $sql->fetch(); ?>
  <div class="container my-5">
    <h3 class="mb-3">Pay Order</h3>
      <div class="p-4 align-items-center rounded shadow bg-light m-3">
        <div class="row">
          <div class="col-md-8">
            <h4>Contact Details</h4>
            <label for="" class="form-label">Name</label>
            <input type="text" value="<?php echo "$ticketDetail[nama]"; ?>" class="form-control" id="exampleInputEmail1" disabled>
            <div class="row mt-3">
              <div class="col">
                <div class="mb-3">
                  <label for="" class="form-label">Mobile Number</label>
                  <input type="number" value="<?php echo "$ticketDetail[no_telp]"; ?>" class="form-control" id="exampleInputEmail1" disabled>
                </div>
              </div>
              <div class="col">
                <div class="mb-3">
                  <label for="" class="form-label">Email</label>
                  <input type="email" value="<?php echo "$ticketDetail[email]"; ?>" class="form-control" id="exampleInputEmail1" disabled>
                </div>
              </div>
            </div>
            <!-- <h4>Customer Details</h4>
              <label for="" class="form-label">Full Name - Customer 1</label>
              <input type="email" class="form-control" id="exampleInputEmail1" disabled> -->
          </div>

          <div class="col-4 mt-3">
            <h4><?php echo ucwords("$ticketDetail[awal_kbrkt]") , ' - ' , ucwords("$ticketDetail[akhir_kbrkt]") ?></h4>
            <p><?php echo date("D, d-m-Y",strtotime("$ticketDetail[tgl_kbrkt]")) ?></p>
            <p><?php echo "$ticketDetail[nama_bus]"; ?></p>
            <h4><span class="badge rounded-pill bg-warning text-dark">BOBUS<?php echo substr("$ticketDetail[no_telp]", 3, 6); ?>KODE</span></h4>
            <div class="d-grid gap-2 mt-3">
              <a href="/config/verifyCheck.php?id=<?php echo "$id_ticket" ?>" class="btn btn-outline-secondary" type="button">Check Now!</a>
            </div>
          </div>
        </div>
      </div>
   
  </div>
  <?php require('components/footer.php') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>