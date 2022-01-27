<?php
require_once "database/koneksi.php";
if (isset($_POST['submit'])) {
    $id_ruangan = $_POST['id_ruangan'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $kegiatan = $_POST['kegiatan'];
    $pejabat = isset($_POST['pejabat']) ? $_POST['pejabat'] : '';
    $fotografer = isset($_POST['fotografer']) ? $_POST['fotografer'] : '';

    $sql = "
        INSERT INTO tabel_agenda (
            id_ruangan, 
            tanggal, 
            waktu, 
            pejabat,
            fotografer,
            kegiatan 
        ) VALUES (
            '$id_ruangan', 
            '$tanggal', 
            '$waktu', 
            '$pejabat', 
            '$fotografer', 
            '$kegiatan'
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
                            <div class="col-md-12">
                                <label for="id_ruangan" class="form-label">Tempat</label>
                                <?php $data_ruangan = $mysqli->query("SELECT * FROM tabel_ruangan ORDER BY nama_ruangan"); ?>
                                <select class="form-control" id="id_ruangan" name="id_ruangan" required>
                                    <option value="" selected disabled>Pilih Tempat</option>
                                    <?php while ($row = $data_ruangan->fetch_assoc()) : ?>
                                        <option value="<?= $row['id_ruangan']; ?>"><?= ucwords(strtolower($row['nama_ruangan'])); ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" value="<?= Date("Y-m-d"); ?>" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="waktu" class="form-label">Waktu</label>
                                <input type="time" value="<?= Date("H:i"); ?>" class="form-control" id="waktu" name="waktu" required>
                            </div>
                        </div>
                        <?php if ($_SESSION['status'] == 'ADMIN') : ?>
                            <div class="row" style="margin-bottom: 16px;">
                                <div class="col-md-12">
                                    <label for="pejabat" class="form-label">Pejabat</label>
                                    <input type="text" class="form-control" id="pejabat" name="pejabat">
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 16px;">
                                <div class="col-md-12">
                                    <label for="fotografer" class="form-label">Fotografer</label>
                                    <input type="text" class="form-control" id="fotografer" name="fotografer">
                                </div>
                            </div>
                        <?php endif; ?>
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