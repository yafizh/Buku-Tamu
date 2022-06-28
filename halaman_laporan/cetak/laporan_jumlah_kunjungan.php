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
    <title>Laporan Jumlah Kunjungan Tahun <?= $tahun; ?></title>
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
        <h2 class="text-center">Laporan Jumlah Kunjungan Tahun <?= $tahun; ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Pengunjung</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $result = $mysqli->query("SELECT * FROM view_jumlah_kunjungan WHERE tahun='$tahun'");
                ?>
                <?php $data = $result->fetch_all(MYSQLI_ASSOC); ?>
                <?php for ($i = 0; $i < 12; $i++) : ?>
                    <?php $exsist = false; ?>
                    <?php foreach ($data as $datum) : ?>
                        <?php if ($datum['bulan'] == ($i + 1)) : ?>
                            <tr>
                                <td class="text-center"><?= BULAN_DALAM_INDONESIA[$i]; ?></td>
                                <td class="text-center"><?= $datum['jumlah']; ?></td>
                            </tr>
                            <?php $exsist = true; ?>
                            <?php break; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if (!$exsist) : ?>
                        <tr>
                            <td class="text-center"><?= BULAN_DALAM_INDONESIA[$i]; ?></td>
                            <td class="text-center"><?= 0; ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endfor; ?>
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