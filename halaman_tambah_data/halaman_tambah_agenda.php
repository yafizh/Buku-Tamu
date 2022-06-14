<?php
require_once "database/koneksi.php";
if (isset($_POST['submit'])) {
    $id_ruangan = $_POST['id_ruangan'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $kegiatan = $_POST['kegiatan'];
    $jenis = $_POST['jenis'];
    $status = $_SESSION['status'] === 'admin' ? 'DISETUJUI' : 'PENGAJUAN';
    $id_user = $_SESSION['id_user'];

    $sql = "
        INSERT INTO tabel_agenda (
            id_ruangan, 
            id_user, 
            tanggal, 
            waktu, 
            kegiatan, 
            jenis,  
            status    
        ) VALUES (
            '$id_ruangan', 
            '$id_user', 
            '$tanggal', 
            '$waktu', 
            '$kegiatan',
            '$jenis', 
            '$status' 
        )";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('Agenda berhasil ditambahkan.')</script>";
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
                    <h3 class="panel-title">Tambah Agenda</h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-6">
                                <label for="id_ruangan" class="form-label">Tempat</label>
                                <?php $data_ruangan = $mysqli->query("SELECT * FROM tabel_ruangan ORDER BY nama"); ?>
                                <select class="form-control" id="id_ruangan" name="id_ruangan" required>
                                    <option value="" selected disabled>Pilih Tempat</option>
                                    <?php while ($row = $data_ruangan->fetch_assoc()) : ?>
                                        <option value="<?= $row['id_ruangan']; ?>"><?= ucwords(strtolower($row['nama'])); ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="jenis" class="form-label">Jenis Agenda</label>
                                <select class="form-control" id="jenis" name="jenis" required <?= $_SESSION['status'] === 'SEKOLAH' ? 'readonly' : ''; ?>>
                                    <option value="" selected disabled>Pilih Jenis Agenda</option>
                                    <option value="INTERNAL" <?= $_SESSION['status'] === 'SEKOLAH' ? 'disabled' : ''; ?>>Kegiatan Internal</option>
                                    <option value="KUNJUNGAN SEKOLAH" <?= $_SESSION['status'] === 'SEKOLAH' ? 'selected' : ''; ?>>Kunjungan Sekolah</option>
                                    <option value="EVENT" <?= $_SESSION['status'] === 'SEKOLAH' ? 'disabled' : ''; ?>>Event</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-4">
                                <label for="hari" class="form-label">Hari</label>
                                <input type="text" class="form-control" readonly id="hari" name="hari" value="<?= HARI_DALAM_INDONESIA[Date("w")]; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" value="<?= Date("Y-m-d"); ?>" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="col-md-4">
                                <label for="waktu" class="form-label">Waktu</label>
                                <input type="time" value="<?= Date("H:i"); ?>" class="form-control" id="waktu" name="waktu" required>
                            </div>
                            <script>
                                document.querySelector('#tanggal').addEventListener('change', function() {
                                    const date = new Date(this.value);
                                    document.querySelector('#hari').value = date.toLocaleDateString('id-ID', {
                                        weekday: 'long'
                                    });
                                });
                            </script>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="kegiatan" class="form-label">Kegiatan</label>
                                <textarea name="kegiatan" id="kegiatan" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12" style="display: flex; justify-content: end;">
                                <button type="submit" name="submit" class="btn btn-primary">Tambah Agenda</button>
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