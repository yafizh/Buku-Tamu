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
        <div id="kop" class="d-flex justify-content-center gap-5">
            <img src="../assets/img/Lambang_Kota_Banjarbaru.png" height="150" alt="">
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

        <?php
        require_once "../koneksi.php";
        $result = $mysqli->query("SELECT * FROM tabel_buku_tamu WHERE id_tamu=" . $_GET['id_tamu']);
        ?>
        <?php if ($result->num_rows) : ?>
            <?php $row = $result->fetch_assoc(); ?>
            <h2 class="text-center my-3" style="border-top: 2px solid black;">Laporan Detail Tamu <?= $row['nama']; ?></h2>
            <table>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>: <?= $row['nama']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>: <?= $row['tanggal']; ?></td>
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
                        <td>Keperluan</td>
                        <td>: <?= $row['keperluan']; ?></td>
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