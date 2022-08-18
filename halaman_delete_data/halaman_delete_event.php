<?php

if (isset($_GET['id_event'])) {
    require_once "database/koneksi.php";

    $sql = "DELETE FROM tabel_event WHERE id_event=" . $_GET['id_event'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Data Event Berhasil Dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_event';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_event';" .
        "</script>";
