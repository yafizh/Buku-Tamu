<?php

if (isset($_GET['id_rak_buku'])) {
    require_once "database/koneksi.php";

    $sql = "SELECT * FROM tabel_rak_buku WHERE id_rak_buku=" . $_GET['id_rak_buku'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_rak_buku';" .
        "</script>";

if (isset($_POST['submit'])) {
    $nomor_rak = $_POST['nomor_rak'];
    $kategori_rak = $_POST['kategori_rak'];
    $keterangan = $_POST['keterangan'];

    $sql = "UPDATE tabel_rak_buku 
            SET 
                nomor_rak='$nomor_rak', 
                kategori_rak='$kategori_rak', 
                keterangan='$keterangan' 
            WHERE 
                id_rak_buku=" . $_GET['id_rak_buku'];

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Rak Buku berhasil diedit.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_rak_buku';" .
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
                    <h3 class="panel-title">Edit Rak Buku Nomor <?= $row['nomor_rak']; ?></h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="nomor_rak" class="form-label">Nomor Rak</label>
                                <input type="text" class="form-control" id="nomor_rak" name="nomor_rak" value="<?= $row['nomor_rak']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="kategori_rak" class="form-label">Kategori</label>
                                <input type="text" class="form-control" id="kategori_rak" name="kategori_rak" value="<?= $row['kategori_rak']; ?>">
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