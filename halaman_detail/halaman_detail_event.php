<?php

if (isset($_GET['id_event'])) {
    require_once "database/koneksi.php";

    $sql = "SELECT * FROM view_event WHERE id_event=" . $_GET['id_event'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_event';" .
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
                    <h3 class="panel-title">Detail Event <?= $row['nama']; ?></h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <div class="row" style="margin-bottom: 16px;">
                        <div class="col-md-4">
                            <img src="<?= $row['gambar'] ?>" style="width: 100%;">
                        </div>
                        <div class="col-md-8">
                            <h3><?= $row['nama'] ?></h3>
                            <h4>Lokasi: <?= $row['nama_ruangan'] ?></h4>
                            <?php
                            $tanggal = $row['tanggal'];
                            $tahun = explode('-', $tanggal)[0];
                            $bulan = explode('-', $tanggal)[1];
                            $tanggal = explode('-', $tanggal)[2];
                            ?>
                            <h4><?= $tanggal . ' ' . BULAN_DALAM_INDONESIA[$bulan - 1] . ' ' . $tahun; ?>, <?= $row['waktu'] ?></h4>
                            <p><?= $row['kegiatan'] ?></p>
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