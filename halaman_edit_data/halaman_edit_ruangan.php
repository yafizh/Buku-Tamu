<?php

if (isset($_GET['id_ruangan'])) {
    require_once "database/koneksi.php";

    $sql = "SELECT * FROM tabel_ruangan WHERE id_ruangan=" . $_GET['id_ruangan'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_ruangan';" .
        "</script>";

if (isset($_POST['submit'])) {
    $nama_ruangan = $_POST['nama_ruangan'];
    $keterangan = $_POST['keterangan'];

    $sql = "UPDATE tabel_ruangan 
            SET 
                nama_ruangan='$nama_ruangan', 
                keterangan='$keterangan' 
            WHERE 
                id_ruangan=" . $_GET['id_ruangan'];

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Ruangan berhasil diedit.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_ruangan';" .
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
                    <h3 class="panel-title">Edit Ruangan <?= $row['nama_ruangan']; ?></h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                                <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" value="<?= $row['nama_ruangan']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $row['keterangan']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12" style="display: flex; justify-content: end;">
                                <button type="submit" name="submit" class="btn btn-primary">Edit Ruangan</button>
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