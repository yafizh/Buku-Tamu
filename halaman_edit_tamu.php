<?php

if (isset($_GET['id_tamu'])) {
    require_once "koneksi.php";

    $sql = "SELECT * FROM tabel_buku_tamu WHERE id_tamu=" . $_GET['id_tamu'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_tamu';" .
        "</script>";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nomor_handphone = $_POST['nomor_handphone'];
    $keperluan = $_POST['keperluan'];

    $sql = "UPDATE tabel_buku_tamu 
            SET 
                nama='$nama', 
                alamat='$alamat', 
                nomor_handphone='$nomor_handphone', 
                keperluan='$keperluan'
            WHERE 
                id_tamu=" . $_GET['id_tamu'];

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Tamu berhasil diedit.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_tamu';" .
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
                    <h3 class="panel-title">Edit Tamu <?= $row['nama']; ?></h3>
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
                                <label for="tanggal" class="form-label">Tanggal Bertamu</label>
                                <input type="date" class="form-control" readonly id="tanggal" name="tanggal" value="<?= $row['tanggal']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $row['alamat']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="nomor_handphone" class="form-label">Nomor Handphone</label>
                                <input type="number" class="form-control" id="nomor_handphone" name="nomor_handphone" value="<?= $row['nomor_handphone']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="keperluan" class="form-label">Keperluan</label>
                                <input type="text" class="form-control" id="keperluan" name="keperluan" value="<?= $row['keperluan']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12" style="display: flex; justify-content: end;">
                                <button type="submit" name="submit" class="btn btn-primary">Edit Tamu</button>
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