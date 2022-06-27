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

if (isset($_POST['disetujui'])) {
    $sql = "UPDATE tabel_agenda 
            SET 
                status='DISETUJUI' 
            WHERE 
                id_agenda=" . $_GET['id_agenda'];

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Agenda berhasil disetujui.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_agenda';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
}

if (isset($_POST['ditolak'])) {
    $sql = "UPDATE tabel_agenda 
    SET 
        status='DITOLAK' 
    WHERE 
        id_agenda=" . $_GET['id_agenda'];

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Agenda berhasil ditolak.')</script>";
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
                    <h3 class="panel-title">Detail Agenda</h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <div class="row" style="margin-bottom: 16px;">
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                            <label for="jenis" class="form-label">Jenis Agenda</label>
                            <input type="text" class="form-control" value="<?= $row['jenis']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 16px;">
                        <div class="col-md-4">
                            <label for="hari" class="form-label">Hari</label>
                            <input type="text" class="form-control" readonly value="<?= HARI_DALAM_INDONESIA[Date("w", strtotime($row['tanggal']))]; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $row['tanggal']; ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="waktu" class="form-label">Waktu</label>
                            <input type="time" class="form-control" id="waktu" name="waktu" value="<?= $row['waktu']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 16px;">
                        <div class="col-md-12">
                            <label for="kegiatan" class="form-label">Kegiatan</label>
                            <textarea name="kegiatan" id="kegiatan" class="form-control" required readonly><?= $row['kegiatan']; ?></textarea>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 16px;">
                        <div class="col-md-12" style="display: flex; justify-content: end;">
                            <form action="" method="POST" style="display: inline; margin-right: 1rem;">
                                <button type="submit" name="ditolak" class="btn btn-danger">Tolak</button>
                            </form>
                            <form action="" method="POST" style="display: inline;">
                                <button type="submit" name="disetujui" class="btn btn-success">Setujui</button>
                            </form>
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