<?php

if (isset($_GET['id_tamu'])) {
    require_once "database/koneksi.php";

    $sql = "SELECT * FROM tabel_buku_tamu WHERE id_tamu=" . $_GET['id_tamu'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_tamu';" .
        "</script>";

if (isset($_POST['submit'])) {
    $nomor_identitas = $_POST['nomor_identitas'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nomor_handphone = $_POST['nomor_handphone'];
    $id_ruangan = $_POST['id_ruangan'];
    $kesan_kunjungan = $_POST['kesan_kunjungan'];
    $keperluan = $_POST['keperluan'];

    $sql = "UPDATE tabel_buku_tamu 
            SET 
                nomor_identitas='$nomor_identitas', 
                nama='$nama', 
                alamat='$alamat', 
                nomor_handphone='$nomor_handphone', 
                id_ruangan='$id_ruangan', 
                kesan_kunjungan='$kesan_kunjungan', 
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
                                <label for="nomor_identitas" class="form-label">Nomor Identitas</label>
                                <input type="text" class="form-control" id="nomor_identitas" name="nomor_identitas" value="<?= $row['nomor_identitas']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-3">
                                <label for="hari" class="form-label">Hari</label>
                                <input type="text" class="form-control" readonly id="hari" name="hari" value="<?= HARI_DALAM_INDONESIA[Date("w", strtotime($row['tanggal']))]; ?>">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Tanggal Bertamu</label>
                                <input type="date" class="form-control" readonly value="<?= $row['tanggal']; ?>">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Jam Masuk</label>
                                <input type="time" class="form-control" readonly value="<?= $row['jam_masuk']; ?>">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Jam Keluar</label>
                                <input type="time" class="form-control" readonly value="<?= $row['jam_keluar']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-6">
                                <label for="nomor_handphone" class="form-label">Nomor Handphone</label>
                                <input type="number" class="form-control" id="nomor_handphone" name="nomor_handphone" value="<?= $row['nomor_handphone']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status Kunjungan</label>
                                <input type="text" class="form-control" readonly value="<?= ucwords(strtolower($row['status_kunjungan'])); ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $row['alamat']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-6">
                                <label for="id_ruangan" class="form-label">Tujuan</label>
                                <select class="form-control" id="id_ruangan" name="id_ruangan" required>
                                    <option value="" selected disabled>Pilih Tempat</option>
                                    <?php $data_ruangan = $mysqli->query("SELECT * FROM tabel_ruangan ORDER BY nama"); ?>
                                    <?php while ($row_ruangan = $data_ruangan->fetch_assoc()) : ?>
                                        <?php if ($row_ruangan['id_ruangan'] == $row['id_ruangan']) : ?>
                                            <option selected value="<?= $row_ruangan['id_ruangan']; ?>"><?= ucwords(strtolower($row_ruangan['nama'])); ?></option>
                                        <?php else : ?>
                                            <option value="<?= $row_ruangan['id_ruangan']; ?>"><?= ucwords(strtolower($row_ruangan['nama'])); ?></option>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="keperluan" class="form-label">Keperluan</label>
                                <input type="text" class="form-control" id="keperluan" name="keperluan" value="<?= $row['keperluan']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="kesan_kunjungan" class="form-label">Kesan Kunjungan</label>
                                <input type="text" class="form-control" id="kesan_kunjungan" name="kesan_kunjungan" value="<?= $row['kesan_kunjungan']; ?>">
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