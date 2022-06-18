<?php

if (isset($_GET['id_petugas'])) {
    require_once "database/koneksi.php";

    $sql = "DELETE FROM tabel_petugas WHERE id_petugas=" . $_GET['id_petugas'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Data Petugas Berhasil Dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_petugas';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_petugas';" .
        "</script>";
