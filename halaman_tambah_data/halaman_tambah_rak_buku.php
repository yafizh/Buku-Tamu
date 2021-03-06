<?php
require_once "database/koneksi.php";
if (isset($_POST['submit'])) {
    $nomor_rak = $_POST['nomor_rak'];
    $kategori_rak = $_POST['kategori_rak'];
    $keterangan = $_POST['keterangan'];

    $sql = "
        INSERT INTO tabel_rak_buku (
            nomor_rak, 
            kategori_rak, 
            keterangan 
        ) VALUES (
            '$nomor_rak', 
            '$kategori_rak', 
            '$keterangan'
        )";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('Rak Buku berhasil ditambahkan.')</script>";
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
                    <h3 class="panel-title">Tambah Rak Buku</h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="nomor_rak" class="form-label">Nomor Rak</label>
                                <input type="text" autofocus class="form-control" id="nomor_rak" name="nomor_rak" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="kategori_rak" class="form-label">Kategori Rak</label>
                                <input type="text" class="form-control" id="kategori_rak" name="kategori_rak" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12" style="display: flex; justify-content: end;">
                                <button type="submit" name="submit" class="btn btn-primary">Tambah Rak Buku</button>
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