<?php

if (isset($_GET['id_user'])) {
    require_once "database/koneksi.php";

    $sql = "DELETE FROM tabel_user WHERE id_user=" . $_GET['id_user'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Data User Berhasil Dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_user';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;    
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_user';" .
        "</script>";