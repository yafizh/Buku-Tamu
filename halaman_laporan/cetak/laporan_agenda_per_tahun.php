<?php
require_once "../../database/koneksi.php";
require_once "../../utils/utils.php";
$tahun = $_POST['tahun'];
$id_ruangan = $_POST['id_ruangan'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Agenda Tahun <?= $tahun; ?></title>
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
        <div id="kop" class="d-flex justify-content-center gap-5">
            <img src="../../assets/img/Lambang_Kota_Banjarbaru.png" height="150" alt="">
            <div class="text-center" style="flex: 1;">
                <h2>
                    DINAS ARSIP DAN PERPUSTAKAAN DAERAH
                    <br>
                    BANJARBARU
                </h2>
                <p>
                    Alamat: Jl. Wijaya Kusuma No.7
                    <br>
                    Email: darpusdabjb@banjarbarukota.go.id
                </p>
            </div>
        </div>
        <div class="my-3" style="border-top: 2px solid black; margin-top:12px;"></div>
        <h2 class="text-center">Laporan Agenda Tahun <?= $tahun; ?></h2>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Tempat</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Pejabat</th>
                    <th>Fotografer</th>
                    <th>Kegiatan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $result = $mysqli->query("SELECT * FROM view_agenda WHERE YEAR(tanggal)='$tahun' AND id_ruangan LIKE '%$id_ruangan%' ORDER BY id_agenda DESC");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $row['nama_ruangan']; ?></td>
                            <td class="text-center"><?= $row['tanggal']; ?></td>
                            <td class="text-center"><?= $row['waktu']; ?></td>
                            <td class="text-center"><?= $row['pejabat']; ?></td>
                            <td class="text-center"><?= $row['fotografer']; ?></td>
                            <td class="text-center"><?= $row['kegiatan']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php $result->free_result(); ?>
            </tbody>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>