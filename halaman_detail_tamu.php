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
?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Detail Tamu <?= $row['nama']; ?></h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <div class="row" style="margin-bottom: 16px;">
                        <div class="col-md-12">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" readonly value="<?= $row['nama']; ?>">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 16px;">
                        <div class="col-md-12">
                            <label class="form-label">Tanggal Bertamu</label>
                            <input type="date" class="form-control" readonly value="<?= $row['tanggal']; ?>">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 16px;">
                        <div class="col-md-12">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" readonly value="<?= $row['alamat']; ?>">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 16px;">
                        <div class="col-md-12">
                            <label class="form-label">Nomor Handphone</label>
                            <input type="number" class="form-control" readonly value="<?= $row['nomor_handphone']; ?>">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 16px;">
                        <div class="col-md-12">
                            <label class="form-label">Keperluan</label>
                            <input type="text" class="form-control" readonly value="<?= $row['keperluan']; ?>">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 16px;">
                        <div class="col-md-12" style="display: flex; justify-content: end;">
                            <a type="button" class="btn btn-primary"><i class="lnr lnr-printer"></i> Cetak</a>
                        </div>
                    </div>
                    <!-- END TABLE HOVER -->
                </div>
            </div>
            <!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->