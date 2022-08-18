<?php
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
include_once "templates/header.php";
include_once "utils/utils.php";
if (isset($_SESSION['id_user'])) {
    include_once "templates/navbar.php";
    if ($_SESSION['status'] == 'ADMIN') include_once "templates/sidebar/sidebar_admin.php";
    else if ($_SESSION['status'] == 'PETUGAS') include_once "templates/sidebar/sidebar_petugas.php";
    else if ($_SESSION['status'] == 'SEKOLAH') include_once "templates/sidebar/sidebar_sekolah.php";
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
            case "tambah_agenda":
                include_once "halaman_tambah_data/halaman_tambah_agenda.php";
                break;
            case "tambah_dokumen":
                include_once "halaman_tambah_data/halaman_tambah_dokumen.php";
                break;
            case "tambah_rak_buku":
                include_once "halaman_tambah_data/halaman_tambah_rak_buku.php";
                break;
            case "tambah_petugas":
                include_once "halaman_tambah_data/halaman_tambah_petugas.php";
                break;
            case "tambah_event":
                include_once "halaman_tambah_data/halaman_tambah_event.php";
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
            case "data_agenda":
                include_once "halaman_tampil_data/halaman_data_agenda.php";
                break;
            case "data_dokumen":
                include_once "halaman_tampil_data/halaman_data_dokumen.php";
                break;
            case "data_rak_buku":
                include_once "halaman_tampil_data/halaman_data_rak_buku.php";
                break;
            case "data_petugas":
                include_once "halaman_tampil_data/halaman_data_petugas.php";
                break;
            case "data_event":
                include_once "halaman_tampil_data/halaman_data_event.php";
                break;
            case "detail_tamu":
                include_once "halaman_detail/halaman_detail_tamu.php";
                break;
            case "detail_agenda":
                include_once "halaman_detail/halaman_detail_agenda.php";
                break;
            case "detail_event":
                include_once "halaman_detail/halaman_detail_event.php";
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
            case "edit_agenda":
                include_once "halaman_edit_data/halaman_edit_agenda.php";
                break;
            case "edit_dokumen":
                include_once "halaman_edit_data/halaman_edit_dokumen.php";
                break;
            case "edit_rak_buku":
                include_once "halaman_edit_data/halaman_edit_rak_buku.php";
                break;
            case "edit_petugas":
                include_once "halaman_edit_data/halaman_edit_petugas.php";
                break;
            case "edit_event":
                include_once "halaman_edit_data/halaman_edit_event.php";
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
            case "delete_agenda":
                include_once "halaman_delete_data/halaman_delete_agenda.php";
                break;
            case "delete_dokumen":
                include_once "halaman_delete_data/halaman_delete_dokumen.php";
                break;
            case "delete_rak_buku":
                include_once "halaman_delete_data/halaman_delete_rak_buku.php";
                break;
            case "delete_petugas":
                include_once "halaman_delete_data/halaman_delete_petugas.php";
                break;
            case "delete_event":
                include_once "halaman_delete_data/halaman_delete_event.php";
                break;
            case "ganti_password":
                include_once "halaman_profile/halaman_ganti_password.php";
                break;
            case "logout":
                include_once "halaman_auth/halaman_logout.php";
                break;
            case "laporan":
                include_once "halaman_laporan/halaman_laporan.php";
                break;
            default:
                if ($_SESSION['status'] == 'SEKOLAH') include_once "beranda_sekolah.php";
                else include_once "beranda.php";
        }
    } else {
        if ($_SESSION['status'] == 'SEKOLAH') include_once "beranda_sekolah.php";
        else include_once "beranda.php";
    }
} else {
    if (isset($_GET['page'])) {
        if ($_GET['page'] == 'register') include_once "halaman_auth/halaman_register.php";
        else include_once "halaman_auth/halaman_login.php";
    } else
        include_once "halaman_auth/halaman_login.php";
}
include_once "templates/footer.php";
