<?php

if (isset($_GET['id_agenda'])) {
    require_once "database/koneksi.php";

    $sql = "SELECT * FROM tabel_agenda WHERE id_agenda=" . $_GET['id_agenda'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_agenda';" .
        "</script>";

if (isset($_POST['submit'])) {
    $id_ruangan = $_POST['id_ruangan'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $kegiatan = $_POST['kegiatan'];

    $sql = "UPDATE tabel_agenda 
            SET 
                id_ruangan='$id_ruangan', 
                tanggal='$tanggal', 
                waktu='$waktu', 
                kegiatan='$kegiatan' 
            WHERE 
                id_agenda=" . $_GET['id_agenda'];

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Agenda berhasil diedit.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_agenda';" .
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
                    <h3 class="panel-title">Edit Agenda</h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="id_ruangan" class="form-label">Tempat</label>
                                <?php $data_ruangan = $mysqli->query("SELECT * FROM tabel_ruangan ORDER BY nama"); ?>
                                <select class="form-control" id="id_ruangan" name="id_ruangan" required>
                                    <option value="" selected disabled>Pilih Tempat</option>
                                    <?php while ($row_ruangan = $data_ruangan->fetch_assoc()) : ?>
                                        <?php if ($row_ruangan['id_ruangan'] == $row['id_ruangan']) : ?>
                                            <option selected value="<?= $row_ruangan['id_ruangan']; ?>"><?= ucwords(strtolower($row_ruangan['nama'])); ?></option>
                                        <?php else : ?>
                                            <option value="<?= $row_ruangan['id_ruangan']; ?>"><?= ucwords(strtolower($row_ruangan['nama'])); ?></option>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-4">
                                <label for="hari" class="form-label">Hari</label>
                                <input type="text" class="form-control" readonly value="<?= HARI_DALAM_INDONESIA[Date("w", strtotime($row['tanggal']))]; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $row['tanggal']; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="waktu" class="form-label">Waktu</label>
                                <input type="time" class="form-control" id="waktu" name="waktu" value="<?= $row['waktu']; ?>">
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
                                <textarea name="kegiatan" id="kegiatan" class="form-control" required><?= $row['kegiatan']; ?></textarea>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12" style="display: flex; justify-content: end;">
                                <button type="submit" name="submit" class="btn btn-primary">Edit Agenda</button>
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