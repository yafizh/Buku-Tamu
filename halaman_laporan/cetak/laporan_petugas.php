<?php
require_once "../../database/koneksi.php";
require_once "../../utils/utils.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Petugas</title>
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
        <h2 class="text-center">Laporan Petugas</h2>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama Petugas</th>
                    <th>Tugas</th>
                    <th>Bulan</th>
                </tr>
            </thead>
            <tbody>
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