<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Daftar Event</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- TABLE HOVER -->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-md-1">No</th>
                                        <th class="col-md-2">Nama Event</th>
                                        <th class="col-md-2">Ruangan</th>
                                        <th class="col-md-3">Tanggal</th>
                                        <th class="col-md-1">Waktu</th>
                                        <th class="col-md-2 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once "database/koneksi.php";
                                    require_once "utils/utils.php";

                                    $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : "";

                                    $batas = 50;
                                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                    $sebelumnya = $halaman - 1;
                                    $selanjutnya = $halaman + 1;

                                    $data = $mysqli->query("SELECT * FROM tabel_event");
                                    $jumlah_data = mysqli_num_rows($data);
                                    $total_halaman = ceil($jumlah_data / $batas);

                                    $data_event = $mysqli->query("SELECT * FROM view_event ORDER BY id_event LIMIT $halaman_awal, $batas");
                                    $nomor = $halaman_awal + 1;

                                    $no = 1;
                                    ?>
                                    <?php while ($row = $data_event->fetch_assoc()) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;"><?= $no++; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['nama']; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['nama_ruangan']; ?></td>
                                            <td style="vertical-align: middle;">
                                                <?php
                                                $tanggal = $row['tanggal'];
                                                $tahun = explode('-', $tanggal)[0];
                                                $bulan = explode('-', $tanggal)[1];
                                                $tanggal = explode('-', $tanggal)[2];
                                                ?>
                                                <?= $tanggal . ' ' . BULAN_DALAM_INDONESIA[$bulan - 1] . ' ' . $tahun; ?>
                                            </td>
                                            <td style="vertical-align: middle;"><?= $row['waktu']; ?></td>
                                            <td class="text-center">
                                                <a href="index.php?page=detail_event&id_event=<?= $row['id_event']; ?>" class="btn btn-info btn-xs"><span class="lnr lnr-eye"></span></a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Profil Dinas Arsip dan Perpustakaan Daerah Kota Banjarbaru</h3>
                </div>
                <div class="panel-body">
                    <img src="assets/img/profil2.jfif" width="500" class="thumbnail" style="float: left; margin-right: 1rem;">
                    <h3 style="padding-top: 0; margin-top: 0; text-align: center; color: black;">Sejarah</h3>
                    <p style="font-size: 20px; text-indent: 50px;">Kantor Perpustakaan dan Arsip Daerah Kota Banjarbaru berdiri sejak 2009, sebagai lembaga tehnis daerah yang dibentuk berdasarkan Peraturan Daerah Kota Banjarbaru Nomor 12 tahun 2008 Tentang Pembentukan Organisasi dan Tata Kerja Lembaga Tehnis Daerah dan Satuan Polisi Pamong Praja Kota Banjarbaru.</p>
                    <p style="font-size: 20px;  text-indent: 50px;">Embrio dari Kantor Perpustakaan dan Arsip Daerah adalah UPT. Perpustakaan di bawah Dinas Pendidikan. Pada Tahun 2016 Kantor Perpustakaan dan Arsip Daerah Kota Banjarbaru resmi menjadi Dinas Arsip dan Perpustakaan Daerah Kota Banjarbaru sesuai dengan Peraturan Daerah Kota Banjarbaru Nomor 10 Tahun 2016 Tentang Pembentukan dan susunan Perangkat Daerah Kota Banjarbaru dan Peraturan Walikota Banjarbaru Nomor 36 Tahun 2016 Tentang Kedudukan, Susunan Organisasi, Tugas Pokok dan Fungsi Serta Tata Kerja Dinas Arsip dan Perpustakaan Daerah Kota Banjarbaru.</p>
                    <img src="assets/img/profil3.jpg" width="500" class="thumbnail" style="float: right; margin-right: 1rem;">
                    <h3 style="padding-top: 0; margin-top: 0; text-align: center; color: black;">Visi dan Misi</h3>
                    <h4 style="color: black;">Visi</h4>
                    <p style="font-size: 20px; text-indent: 50px;">Terwujudnya penyelenggaran kearsipan sebagai pusat dokumentasi & Informasi dan perpustakaan sebagai pusat belajar dengan layanan profesional dan inklusif yang berbasis teknologi informasi multimedia.</p>
                    <h4 style="color: black;">Misi</h4>
                    <ol style="font-size: 20px;">
                        <li>Mewujudkan kearsipan yang mendukung penyelenggaraan pemerintahan dan penyediaan layanan dan akses arsip untuk kepentingan pemerintahan, pembangunan kemasyarakatan penelitian dan ilmu pengetahuan</li>
                        <li>Meningkatkan kualitas layanan jasa kearsipan dan perpustakaan yang profesional, inklusif, dan responsif berbasis teknologi informasi dan komunikasi</li>
                        <li>Mewujudkan perpustakaan multimedia yang inklusif yang mudah diakses melalui pembinaan yang berkesinambungan sesuai fungsi perpustakaan</li>
                        <li>Meningkatkan kesadaran akan kebutuhan membaca dengan melibatkan pemangku kepentingan, komunitas dan organisasi atau kelompok lainnya</li>
                    </ol>
                </div>
            </div>
            <!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->