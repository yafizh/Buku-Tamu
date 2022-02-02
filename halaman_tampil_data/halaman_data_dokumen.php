<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Dokumen</h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <div class="col-md-8">
                        <a href="index.php?page=tambah_dokumen" class="btn btn-primary">Tambah Dokumen</a>
                    </div>
                    <div class="col-md-4">
                        <form action="" method="POST" style="display: flex; justify-content: end;">
                            <input type="text" name="keyword" placeholder="Nomor Dokumen, Keterangan..." class="form-control" value="<?= isset($_POST['keyword']) ? $_POST['keyword'] : ""; ?>" style="margin-right: 16px;">
                            <button type="submit" name="submit" class="btn btn-primary">Cari</button>
                        </form>
                    </div>
                    <div class="col-md-12" style="margin-top: 16px;">
                        <!-- TABLE HOVER -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="col-md-1">No</th>
                                    <th class="col-md-4">Nama</th>
                                    <th class="col-md-2">Isi Dokumen</th>
                                    <th class="col-md-3">Keterangan</th>
                                    <th class="col-md-2 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once "database/koneksi.php";
                                $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : "";

                                $batas = 50;
                                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                $sebelumnya = $halaman - 1;
                                $selanjutnya = $halaman + 1;

                                $data = $mysqli->query("SELECT * FROM tabel_dokumen WHERE nomor_dokumen LIKE '%$keyword%' OR keterangan LIKE '%$keyword%'");
                                $jumlah_data = mysqli_num_rows($data);
                                $total_halaman = ceil($jumlah_data / $batas);

                                $data_dokumen = $mysqli->query("SELECT * FROM tabel_dokumen WHERE nomor_dokumen LIKE '%$keyword%' OR keterangan LIKE '%$keyword%' ORDER BY id_dokumen DESC LIMIT $halaman_awal, $batas");
                                $nomor = $halaman_awal + 1;

                                $no = 1;
                                ?>
                                <?php while ($row = $data_dokumen->fetch_assoc()) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;"><?= $no++; ?></td>
                                        <td style="vertical-align: middle;"><?= $row['nomor_dokumen']; ?></td>
                                        <td style="vertical-align: middle;"><?= $row['isi_dokumen']; ?></td>
                                        <td style="vertical-align: middle;"><?= $row['keterangan']; ?></td>
                                        <td class="text-center">
                                            <a href="index.php?page=edit_dokumen&id_dokumen=<?= $row['id_dokumen']; ?>" class="btn btn-warning btn-xs"><span class="lnr lnr-pencil"></span></a>
                                            <a href="index.php?page=delete_dokumen&id_dokumen=<?= $row['id_dokumen']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><span class="lnr lnr-trash"></span></a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12" style="display: flex; justify-content: end;">
                        <?php if ($total_halaman > 1) : ?>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <?php if ($sebelumnya > 0) : ?>
                                        <li>
                                            <a href="index.php?page=data_dokumen&halaman=<?= $sebelumnya; ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                                        <?php if ($i == $halaman) : ?>
                                            <li class="active"><a href="index.php?page=data_dokumen&halaman=<?= $i; ?>"><?= $i; ?></a></li>
                                        <?php else : ?>
                                            <li><a href="index.php?page=data_dokumen&halaman=<?= $i; ?>"><?= $i; ?></a></li>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <?php if ($selanjutnya <= $total_halaman) : ?>
                                        <li>
                                            <a href="index.php?page=data_dokumen&halaman=<?= $selanjutnya; ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        <?php endif; ?>
                    </div>
                    <!-- END TABLE HOVER -->
                </div>
            </div>
            <!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->