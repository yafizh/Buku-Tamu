<?php
require_once "../../database/koneksi.php";
require_once "../../utils/utils.php";
$tahun_bulan_tanggal = $_POST['tanggal'];
$tanggal = explode('-', $tahun_bulan_tanggal)[2];
$bulan = explode('-', $tahun_bulan_tanggal)[1];
$tahun = explode('-', $tahun_bulan_tanggal)[0];
$id_ruangan = $_POST['id_ruangan'];
$id_user = $_POST['id_user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Tamu Tanggal <?= $tanggal . ' ' . BULAN_DALAM_INDONESIA[$bulan - 1] . ' ' . $tahun; ?></title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table {
            width: 100%;
        }

        .text-center {
            text-align: center;
        }

        #kop {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php include_once "header.php"; ?>
        <div class="my-3" style="border-top: 2px solid black; margin-top:12px;"></div>
        <h2 class="text-center">Laporan Tamu Tanggal <?= $tanggal . ' ' . BULAN_DALAM_INDONESIA[$bulan - 1] . ' ' . $tahun; ?></h2>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Keperluan</th>
                    <th>Tujuan</th>
                    <th>Petugas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $result = $mysqli->query("SELECT * FROM view_buku_tamu WHERE tanggal='$tahun_bulan_tanggal' AND id_ruangan LIKE '%$id_ruangan%' AND id_user LIKE '%$id_user%' ORDER BY id_tamu DESC");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td class="text-center"><?= $row['tanggal']; ?></td>
                            <td class="text-center"><?= $row['keperluan']; ?></td>
                            <td class="text-center"><?= $row['nama_ruangan']; ?></td>
                            <td class="text-center"><?= $row['nama_user']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php $result->free_result(); ?>
            </tbody>
        </table>
        <?php include_once "footer.php"; ?>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>