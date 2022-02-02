<?php

if (isset($_GET['id_dokumen'])) {
    require_once "database/koneksi.php";

    $sql = "SELECT * FROM tabel_dokumen WHERE id_dokumen=" . $_GET['id_dokumen'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_dokumen';" .
        "</script>";

if (isset($_POST['submit'])) {
    $nomor_dokumen = $_POST['nomor_dokumen'];
    $nama_dokumen = $_POST['nama_dokumen'];
    $isi_dokumen = $_POST['isi_dokumen'];
    $keterangan = $_POST['keterangan'];

    $sql = "UPDATE tabel_dokumen 
            SET 
                nomor_dokumen='$nomor_dokumen', 
                nama_dokumen='$nama_dokumen', 
                isi_dokumen='$isi_dokumen', 
                keterangan='$keterangan'
            WHERE 
                id_dokumen=" . $_GET['id_dokumen'];

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Dokumen berhasil diedit.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_dokumen';" .
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
                    <h3 class="panel-title">Edit Dokumen <?= $row['nomor_dokumen']; ?></h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="nomor_dokumen" class="form-label">Nomor Dokumen</label>
                                <input type="text" class="form-control" readonly id="nomor_dokumen" name="nomor_dokumen" value="<?= $row['nomor_dokumen']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="nama_dokumen" class="form-label">Nama Dokumen</label>
                                <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen" value="<?= $row['nama_dokumen']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="isi_dokumen" class="form-label">Password</label>
                                <textarea class="form-control" id="isi_dokumen" name="isi_dokumen"><?= $row['isi_dokumen']; ?></textarea>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                            <label for="keterangan" class="form-label">Keterangan</label>
                                <select class="form-control" id="keterangan" name="keterangan">
                                    <option value="" disabled selected>Pilih Keterangan</option>
                                    <option <?= ($row['keterangan'] == 'TERLAKSANA' ? 'selected':''); ?> value="TERLAKSANA">Terlaksana</option>
                                    <option <?= ($row['keterangan'] == 'BELUM TERLAKSANA' ? 'selected':''); ?> value="BELUM TERLAKSANA">Belum Terlaksana</option>
                                    <option <?= ($row['keterangan'] == 'MASIH AGENDA' ? 'selected':''); ?> value="MASIH AGENDA">Masih Agenda</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12" style="display: flex; justify-content: end;">
                                <button type="submit" name="submit" class="btn btn-primary">Edit Dokumen</button>
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