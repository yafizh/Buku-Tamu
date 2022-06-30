<?php
require_once "../../database/koneksi.php";
require_once "../../utils/utils.php";
$tahun_bulan = $_POST['bulan'];
$bulan = explode('-', $tahun_bulan)[1];
$tahun = explode('-', $tahun_bulan)[0];
$id_ruangan = $_POST['id_ruangan'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kunjungan Sekolah Bulan <?= BULAN_DALAM_INDONESIA[$bulan - 1] . ' ' . $tahun; ?></title>
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
        <h2 class="text-center">Laporan Kunjungan Sekolah Bulan <?= BULAN_DALAM_INDONESIA[$bulan - 1] . ' ' . $tahun; ?></h2>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Tempat</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Kegiatan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $result = $mysqli->query("SELECT * FROM view_agenda WHERE (MONTH(tanggal)='$bulan' AND YEAR(tanggal)='$tahun') AND id_ruangan LIKE '%$id_ruangan%' AND jenis='KUNJUNGAN SEKOLAH' ORDER BY id_agenda DESC");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $row['nama_ruangan']; ?></td>
                            <td class="text-center"><?= $row['tanggal']; ?></td>
                            <td class="text-center"><?= $row['waktu']; ?></td>
                            <td><?= $row['kegiatan']; ?></td>
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