<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="index.php" class="<?= isset($_GET['page']) ? (($_GET['page'] == "") ? "active" : "")  : "active" ?>"><i class="lnr lnr-home"></i> <span>Beranda</span></a></li>
                <li><a href="index.php?page=data_agenda" class="
                            <?php
                            if (isset($_GET['page'])) {
                                if ($_GET['page'] == "data_agenda") echo "active";
                            }
                            ?>"><i class="lnr lnr-book"></i> <span>Data Pengajuan</span></a></li>
                <li><a href="index.php?page=tambah_agenda" class="
                            <?php
                            if (isset($_GET['page'])) {
                                if ($_GET['page'] == "tambah_agenda") echo "active";
                                else if ($_GET['page'] == "edit_agenda") echo "active";
                            }
                            ?>"><i class="lnr lnr-book"></i> <span>Pengajuan Kunjungan</span></a></li>
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->