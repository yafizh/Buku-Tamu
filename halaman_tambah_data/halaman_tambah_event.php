<?php
require_once "database/koneksi.php";
if (isset($_POST['submit'])) {
    $id_ruangan = $_POST['id_ruangan'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $kegiatan = $_POST['kegiatan'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);

    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        $sql = "
        INSERT INTO tabel_event (
            id_ruangan, 
            tanggal, 
            nama, 
            waktu, 
            kegiatan, 
            gambar  
        ) VALUES (
            '$id_ruangan', 
            '$tanggal', 
            '$nama', 
            '$waktu', 
            '$kegiatan',
            '$target_file' 
        )";

        if ($mysqli->query($sql) === TRUE) echo "<script>alert('Event berhasil ditambahkan.')</script>";
        else echo "Error: " . $sql . "<br>" . $mysqli->error;
    } else {
        echo "Sorry, there was an error uploading your file.";
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
                    <h3 class="panel-title">Tambah Event</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Event</label>
                                <input type="text" class="form-control" name="nama" id="name" autocomplete="off">
                            </div>
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
                                <label for="kegiatan" class="form-label">kegiatan</label>
                                <textarea name="kegiatan" id="kegiatan" class="form-control" required></textarea>
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
                                <button type="submit" name="submit" class="btn btn-primary">Tambah Event</button>
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