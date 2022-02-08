<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Selamat Datang <?= $_SESSION['nama']; ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                           <img src="assets/img/Lambang_Kota_Banjarbaru.png" alt="">
                        </div>
                        <div class="col-md-9">
                           <h1>Buku Tamu</h1>
                           <h2>Dinas Arsip dan Perpustakaan Daerah Kota Banjarbaru</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Gambaran Pengunjung</h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <br>
                <?php require_once "database/koneksi.php"; ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="lnr lnr-users"></i></span>
                                <p>
                                    <?php
                                    $sql = "SELECT COUNT(*) AS pengunjung_hari_ini FROM tabel_buku_tamu WHERE tanggal='" . Date("Y-m-d") . "'";
                                    $result = $mysqli->query($sql);
                                    $row = $result->fetch_assoc();
                                    ?>
                                    <span class="number"><?= $row['pengunjung_hari_ini']; ?> Orang</span>
                                    <span class="title">Hari ini</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="lnr lnr-users"></i></span>
                                <p>
                                    <?php
                                    $sql = "SELECT COUNT(*) AS pengunjung_bulan_ini FROM tabel_buku_tamu WHERE MONTH(tanggal)='" . Date("m") . "' AND YEAR(tanggal)='" . Date("Y") . "'";
                                    $result = $mysqli->query($sql);
                                    $row = $result->fetch_assoc();
                                    ?>
                                    <span class="number"><?= $row['pengunjung_bulan_ini']; ?> Orang</span>
                                    <span class="title">Bulan ini</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="lnr lnr-users"></i></span>
                                <p>
                                    <?php
                                    $sql = "SELECT COUNT(*) AS pengunjung_tahun_ini FROM tabel_buku_tamu WHERE YEAR(tanggal)='" . Date("Y") . "'";
                                    $result = $mysqli->query($sql);
                                    $row = $result->fetch_assoc();
                                    ?>
                                    <span class="number"><?= $row['pengunjung_tahun_ini']; ?> Orang</span>
                                    <span class="title">Tahun ini</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="lnr lnr-users"></i></span>
                                <p>
                                    <?php
                                    $sql = "SELECT COUNT(*) AS seluruh_pengunjung FROM tabel_buku_tamu";
                                    $result = $mysqli->query($sql);
                                    $row = $result->fetch_assoc();
                                    ?>
                                    <span class="number"><?= $row['seluruh_pengunjung']; ?> Orang</span>
                                    <span class="title">Seluruh Pengunjung</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Pengunjung 1 Minggu Terakhir</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="visits-trends-chart" class="ct-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->