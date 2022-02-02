<?php

if (isset($_GET['id_dokumen'])) {
    require_once "database/koneksi.php";

    $sql = "DELETE FROM tabel_dokumen WHERE id_dokumen=" . $_GET['id_dokumen'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Data Dokumen Berhasil Dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_dokumen';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;    
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_dokumen';" .
        "</script>";