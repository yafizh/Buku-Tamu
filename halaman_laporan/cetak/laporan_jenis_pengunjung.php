<?php
require_once "../../database/koneksi.php";
require_once "../../utils/utils.php";
$tahun = $_POST['tahun'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Jenis Pengunjung Tahun <?= $tahun; ?></title>
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
        <h2 class="text-center">Laporan Jenis Pengunjung Tahun <?= $tahun; ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Perorangan</th>
                    <th>Sekolah/Instansi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $result = $mysqli->query("SELECT * FROM view_jumlah_kunjungan_agenda_dan_tamu WHERE tahun='$tahun'");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php $data = $result->fetch_all(MYSQLI_ASSOC); ?>
                    <?php for ($i = 0; $i < 12; $i++) : ?>
                        <tr>
                            <td class="text-center"><?= BULAN_DALAM_INDONESIA[$i]; ?></td>
                            <?php $exsist_umum = false; ?>
                            <?php $exsist_instansi = false; ?>
                            <?php foreach ($data as $datum) : ?>
                                <?php if ($datum['bulan'] == ($i + 1) && $datum['jenis'] == 'Umum') : ?>
                                    <td class="text-center"><?= $datum['jumlah']; ?></td>
                                    <?php $exsist_umum = true; ?>
                                <?php endif; ?>
                                <?php if ($datum['bulan'] == ($i + 1) && $datum['jenis'] == 'KUNJUNGAN SEKOLAH') : ?>
                                    <?php if (!$exsist_umum) : ?>
                                        <td class="text-center"><?= 0; ?></td>
                                        <?php $exsist_umum = true; ?>
                                    <?php endif; ?>
                                    <td class="text-center"><?= $datum['jumlah']; ?></td>
                                    <?php $exsist_instansi = true; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php if (!$exsist_umum) : ?>
                                <td class="text-center"><?= 0; ?></td>
                            <?php endif; ?>
                            <?php if (!$exsist_instansi) : ?>
                                <td class="text-center"><?= 0; ?></td>
                            <?php endif; ?>
                        </tr>
                    <?php endfor; ?>
                <?php endif; ?>
                <?php $result->free_result(); ?>
            </tbody>
        </table>
        <div style="display: flex; justify-content: end;">
            <div style="text-align: center; margin-top: 20px; padding: 10px; width: 200px;">
                <span>Banjarbaru, <?= Date('d') ?> <?= BULAN_DALAM_INDONESIA[Date('m') - 1] ?> <?= Date('Y') ?></span>
                <br>
                <span>Mengetahui</span>
                <br><br><br><br><br>
                <span>ADMIN</span>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>