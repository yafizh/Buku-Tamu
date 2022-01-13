<?php
require_once "database/koneksi.php";
if (isset($_POST['submit'])) {
    $id_user = $_SESSION['id_user'];
    $id_ruangan = $_POST['id_ruangan'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $jam_masuk = $_POST['jam_masuk'];
    $alamat = $_POST['alamat'];
    $nomor_handphone = $_POST['nomor_handphone'];
    $tujuan = $_POST['tujuan'];
    $keperluan = $_POST['keperluan'];
    $status_kunjungan = 'SEDANG BERKUNJUNG';

    $sql = "
        INSERT INTO tabel_buku_tamu (
            id_user, 
            id_ruangan, 
            nama, 
            tanggal, 
            jam_masuk, 
            alamat, 
            nomor_handphone, 
            keperluan,
            status_kunjungan 
        ) VALUES (
            '$id_user', 
            '$id_ruangan', 
            '$nama', 
            '$tanggal',
            '$jam_masuk',
            '$alamat', 
            '$nomor_handphone',
            '$keperluan',
            '$status_kunjungan'
        )";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('Tamu berhasil ditambahkan.')</script>";
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
                            <div class="col-md-12">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" autofocus class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-6">
                                <label for="tanggal" class="form-label">Tanggal Bertamu</label>
                                <input type="date" class="form-control" readonly id="tanggal" name="tanggal" value="<?= Date("Y-m-d"); ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="jam_masuk" class="form-label">Jam Masuk</label>
                                <input type="time" class="form-control" readonly id="jam_masuk" name="jam_masuk" value="<?= Date("H:i"); ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-4">
                                <label for="nomor_handphone" class="form-label">Nomor Handphone</label>
                                <input type="number" class="form-control" id="nomor_handphone" name="nomor_handphone" required>
                            </div>
                            <div class="col-md-4">
                                <label for="id_ruangan" class="form-label">Tujuan</label>
                                <?php $data_ruangan = $mysqli->query("SELECT * FROM tabel_ruangan ORDER BY nama_ruangan"); ?>
                                <select class="form-control" id="id_ruangan" name="id_ruangan" required>
                                    <option value="" selected disabled>Pilih Ruangan</option>
                                    <?php while ($row = $data_ruangan->fetch_assoc()) : ?>
                                        <option value="<?= $row['id_ruangan']; ?>"><?= ucwords(strtolower($row['nama_ruangan'])); ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="keperluan" class="form-label">Keperluan</label>
                                <input type="text" class="form-control" id="keperluan" name="keperluan" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12" style="display: flex; justify-content: end;">
                                <button type="submit" name="submit" class="btn btn-primary">Tambah Tamu</button>
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