<?php
if (isset($_POST['submit'])) {
	require_once "database/koneksi.php";

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM tabel_user WHERE username='$username' AND password='$password'";
	if ($user = $mysqli->query($sql)) {
		$user = $user->fetch_assoc();
		if (!is_null($user)) {
			$_SESSION['nama'] = $user['nama'];
			$_SESSION['id_user'] = $user['id_user'];
			$_SESSION['status'] = $user['status'];
			header('Location: index.php');
		} else echo "<script>alert('Username atau Password Salah!');</script>";
	} else echo "Error: " . $sql . "<br>" . $mysqli->error;
}
?>
<div class="vertical-align-wrap">
	<div class="vertical-align-middle">
		<div class="auth-box ">
			<div class="left">
				<div class="content">
					<div class="header">
						<div class="logo text-center"><img src="assets/img/Lambang_Kota_Banjarbaru.png" width="100"></div>
						<p class="lead">DARPUSDA KOTA BANJARBARU</p>
					</div>
					<form class="form-auth-small" action="" method="POST">
						<div class="form-group">
							<label for="username" class="control-label sr-only">Username</label>
							<input type="text" class="form-control" autofocus name="username" id="username" placeholder="Masukkan Username...">
						</div>
						<div class="form-group">
							<label for="password" class="control-label sr-only">Password</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password...">
						</div>
						<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
					</form>
				</div>
			</div>
			<div class="right">
				<div class="overlay"></div>
				<div class="content text">
					<h1 class="heading">Aplikasi Buku Tamu</h1>
					<p>Dinas Arsi dan Perpustakaan Daerah Kota Banjarbaru</p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>