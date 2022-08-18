<?php
if (isset($_POST['submit'])) {
	require_once "database/koneksi.php";

	$username = $_POST['username'];

	$sql = "SELECT * FROM tabel_user WHERE username='$username'";
	$result = $mysqli->query($sql);
	if (!$result->num_rows) {
		$nama = $_POST['nama'];
		$password = $_POST['password'];

		$sql = "INSERT INTO tabel_user (nama,username,password,status) VALUES ('$nama','$username','$password','SEKOLAH')";
		if ($mysqli->query($sql))
			echo "<script>alert('Pendaftaran berhasil dilakukan, silakan login!')</script>";
		else echo "Error: " . $sql . "<br>" . $mysqli->error;
	} else echo "<script>alert('Username telah digunakan!')</script>";
}
?>
<div class="vertical-align-wrap">
	<div class="vertical-align-middle">
		<div class="auth-box">
			<div class="left">
				<div class="content">
					<div class="header">
						<div class="logo text-center"><img src="assets/img/Lambang_Kota_Banjarbaru.png" width="100"></div>
						<p class="lead">DARPUSDA KOTA BANJARBARU</p>
					</div>
					<form class="form-auth-small" action="" method="POST">
						<div class="form-group">
							<label for="nama" class="control-label sr-only">Nama</label>
							<input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama...">
						</div>
						<div class="form-group">
							<label for="username" class="control-label sr-only">Username</label>
							<input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username...">
						</div>
						<div class="form-group">
							<label for="password" class="control-label sr-only">Password</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password...">
						</div>
						<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">DAFTAR</button>
						<br>
						<a href="index.php">Login</a>
					</form>
				</div>
			</div>
			<div class="right">
				<div class="overlay"></div>
				<div class="content text">
					<h1 class="heading">Form Pendaftaran</h1>
					<p>Dinas Arsip dan Perpustakaan Daerah Kota Banjarbaru</p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>