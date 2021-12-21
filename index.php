<?php
include_once "header.php";
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case "buku_tamu":
            include_once "halaman_buku_tamu.php";
            break;
        case "data_tamu":
            include_once "halaman_data_tamu.php";
            break;
        case "detail_tamu":
            include_once "halaman_detail_tamu.php";
            break;
        case "edit_tamu":
            include_once "halaman_edit_tamu.php";
            break;
        case "delete_tamu":
            include_once "halaman_delete_tamu.php";
            break;
        default:
            include_once "beranda.php";
    }
} else include_once "beranda.php";
include_once "footer.php";
