<!DOCTYPE html>
<html lang="en">
<head>
  <?php require('../components/head.php'); ?>
  <title>Tambah Bus</title>
</head>
<body>
  <?php 
    require('components/header.php');
    require('../config/config.php');
  ?>
  
  <section class="container p-5" style="width: 100%; max-width: 630px; padding:15px; margin:auto;">
    <div class="card">
        <div class="card-body">
            <form method="POST" class="row g-3">
                <h2 class="mb-3">Tambah</h2>
                <div class="col-12">
                    <label for="inputName" class="form-label">Nama Bus</label>
                    <input type="text" class="form-control" name="inputName" placeholder="Nama Bus">
                </div>
                <div class="col-12">
                    <label for="inputAwalKbrkt" class="form-label">Awal Keberangkatan</label>
                    <select name="inputAwalKbrkt" class="form-select mb-3" aria-label="Default select example">
                        <option value="Bandung">Bandung</option>
                        <option value="Bali">Bali</option>
                        <option value="Bekasi">Bekasi</option>
                        <option value="Depok">Depok</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="inputAkhirKbrkt" class="form-label">Akhir Keberangkatan</label>
                    <select name="inputAkhirKbrkt" class="form-select mb-3" aria-label="Default select example">
                        <option value="Bandung">Bandung</option>
                        <option value="Bali">Bali</option>
                        <option value="Bekasi">Bekasi</option>
                        <option value="Depok">Depok</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="inputTglKbrkt" class="form-label">Tanggal Keberangkatan</label>
                    <input type="date" min="<?= date('Y-m-d'); ?>" class="form-control" name="inputTglKbrkt" >
                </div>
                <div class="col-12">
                    <label for="inputPrice" class="form-label">Harga / Kursi</label>
                    <input type="number" class="form-control" name="inputPrice" >
                </div>
                <div class="col-12">
                    <button name="btnSimpan" class="btn btn-primary">Simpan</button>
                </div>
                <?php 
                    if (isset($_POST["btnSimpan"])) {
                        $name=$_POST["inputName"];
                        $awal=$_POST["inputAwalKbrkt"];
                        $akhir=$_POST["inputAkhirKbrkt"];
                        $tgl_kbrkt=$_POST["inputTglKbrkt"];
                        $price=$_POST["inputPrice"];

                        if (!$name || !$awal || !$akhir || !$tgl_kbrkt || !$price) {
                            echo "<script>alert('Isi Semua Data!'); </script>";
                        } else {
                            $save = $db->exec("INSERT INTO 
                            bus(nama_bus, awal_kbrkt, akhir_kbrkt, tgl_kbrkt, price)
                            VALUES('$name','$awal','$akhir','$tgl_kbrkt','$price')");
                            if ($save) {
                                echo "<script>alert('Data Bus Disimpan');</script>";
                            }
                        }
                    }
                ?>
            </form>
        </div>
    </div>  
  </section>

  <?php require('../components/footer.php'); ?>
</body>
</html>