<?php
if (isset($_GET['id_event'])) {
    require_once "database/koneksi.php";

    $sql = "SELECT * FROM tabel_event WHERE id_event=" . $_GET['id_event'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_event';" .
        "</script>";

if (isset($_POST['submit'])) {
    $id_ruangan = $_POST['id_ruangan'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $kegiatan = $_POST['kegiatan'];

    if ($_FILES['gambar']['error'] != 4) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);

        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $sql = "
            UPDATE tabel_event SET 
                id_ruangan='$id_ruangan', 
                tanggal='$tanggal', 
                nama='$nama', 
                waktu='$waktu', 
                kegiatan='$kegiatan', 
                gambar='$target_file' 
            WHERE 
                id_event=" . $_GET['id_event'];

            if ($mysqli->query($sql) === TRUE) {
                echo "<script>alert('Event berhasil diedit.')</script>";
                echo "<script>" .
                    "window.location.href='index.php?page=data_event';" .
                    "</script>";
            } else echo "Error: " . $sql . "<br>" . $mysqli->error;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        $sql = "
            UPDATE tabel_event SET 
                id_ruangan='$id_ruangan', 
                tanggal='$tanggal', 
                nama='$nama', 
                waktu='$waktu', 
                kegiatan='$kegiatan' 
            WHERE 
                id_event=" . $_GET['id_event'];

        if ($mysqli->query($sql) === TRUE) {
            echo "<script>alert('Event berhasil diedit.')</script>";
            echo "<script>" .
                "window.location.href='index.php?page=data_event';" .
                "</script>";
        } else echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
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
                    <h3 class="panel-title">Edit Event <?= $row['nama']; ?></h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Event</label>
                                <input type="text" class="form-control" name="nama" id="name" autocomplete="off" value="<?= $row['nama']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="id_ruangan" class="form-label">Tempat</label>
                                <?php $data_ruangan = $mysqli->query("SELECT * FROM tabel_ruangan ORDER BY nama"); ?>
                                <select class="form-control" id="id_ruangan" name="id_ruangan" required>
                                    <option value="" selected disabled>Pilih Tempat</option>
                                    <?php while ($data = $data_ruangan->fetch_assoc()) : ?>
                                        <?php if ($data['id_ruangan'] == $row['id_ruangan']) : ?>
                                            <option selected value="<?= $data['id_ruangan']; ?>"><?= ucwords(strtolower($data['nama'])); ?></option>
                                        <?php else : ?>
                                            <option value="<?= $data['id_ruangan']; ?>"><?= ucwords(strtolower($data['nama'])); ?></option>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-4">
                                <label for="hari" class="form-label">Hari</label>
                                <input type="text" class="form-control" readonly id="hari" name="hari" value="<?= HARI_DALAM_INDONESIA[Date("w", strtotime($row['tanggal']))]; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" value="<?= $row['tanggal']; ?>" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="col-md-4">
                                <label for="waktu" class="form-label">Waktu</label>
                                <input type="time" value="<?= $row['waktu']; ?>" class="form-control" id="waktu" name="waktu" required>
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
                                <label for="kegiatan" class="form-label">kegiatan</label>
                                <textarea name="kegiatan" id="kegiatan" class="form-control" required><?= $row['kegiatan'] ?></textarea>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="kegiatan" class="form-label">Gambar Kegiatan</label>
                                <input type="file" name="gambar">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12" style="display: flex; justify-content: end;">
                                <button type="submit" name="submit" class="btn btn-primary">Edit Event</button>
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