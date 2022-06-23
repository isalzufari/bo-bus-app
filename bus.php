<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('components/head.php') ?>
    <title>Pemesanan</title>
</head>
<body>
    <?php require('components/header.php');
    $from = $_GET['from'];
    $to = $_GET['to'];
    $date = $_GET['date'];
    $seat = $_GET['seat']; ?>

    <div class="container my-5">
        <h3 class="mb-3"><?php echo ucwords($from) , ' - ' , ucwords($to) ?></h3>
        <p><?php echo date("D, d-m-Y",strtotime($date)) ?> • <span class="badge bg-info text-dark"><?php echo $seat ?> Seats</span></p>

        <?php 
          require("config/config.php");
          $sqlShowBus=$db->query("SELECT * FROM bus WHERE awal_kbrkt='$from' AND akhir_kbrkt='$to' AND tgl_kbrkt>='$date'");  
        //   $checkBus = $showBus->fetchObject();
        //   print_r($checkBus);
          $showBus = $sqlShowBus->fetchAll();
          if(empty($showBus)) {
            ?>
                <div class="col p-4 pe-lg-0 align-items-center rounded shadow bg-light mt-5">
                    <h4>Bus Tidak Tersedia!</h4>
                </div>
            <?php
          } else {
            foreach($showBus as $bus): 
                ?>
                    <div class="col p-4 pe-lg-0 align-items-center rounded shadow bg-light m-3">
                        <div class="row g-0">
                            <h4><?php echo $bus['nama_bus'] ?></h4>
                            <div class="col-md-8">
                                <h5 class="mt-3">Bus Route</h5>
                                <p><?php echo $bus['awal_kbrkt'] ?></p>
                                <p><small class="text-muted"><?php echo date("D, d-m-Y",strtotime($bus['tgl_kbrkt'])) ?></small></p>
                            </div>
                            <div class="col-3">
                                <h5 class="mt-3"><?php echo number_format("$bus[price]")?> /seat</h5>
                                <p><?php echo $bus['akhir_kbrkt'] ?></p>
                                <div class="d-grid gap-2">
                                    <a href="/book.php?from=<?php echo "$bus[awal_kbrkt]";?>&to=<?php echo "$bus[akhir_kbrkt]";?>&date=<?php echo "$bus[tgl_kbrkt]";?>&seat=<?php echo "$seat";?>&idBus=<?php echo "$bus[id_bus]";?>&nameBus=<?php echo "$bus[nama_bus]";?>&priceBus=<?php echo "$bus[price]";?>" class="btn btn-outline-secondary" type="button">Book Now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
            endforeach;
          }
        ?>
    </div>

    <?php require('components/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>