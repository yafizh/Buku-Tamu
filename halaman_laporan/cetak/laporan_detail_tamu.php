<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Seluruh Tamu</title>
    <style>
        table {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        table tr td {
            padding: 16px;
        }

        tr td:first-child {
            width: 200px;
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
        <?php
        require_once "../../database/koneksi.php";
        $result = $mysqli->query("SELECT * FROM view_buku_tamu WHERE id_tamu=" . $_GET['id_tamu']);
        ?>
        <?php if ($result->num_rows) : ?>
            <?php $row = $result->fetch_assoc(); ?>
            <h2 class="text-center">Laporan Detail Tamu <?= $row['nama']; ?></h2>
            <table>
                <tbody>
                    <tr>
                        <td>Nomor Identitas</td>
                        <td>: <?= $row['nomor_identitas']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>: <?= $row['tanggal']; ?></td>
                    </tr>
                    <tr>
                        <td>Jam Masuk</td>
                        <td>: <?= $row['jam_masuk']; ?></td>
                    </tr>
                    <tr>
                        <td>Jam Keluar</td>
                        <td>: <?= $row['jam_keluar']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat </td>
                        <td>: <?= $row['alamat']; ?></td>
                    </tr>
                    <tr>
                        <td>Nomor Handphone</td>
                        <td>: <?= $row['nomor_handphone']; ?></td>
                    </tr>
                    <tr>
                        <td>Tujuan</td>
                        <td>: Ruang <?= ucwords(strtolower($row['nama_ruangan'])); ?></td>
                    </tr>
                    <tr>
                        <td>Keperluan</td>
                        <td>: <?= $row['keperluan']; ?></td>
                    </tr>
                    <tr>
                        <td>Kesan Kunjungan</td>
                        <td>: <?= $row['kesan_kunjungan']; ?></td>
                    </tr>
                    <?php $result->free_result(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>