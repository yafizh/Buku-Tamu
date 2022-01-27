<?php
require_once "database/koneksi.php";
if (isset($_POST['submit'])) {

    $id_tamu = $_POST['id_tamu'];
    $jam_keluar = $_POST['jam_keluar'];
    $status_kunjungan = 'TELAH BERKUNJUNG';
    $kesan_kunjungan = $_POST['kesan_kunjungan'];

    $sql = "
        UPDATE 
            tabel_buku_tamu 
        SET 
            jam_keluar='$jam_keluar', 
            status_kunjungan='$status_kunjungan', 
            kesan_kunjungan='$kesan_kunjungan' 
        WHERE 
            id_tamu=$id_tamu";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('Tamu Selesai Berkunjung')</script>";
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
                    <h3 class="panel-title">Buku Tamu</h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="row" style="margin-bottom: 16px;">
                            <?php $data_tamu = $mysqli->query("SELECT * FROM tabel_buku_tamu WHERE status_kunjungan='SEDANG BERKUNJUNG'"); ?>
                            <div class="col-md-12">
                                <label for="id_tamu" class="form-label">Nama</label>
                                <select class="form-control" id="id_tamu" name="id_tamu" required>
                                    <option value="" disabled selected>Pilih Tamu</option>
                                    <?php while ($row = $data_tamu->fetch_assoc()) : ?>
                                        <option value="<?= $row['id_tamu']; ?>"><?= $row['nama']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-4">
                                <label for="hari" class="form-label">Hari</label>
                                <input type="text" class="form-control" readonly id="hari" name="hari" value="<?= HARI_DALAM_INDONESIA[Date("w")]; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="tanggal" class="form-label">Tanggal Bertamu</label>
                                <input type="date" class="form-control" readonly id="tanggal" name="tanggal" value="<?= Date("Y-m-d"); ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="jam_keluar" class="form-label">Jam Keluar</label>
                                <input type="time" class="form-control" readonly id="jam_keluar" name="jam_keluar" value="<?= Date("H:i"); ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="kesan_kunjungan" class="form-label">Kesan Kunjungan</label>
                                <input type="text" class="form-control" id="kesan_kunjungan" name="kesan_kunjungan" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12" style="display: flex; justify-content: end;">
                                <button type="submit" name="submit" class="btn btn-primary">Tamu Keluar</button>
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