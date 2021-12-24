<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Tamu Hari ini</title>
    <link href="../css/styles.css" rel="stylesheet" />
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
    </style>
</head>

<body>
    <div class="container">
        <div id="kop" class="d-flex justify-content-center gap-5">
            <img src="../kpu.png" height="100" alt="">
            <div class="text-center">
                <h2>
                    KOMISI PEMILIHAN UMUM
                    <br>
                    KABUPATEN BANJAR
                </h2>
                <p>
                    Alamat: Jalan Mentri 4
                    <br>
                    Email: kpu@gmail.com
                </p>
            </div>
        </div>

        <h2 class="text-center my-3" style="border-top: 2px solid black;">Laporan Tamu Hari ini</h2>
        <table>
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Nomor Handphone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                require_once "../koneksi.php";
                $result = $mysqli->query("SELECT * FROM tabel_buku_tamu");
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td class="text-center"><?= $row['tanggal']; ?></td>
                            <td class="text-center"><?= $row['nomor_handphone']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else : ?>
                    <h1>Data Kosong</h1>
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