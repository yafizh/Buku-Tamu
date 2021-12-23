<?php
if (isset($_POST['submit'])) {
    require_once "koneksi.php";

    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $alamat = $_POST['alamat'];
    $nomor_handphone = $_POST['nomor_handphone'];
    $keperluan = $_POST['keperluan'];

    $sql = "
        INSERT INTO tabel_buku_tamu (
            nama, 
            tanggal, 
            alamat, 
            nomor_handphone, 
            keperluan
        ) VALUES (
            '$nama', 
            '$tanggal',
            '$alamat', 
            '$nomor_handphone',
            '$keperluan'
        )";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('Tamu berhasil ditambahkan.')</script>";
    else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Buku Tamu</h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="tanggal" class="form-label">Tanggal Bertamu</label>
                                <input type="date" class="form-control" readonly id="tanggal" name="tanggal" value="<?= Date("Y-m-d"); ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="nomor_handphone" class="form-label">Nomor Handphone</label>
                                <input type="number" class="form-control" id="nomor_handphone" name="nomor_handphone">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="keperluan" class="form-label">Keperluan</label>
                                <input type="text" class="form-control" id="keperluan" name="keperluan">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12" style="display: flex; justify-content: end;">
                                <button type="submit" name="submit" class="btn btn-primary">Tambah Tamu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->