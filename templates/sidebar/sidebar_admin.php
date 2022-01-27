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
                <li><a href="index.php?page=data_agenda" class="
                            <?php
                            if (isset($_GET['page'])) {
                                if ($_GET['page'] == "data_agenda") echo "active";
                                else if ($_GET['page'] == "tambah_agenda") echo "active";
                                else if ($_GET['page'] == "edit_agenda") echo "active";
                            }
                            ?>"><i class="lnr lnr-book"></i> <span>Agenda</span></a></li>
                <li><a href="index.php?page=laporan" class="<?= isset($_GET['page']) ? (($_GET['page'] == "laporan") ? "active" : "")  : "" ?>"><span class="lnr lnr-file-empty"></span> <span>Laporan</span></a></li>
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->