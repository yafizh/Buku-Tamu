<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Buku Tamu</h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <!-- TABLE HOVER -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="col-md-1">No</th>
                                    <th class="col-md-5">Nama</th>
                                    <th class="col-md-2">Tanggal</th>
                                    <th class="col-md-2 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once "koneksi.php";

                                $batas = 5;
                                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                $sebelumnya = $halaman - 1;
                                $selanjutnya = $halaman + 1;

                                $data = $mysqli->query("SELECT * FROM tabel_buku_tamu");
                                $jumlah_data = mysqli_num_rows($data);
                                $total_halaman = ceil($jumlah_data / $batas);

                                $data_tamu = $mysqli->query("SELECT * FROM tabel_buku_tamu LIMIT $halaman_awal, $batas");
                                $nomor = $halaman_awal + 1;


                                $no = 1;
                                ?>
                                <?php while ($row = $data_tamu->fetch_assoc()) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;"><?= $no++; ?></td>
                                        <td style="vertical-align: middle;"><?= $row['nama']; ?></td>
                                        <td style="vertical-align: middle;"><?= $row['tanggal']; ?></td>
                                        <td class="text-center">
                                            <a href="index.php?page=detail_tamu&id_tamu=<?= $row['id_tamu']; ?>" class="btn btn-info btn-xs"><span class="lnr lnr-eye"></span></a>
                                            <a href="index.php?page=edit_tamu&id_tamu=<?= $row['id_tamu']; ?>" class="btn btn-warning btn-xs"><span class="lnr lnr-pencil"></span></a>
                                            <a href="index.php?page=delete_tamu&id_tamu=<?= $row['id_tamu']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><span class="lnr lnr-trash"></span></a>
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
                                            <a href="index.php?page=data_tamu&halaman=<?= $sebelumnya; ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                                        <li><a href="index.php?page=data_tamu&halaman=<?= $i; ?>"><?= $i; ?></a></li>
                                    <?php endfor; ?>
                                    <?php if ($selanjutnya <= $total_halaman) : ?>
                                        <li>
                                            <a href="index.php?page=data_tamu&halaman=<?= $selanjutnya; ?>" aria-label="Next">
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