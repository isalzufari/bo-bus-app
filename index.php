<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('components/head.php') ?>
    <title>Home</title>
</head>
<body>
  <?php 
    require('components/header.php');
    require('config/config.php');
    $showFromBus=$db->query("SELECT * FROM bus");
  ?>
  <div class="bg-light">
    <div class="container">
      <h1 class="display-4"><b>BO-Bus</b> #PastiAdaJalan</h1>
      <p class="lead">Booking bus tickets at Bo-Bus is as easy as shopping online. From finding bus schedules, to booking and paying for your tickets.</p>
      <hr class="my-4">
      <p class="pb-3">Bikin nyampe duluan • Anton - Cerdikiawan</p>
    </div>
  </div>

  <div class="container">
    <div class="container my-5">
      <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded shadow bg-light">
        <h4>Bus Ticket</h4>
          <div class="col">
            <label for="fromBus" class="form-label">From</label>
            <select id="fromBus" class="form-select mb-3" aria-label="Default select example">
              <option value="depok">Depok</option>
              <option value="jakarta">Jakarta</option>
              <option value="bogor">Bogor</option>
            </select>
            <div class="mb-3">
              <label for="departureDate" class="form-label">Departure Date</label>
              <input type="date" class="form-control" id="departureDate" min="<?= date('Y-m-d'); ?>" max="<?= date("Y-m-d", strtotime("+ 7 day")) ?>"/>
            </div>
          </div>
          <div class="col">
            <label for="toBus" class="form-label">To</label>
            <select id="toBus" class="form-select mb-3" aria-label="Default select example">
              <option value="bandung">Bandung</option>
              <option value="bali">Bali</option>
              <option value="bekasi">Bekasi</option>
            </select>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label for="seatBus" class="form-label">Seat</label>
                  <select id="seatBus" class="form-select mb-3" aria-label="Default select example" disabled>
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                </div>
              </div>
              <div class="col">
                <label for="seat" class="form-label">Here!</label>
                <div class="mb-3 d-grid gap-2">
                  <button onclick="searchBus()" id="buttonSearchBus" type="button" class="btn btn-outline-secondary">Search</button>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>

  <?php require('components/footer.php') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
  
    function searchBus() {
      var fromBus = document.getElementById('fromBus').value;
      var toBus = document.getElementById('toBus').value;
      var departureDate = document.getElementById('departureDate').value;
      var seatBus = document.getElementById('seatBus').value;
      // alert(fromBus + toBus + departureDate + seatBus);
      location.href = `/bus.php?from=${fromBus}&to=${toBus}&date=${departureDate}&seat=${seatBus}`;
    }

  </script>
</body>
</html>