<?php
require_once "database/koneksi.php";
if (isset($_POST['submit'])) {

    $id_user = $_SESSION['id_user'];
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi_password_baru = $_POST['konfirmasi_password_baru'];

    $sql = "SELECT * FROM tabel_user WHERE id_user='$id_user' AND password='$password_lama'";
    if ($result = $mysqli->query($sql)){
        if(mysqli_num_rows($result) > 0){
            if($password_baru === $konfirmasi_password_baru){
                $sql = "UPDATE tabel_user SET password='$password_baru' WHERE id_user='$id_user'";
                if($mysqli->query($sql) === TRUE){
                    echo "<script>alert('Password Berhasil Diperbaharui, Silakan login ulang!')</script>";
                    echo "<script>window.location.href ='index.php?page=logout'</script>";
                } else echo "Error: " . $sql . "<br>" . $mysqli->error;
            } else echo "<script>alert('Password Baru Tidak Cocok!')</script>";
        } else echo "<script>alert('Password Lama Salah!')</script>";
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
                    <h3 class="panel-title">Ganti Password</h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="password_lama" class="form-label">Password Lama</label>
                                <input type="password" class="form-control" id="password_lama" name="password_lama">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="password_baru" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" id="password_baru" name="password_baru">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12">
                                <label for="konfirmasi_password_baru" class="form-label">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" id="konfirmasi_password_baru" name="konfirmasi_password_baru">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 16px;">
                            <div class="col-md-12" style="display: flex; justify-content: end;">
                                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
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