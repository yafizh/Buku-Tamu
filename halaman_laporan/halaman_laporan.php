<?php require_once "database/koneksi.php"; ?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Laporan</h3>
            <div class="row">
                <div class="col-md-4">
                    <!-- PANEL NO CONTROLS -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Laporan Tamu Per Tanggal</h3>
                        </div>
                        <div class="panel-body">
                            <form action="halaman_laporan/cetak/laporan_tamu_per_tanggal.php" method="POST" target="_blank">
                                <div class="row" style="margin-bottom: 16px;">
                                    <div class="col-md-6">
                                        <label for="">Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" value="<?= Date('Y-m-d'); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="id_user" class="form-label">Petugas</label>
                                        <?php $data_ruangan = $mysqli->query("SELECT * FROM tabel_user WHERE status='PETUGAS'"); ?>
                                        <select class="form-control" id="id_user" name="id_user">
                                            <option value="" selected>Semua Petugas</option>
                                            <?php while ($row = $data_ruangan->fetch_assoc()) : ?>
                                                <option value="<?= $row['id_user']; ?>"><?= ucwords(strtolower($row['nama'])); ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="id_ruangan" class="form-label">Tujuan</label>
                                        <?php $data_ruangan = $mysqli->query("SELECT * FROM tabel_ruangan ORDER BY nama_ruangan"); ?>
                                        <select class="form-control" id="id_ruangan" name="id_ruangan">
                                            <option value="" selected>Semua Ruangan</option>
                                            <?php while ($row = $data_ruangan->fetch_assoc()) : ?>
                                                <option value="<?= $row['id_ruangan']; ?>"><?= ucwords(strtolower($row['nama_ruangan'])); ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" style="visibility: hidden;">Tombol</label>
                                        <button type="submit" name="submit" class="form-control btn btn-primary">Cetak Laporan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END PANEL NO CONTROLS -->
                </div>

                <div class="col-md-4">
                    <!-- PANEL NO CONTROLS -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Laporan Tamu Per Bulan</h3>
                        </div>
                        <div class="panel-body">
                            <form action="halaman_laporan/cetak/laporan_tamu_per_bulan.php" method="POST" target="_blank">
                                <div class="row" style="margin-bottom: 16px;">
                                    <div class="col-md-6">
                                        <label for="">Bulan</label>
                                        <input type="month" name="bulan" class="form-control" value="<?= Date('Y-m'); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="id_user" class="form-label">Petugas</label>
                                        <?php $data_ruangan = $mysqli->query("SELECT * FROM tabel_user WHERE status='PETUGAS'"); ?>
                                        <select class="form-control" id="id_user" name="id_user">
                                            <option value="" selected>Semua Petugas</option>
                                            <?php while ($row = $data_ruangan->fetch_assoc()) : ?>
                                                <option value="<?= $row['id_user']; ?>"><?= ucwords(strtolower($row['nama'])); ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="id_ruangan" class="form-label">Tujuan</label>
                                        <?php $data_ruangan = $mysqli->query("SELECT * FROM tabel_ruangan ORDER BY nama_ruangan"); ?>
                                        <select class="form-control" id="id_ruangan" name="id_ruangan">
                                            <option value="" selected>Semua Ruangan</option>
                                            <?php while ($row = $data_ruangan->fetch_assoc()) : ?>
                                                <option value="<?= $row['id_ruangan']; ?>"><?= ucwords(strtolower($row['nama_ruangan'])); ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" style="visibility: hidden;">Tombol</label>
                                        <button type="submit" name="submit" class="form-control btn btn-primary">Cetak Laporan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END PANEL NO CONTROLS -->
                </div>
                <div class="col-md-4">
                    <!-- PANEL NO CONTROLS -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Laporan Ruangan</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row" style="margin-bottom: 16px;">
                                <div class="col-md-12">
                                    <form action="halaman_laporan/cetak/laporan_ruangan.php" method="POST" target="_blank">
                                        <label class="form-label">Nama-nama Ruangan</label>
                                        <button type="submit" name="submit" class="form-control btn btn-primary">Cetak Laporan</button>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="halaman_laporan/cetak/laporan_jumlah_kunjungan_ruangan.php" method="POST" target="_blank">
                                        <label class="form-label">Jumlah Kunjungan Ruangan</label>
                                        <button type="submit" name="submit" class="form-control btn btn-primary">Cetak Laporan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PANEL NO CONTROLS -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <!-- PANEL NO CONTROLS -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Laporan Petugas</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row" style="margin-bottom: 16px;">
                                <div class="col-md-12">
                                    <form action="halaman_laporan/cetak/laporan_petugas.php" method="POST" target="_blank">
                                        <label class="form-label">Nama-nama Petugas</label>
                                        <button type="submit" name="submit" class="form-control btn btn-primary">Cetak Laporan</button>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="halaman_laporan/cetak/laporan_jumlah_pengunjung_per_pertugas.php" method="POST" target="_blank">
                                        <label class="form-label">Jumlah Pengunjung Tiap Petugas</label>
                                        <button type="submit" name="submit" class="form-control btn btn-primary">Cetak Laporan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PANEL NO CONTROLS -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->