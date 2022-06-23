<!DOCTYPE html>
<html lang="en">
<head>
  <?php require('../components/head.php'); ?>
  <title>Dashboard</title>
</head>
<body>
  <?php 
    require('./components/header.php');
    require('../config/config.php');
  ?>
  <section class="container p-5">
    <div class="row">
      <div class="col">
        <div class="row">
            <div class="col">
                <h3>List Bus</h3>
            </div>
            <div class="col d-flex justify-content-end">
                <a href="addBus.php" class="btn btn-primary">Tambah</a>
            </div>
            <div class="row mt-3">
                <?php
                $sqlShowBus=$db->query("SELECT * FROM bus");
                $showBus = 1; // $sqlShowBus->fetch();

                if ($showBus) {
                    foreach($sqlShowBus as $bus):
                    ?>
                        <div class="col-sm-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-0">
                                        <h5><b><?php echo $bus['nama_bus'] ?></b></h5>
                                        <div class="col-8">
                                            <h5 class="mt-3">Bus Route</h5>
                                            <p><?php echo $bus['awal_kbrkt'] ?></p>
                                            <p><small class="text-muted"><?php echo date("D, d-m-Y",strtotime($bus['tgl_kbrkt'])) ?></small></p>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="mt-3"><?php echo number_format("$bus[price]")?> /kursi</h5>
                                            <p><?php echo $bus['akhir_kbrkt'] ?></p>
                                            <div class="d-grid gap-2">
                                                <a href="deleteBus.php?id=<?php echo $bus['id_bus']; ?>" type="button" class="btn btn-danger card-link">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach; 
                } else {
                ?> 
                    <div class="alert alert-info" role="alert">
                        Anda belum memasukan produk ke keranjang!
                    </div>
                <?php
                }
            ?>
            </div>
        </div>
      </div>
      <div class="col">
        <div class="row">
            <div class="col">
                <h3>Pemesanan</h3>
            </div>
            <div class="row mt-3">
            <?php
                $showOrders = $db->query("SELECT DISTINCT `tiket`.id_customer, `tiket`.status_pembayaran, `customer`.nama, `customer`.`email` 
                FROM `tiket` INNER JOIN `customer` ON `tiket`.id_customer = customer.id_customer ORDER by tgl_psn");      
                
                function statusPembayaran($status) {
                    if ($status == 1) {
                        return 'Sudah Bayar';
                    } else {
                        return 'Belum Bayar';
                    }
                }

                foreach($showOrders as $order):
                    if ($order) {
                    ?>
                        <div class="col-sm-12 mb-3">
                            <div class="card">
                                <div class="row">
                                    <div class="col">
                                        <div class="card-body">
                                            <h5 class="card-title"><b><?php echo $order['nama'] ?></b></h5>
                                            <p class="card-text text-muted"><?php echo $order['email'] ?></p>
                                            <p class="card-text"><?php echo statusPembayaran($order['status_pembayaran']) ?></p>
                                        </div>
                                    </div>
                                    <div class="col-4 d-flex align-items-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="detailTiket.php?id=<?php echo $order['id_customer']; ?>" type="button" class="btn btn-primary card-link">Detail</a>
                                            <a href="deleteTiket.php?id=<?php echo $order['id_customer']; ?>" type="button" class="btn btn-danger card-link">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    <?php
                    } else {
                    ?> 
                        <div class="alert alert-info" role="alert">
                            Belum ada Transaksi!
                        </div>
                    <?php
                    }
                    
                endforeach; 

                
            ?>
            </div>
        </div>
      </div>
    </div>
  </section>
  <?php require('../components/footer.php'); ?>
</body>
</html>