<?php
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
include_once "templates/header.php";
if (isset($_SESSION['id_user'])) {
    include_once "templates/navbar.php";
    if ($_SESSION['status'] == 'ADMIN') include_once "templates/sidebar/sidebar_admin.php";
    else include_once "templates/sidebar/sidebar_petugas.php";
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case "buku_tamu_masuk":
                include_once "halaman_buku_tamu/halaman_buku_tamu_masuk.php";
                break;
            case "buku_tamu_keluar":
                include_once "halaman_buku_tamu/halaman_buku_tamu_keluar.php";
                break;
            case "tambah_user":
                include_once "halaman_tambah_data/halaman_tambah_user.php";
                break;
            case "tambah_ruangan":
                include_once "halaman_tambah_data/halaman_tambah_ruangan.php";
                break;
            case "data_tamu":
                include_once "halaman_tampil_data/halaman_data_tamu.php";
                break;
            case "data_user":
                include_once "halaman_tampil_data/halaman_data_user.php";
                break;
            case "data_ruangan":
                include_once "halaman_tampil_data/halaman_data_ruangan.php";
                break;
            case "detail_tamu":
                include_once "halaman_detail/halaman_detail_tamu.php";
                break;
            case "edit_tamu":
                include_once "halaman_edit_data/halaman_edit_tamu.php";
                break;
            case "edit_user":
                include_once "halaman_edit_data/halaman_edit_user.php";
                break;
            case "edit_ruangan":
                include_once "halaman_edit_data/halaman_edit_ruangan.php";
                break;
            case "delete_tamu":
                include_once "halaman_delete_data/halaman_delete_tamu.php";
                break;
            case "delete_user":
                include_once "halaman_delete_data/halaman_delete_user.php";
                break;
            case "delete_ruangan":
                include_once "halaman_delete_data/halaman_delete_ruangan.php";
                break;
            case "ganti_password":
                include_once "halaman_profile/halaman_ganti_password.php";
                break;
            case "logout":
                include_once "halaman_auth/halaman_logout.php";
                break;
            default:
                include_once "beranda.php";
        }
    } else include_once "beranda.php";
} else include_once "halaman_auth/halaman_login.php";
include_once "templates/footer.php";
