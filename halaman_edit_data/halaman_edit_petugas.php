<?php

if (isset($_GET['id_petugas'])) {
    require_once "database/koneksi.php";

    $sql = "SELECT * FROM tabel_petugas WHERE id_petugas=" . $_GET['id_petugas'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_petugas';" .
        "</script>";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $tugas = $_POST['tugas'];
    $bulan = $_POST['bulan'] . '-1';

    $sql = "UPDATE tabel_petugas 
            SET 
                nama='$nama', 
                tugas='$tugas', 
                tanggal='$bulan' 
            WHERE 
                id_petugas=" . $_GET['id_petugas'];

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Petugas berhasil diedit.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_petugas';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
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
                    <h3 class="panel-title">Edit Petugas <?= $row['nama']; ?></h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="tugas" class="form-label">Tugas</label>
                                <input type="text" class="form-control" id="tugas" name="tugas" value="<?= $row['tugas']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="bulan" class="form-label">Bulan</label>
                                <input type="month" class="form-control" id="bulan" name="bulan" value="<?= date_format(date_create($row['tanggal']), 'Y-m'); ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12" style="display: flex; justify-content: end;">
                                <button type="submit" name="submit" class="btn btn-primary">Edit Rak Buku</button>
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