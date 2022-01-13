<?php

if (isset($_GET['id_tamu'])) {
    require_once "database/koneksi.php";

    $sql = "DELETE FROM tabel_buku_tamu WHERE id_tamu=" . $_GET['id_tamu'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Data Tamu Berhasil Dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_tamu';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;    
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_tamu';" .
        "</script>";