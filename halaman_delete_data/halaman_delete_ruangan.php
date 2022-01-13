<?php

if (isset($_GET['id_ruangan'])) {
    require_once "database/koneksi.php";

    $sql = "DELETE FROM tabel_ruangan WHERE id_ruangan=" . $_GET['id_ruangan'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Data Ruangan Berhasil Dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_ruangan';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_ruangan';" .
        "</script>";
