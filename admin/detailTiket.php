<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('../components/head.php') ?>
    <title>Detail Tiket</title>
</head>
<body>
  <?php 
    require('components/header.php');
    require('../config/config.php');
    $id = $_GET['id'];
    $sql=$db->query("SELECT * FROM customer 
    INNER JOIN tiket ON customer.id_customer = tiket.id_customer 
    INNER JOIN bus on bus.id_bus = tiket.id_bus WHERE tiket.id_tiket = '$id'");
    
    $ticketDetail = $sql->fetch();
    $sub_total = 0;

    function statusPembayaran($status) {
        if ($status == 1) {
            return '<span class="badge rounded-pill bg-success">BO<?php echo substr("$ticketDetail[no_telp]", 3, 6); ?>TIKET</span>';
        } else {
            return '<span class="badge rounded-pill bg-warning text-dark">BOBUS<?php echo substr("$ticketDetail[no_telp]", 3, 6); ?>KODE</span>';
        }
    }
  ?>
  <section>
    <div class="container p-5">
        <h2 class="mb-3">Tiket <?php echo $ticketDetail['nama'] ?></h2>
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">
                    <?php echo statusPembayaran($ticketDetail['status_pembayaran']) ?>
                </h2>
                <div class="row">
                    <div class="col-md-8">
                    <h4>Detail Kustomer</h4>
                        <label for="" class="form-label">Full Name - Kustomer 1</label>
                        <input type="email" value="<?php echo "$ticketDetail[nama]"; ?>" class="form-control" id="exampleInputEmail1" disabled>
                    </div>

                    <div class="col-4 mt-3">
                    <h4><?php echo ucwords("$ticketDetail[awal_kbrkt]") , ' - ' , ucwords("$ticketDetail[akhir_kbrkt]") ?></h4>
                    <p><?php echo date("D, d-m-Y",strtotime("$ticketDetail[tgl_kbrkt]")) ?></p>
                    <p>Bus : <?php echo "$ticketDetail[nama_bus]"; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <?php require('../components/footer.php') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>