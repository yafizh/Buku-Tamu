<?php

if (isset($_GET['id_user'])) {
    require_once "database/koneksi.php";

    $sql = "SELECT * FROM tabel_user WHERE id_user=" . $_GET['id_user'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_user';" .
        "</script>";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $jam_kerja = $_POST['jam_kerja'];

    $sql = "UPDATE tabel_user 
            SET 
                nama='$nama', 
                username='$username', 
                password='$password', 
                status='$status',
                jam_kerja='$jam_kerja' 
            WHERE 
                id_user=" . $_GET['id_user'];

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('User berhasil diedit.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_user';" .
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
                    <h3 class="panel-title">Edit User <?= $row['nama']; ?></h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-6">
                                <label for="hari" class="form-label">Hari</label>
                                <input type="text" class="form-control" readonly value="<?= HARI_DALAM_INDONESIA[Date("w", strtotime($row['tanggal']))]; ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" readonly value="<?= $row['tanggal']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $row['username']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?= $row['password']; ?>">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="" disabled>Pilih Status</option>
                                    <option <?= ($row['status'] == 'ADMIN' ? 'selected' : ''); ?> value="ADMIN">Admin</option>
                                    <option <?= ($row['status'] == 'PETUGAS' ? 'selected' : ''); ?> value="PETUGAS">Petugas</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="jam_kerja" class="form-label">Jam Kerja</label>
                                <select class="form-control" id="jam_kerja" name="jam_kerja">
                                    <option value="" disabled selected>Pilih Jam Kerja</option>
                                    <option <?= ($row['jam_kerja'] == 'PAGI | (08:00 - 11:00)' ? 'selected' : ''); ?> value="PAGI | (08:00 - 11:00)">PAGI | (08:00 - 11:00)</option>
                                    <option <?= ($row['jam_kerja'] == 'SIANG | (13:00 - 16:00)' ? 'selected' : ''); ?> value="SIANG | (13:00 - 16:00)">SIANG | (13:00 - 16:00)</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12" style="display: flex; justify-content: end;">
                                <button type="submit" name="submit" class="btn btn-primary">Edit User</button>
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