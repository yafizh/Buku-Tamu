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
                    <div class="col-md-8">

                    </div>
                    <div class="col-md-4">
                        <form action="" method="POST" style="display: flex; justify-content: end;">
                            <input type="text" name="keyword" placeholder="Nama, Tanggal..." class="form-control" value="<?= isset($_POST['keyword']) ? $_POST['keyword'] : ""; ?>" style="margin-right: 16px;">
                            <button type="submit" name="submit" class="btn btn-primary">Cari</button>
                        </form>
                    </div>
                    <div class="col-md-12" style="margin-top: 16px;">
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
                                $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : ""; 
                                $data_tamu = $mysqli->query("SELECT * FROM tabel_buku_tamu WHERE nama LIKE '%$keyword%' OR tanggal LIKE '%$keyword%' ORDER BY id_tamu");
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
                    <!-- END TABLE HOVER -->
                </div>
            </div>
            <!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->