<?php

if (isset($_GET['id_agenda'])) {
    require_once "database/koneksi.php";

    $sql = "DELETE FROM tabel_agenda WHERE id_agenda=" . $_GET['id_agenda'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Data Agenda Berhasil Dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_agenda';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_agenda';" .
        "</script>";
