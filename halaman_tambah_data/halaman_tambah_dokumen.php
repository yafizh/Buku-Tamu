<?php
require_once "database/koneksi.php";
if (isset($_POST['submit'])) {
    $nomor_dokumen = $_POST['nomor_dokumen'];
    $nama_dokumen = $_POST['nama_dokumen'];
    $isi_dokumen = $_POST['isi_dokumen'];
    $keterangan = $_POST['keterangan'];

    $sql = "
        INSERT INTO tabel_dokumen (
            nomor_dokumen, 
            nama_dokumen, 
            isi_dokumen, 
            keterangan  
        ) VALUES (
            '$nomor_dokumen', 
            '$nama_dokumen', 
            '$isi_dokumen', 
            '$keterangan'
        )";

    if ($mysqli->query($sql) === TRUE) echo "<script>alert('Dokumen berhasil ditambahkan.')</script>";
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
                    <h3 class="panel-title">Tambah Dokumen</h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="row" style="margin-bottom: 16px;">
                        <?php
                            $data_dokumen = $mysqli->query("SELECT id_dokumen FROM tabel_dokumen ORDER BY id_dokumen DESC");
                            $nomor_dokumen = $data_dokumen->fetch_assoc();
                            $nomor_dokumen = !empty($nomor_dokumen) ? ((int)$nomor_dokumen['id_dokumen'] + 1) : 1;
                            ?>
                            <div class="col-md-12">
                                <label for="nomor_dokumen" class="form-label">Nomor Dokumen</label>
                                <input type="text" value="DOK<?= $nomor_dokumen; ?>" readonly class="form-control" id="nomor_dokumen" name="nomor_dokumen" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                           
                            <div class="col-md-12">
                                <label for="nama_dokumen" class="form-label">Nama Dokumen</label>
                                <input type="text" autofocus class="form-control" id="nama_dokumen" name="nama_dokumen" required>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="isi_dokumen" class="form-label">Isi Dokumen</label>
                                <textarea class="form-control" id="isi_dokumen" name="isi_dokumen" required></textarea>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <select class="form-control" id="keterangan" name="keterangan">
                                    <option value="" disabled selected>Pilih Keterangan</option>
                                    <option value="TERLAKSANA">Terlaksana</option>
                                    <option value="BELUM TERLAKSANA">Belum Terlaksana</option>
                                    <option value="MASIH AGENDA">Masih Agenda</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12" style="display: flex; justify-content: end;">
                                <button type="submit" name="submit" class="btn btn-primary">Tambah Dokumen</button>
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