<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="index.php" class="<?= isset($_GET['page']) ? (($_GET['page'] == "") ? "active" : "")  : "active" ?>"><i class="lnr lnr-home"></i> <span>Beranda</span></a></li>
                <li>
                    <a href="index.php?page=data_tamu" class="
							<?php
                            if (isset($_GET['page'])) {
                                if ($_GET['page'] == "data_tamu") echo "active";
                                else if ($_GET['page'] == "detail_tamu") echo "active";
                                else if ($_GET['page'] == "edit_tamu") echo "active";
                            }
                            ?>"><i class="lnr lnr-calendar-full"></i> <span>Data Tamu</span></a>
                </li>
                <li>
                    <a href="index.php?page=data_user" class="
							<?php
                            if (isset($_GET['page'])) {
                                if ($_GET['page'] == "data_user") echo "active";
                                else if ($_GET['page'] == "edit_user") echo "active";
                                else if ($_GET['page'] == "tambah_user") echo "active";
                            }
                            ?>"><span class="lnr lnr-users"></span> <span>Data User</span></a>
                </li>
                <li>
                    <a href="index.php?page=data_ruangan" class="
							<?php
                            if (isset($_GET['page'])) {
                                if ($_GET['page'] == "data_ruangan") echo "active";
                                else if ($_GET['page'] == "edit_ruangan") echo "active";
                                else if ($_GET['page'] == "tambah_ruangan") echo "active";
                            }
                            ?>"><span class="lnr lnr-apartment"></span> <span>Data Ruangan</span></a>
                </li>
                <li>
                    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Laporan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages" class="collapse ">
                        <ul class="nav">
                            <li><a href="laporan/laporan_tamu_hari_ini.php" target="_blank">Tamu Hari ini</a></li>
                            <li><a href="laporan/laporan_tamu_bulan_ini.php" target="_blank">Tamu Bulan ini</a></li>
                            <li><a href="laporan/laporan_tamu_tahun_ini.php" target="_blank">Tamu Tahun ini</a></li>
                            <li><a href="laporan/laporan_seluruh_tamu.php" target="_blank">Seluruh Tamu</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->