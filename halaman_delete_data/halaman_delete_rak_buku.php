<?php

if (isset($_GET['id_rak_buku'])) {
    require_once "database/koneksi.php";

    $sql = "DELETE FROM tabel_rak_buku WHERE id_rak_buku=" . $_GET['id_rak_buku'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Data Rak Buku Berhasil Dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_rak_buku';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_rak_buku';" .
        "</script>";
