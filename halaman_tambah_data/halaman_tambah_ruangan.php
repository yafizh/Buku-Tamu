<?php
require_once "database/koneksi.php";
if (isset($_POST['submit'])) {
    $nama_ruangan = $_POST['nama_ruangan'];
    $keterangan = $_POST['keterangan'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    $sql = "
        INSERT INTO tabel_ruangan (
            nama_ruangan, 
            keterangan 
        ) VALUES (
            '$nama_ruangan', 
            '$keterangan'
        )";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('Ruangan berhasil ditambahkan.')</script>";
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
                    <h3 class="panel-title">Tambah Ruangan</h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                                <input type="text" autofocus class="form-control" id="nama_ruangan" name="nama_ruangan" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="keterangan" class="form-label">keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12" style="display: flex; justify-content: end;">
                                <button type="submit" name="submit" class="btn btn-primary">Tambah Ruangan</button>
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