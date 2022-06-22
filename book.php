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
  $seat = $_GET['seat'];
  $idBus = $_GET['idBus'];
  $nameBus = $_GET['nameBus'];
  $priceBus = $_GET['priceBus']; ?>
  <div class="container my-5">
  <h3 class="mb-3">Your Booking</h3>
    <div class="row">
      <div class="col-md-8">
        <div class="col p-4 align-items-center rounded shadow bg-light m-3">
          <h4>Bus Ticket</h4>
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" id="nameTicket">
            <div class="row mt-3">
              <div class="col">
                <div class="mb-3">
                  <label for="" class="form-label">Mobile Number</label>
                  <input type="number" class="form-control" id="mobileNumberTicket">
                </div>
              </div>
              <div class="col">
                <div class="mb-3">
                  <label for="" class="form-label">Email</label>
                  <input type="email" class="form-control" id="emailTicket">
                </div>
              </div>
            </div>
        </div>

        <!-- <div class="col p-4 align-items-center rounded shadow bg-light m-3">
          <h4>Customer Details</h4>
            <?php 
            $x = 1;
            while($x <= $seat) { ?>
              <div class="col mb-2">
                <label for="customerDetail<?php echo $x ?>" class="form-label">Full Name - Customer <?php echo $x ?></label>
                <input type="text" class="form-control" id="customerDetail<?php echo $x ?>">
              </div>
            <?php $x++; } ?>
        </div> -->
      </div>
      <div class="col-md-4">
        <div class="col p-4 align-items-center rounded shadow bg-light m-3">
          <h4><?php echo ucwords($from) , ' - ' , ucwords($to) ?></h4>
          <p><?php echo date("D, d-m-Y",strtotime($date)) ?></p>
          <p><?php echo $nameBus ?> • <?php echo $seat ?> Seat</p>
          <p><span class="badge bg-warning text-dark">Total : Rp <?php echo number_format($priceBus * $seat) ?> -</span></p>
          <div class="d-grid gap-2">
            <button onclick="saveTicket();" class="btn btn-outline-secondary" type="button">Book Now!</a>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  <?php require('components/footer.php') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    function saveTicket() {
      const nameTicket = document.getElementById('nameTicket').value;
      const mobileNumber = document.getElementById('mobileNumberTicket').value;
      const emailTicket = document.getElementById('emailTicket').value;
      const priceTotal = <?php echo $priceBus * $seat ?>;
      const idBus = <?php echo $idBus ?>;

      location.href = `/config/payDb.php?nameTicket=${nameTicket}&mobileNumber=${mobileNumber}&emailTicket=${emailTicket}&priceTotal=${priceTotal}&idBus=${idBus}`;
    }
  </script>
</body>
</html>