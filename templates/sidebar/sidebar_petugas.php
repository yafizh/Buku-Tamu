<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="index.php" class="<?= isset($_GET['page']) ? (($_GET['page'] == "") ? "active" : "")  : "active" ?>"><i class="lnr lnr-home"></i> <span>Beranda</span></a></li>
                <li><a href="index.php?page=buku_tamu_masuk" class="<?= isset($_GET['page']) ? (($_GET['page'] == "buku_tamu_masuk") ? "active" : "")  : "" ?>"><i class="lnr lnr-book"></i> <span>Buku Tamu Masuk</span></a></li>
                <li><a href="index.php?page=buku_tamu_keluar" class="<?= isset($_GET['page']) ? (($_GET['page'] == "buku_tamu_keluar") ? "active" : "")  : "" ?>"><i class="lnr lnr-book"></i> <span>Buku Tamu Keluar</span></a></li>
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
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->