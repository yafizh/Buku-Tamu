<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Detail Tamu Nurcholis</h3>
                    <!-- <p class="panel-subtitle">Periode: 1 Januar 14, 2016 - Oct 21, 2016</p> -->
                </div>
                <div class="panel-body">
                    <div class="row" style="margin-bottom: 16px;">
                        <div class="col-md-12">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" readonly value="Nurcholis">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 16px;">
                        <div class="col-md-12">
                            <label class="form-label">Tanggal Bertamu</label>
                            <input type="date" class="form-control" readonly value="<?= Date("Y-m-d"); ?>">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 16px;">
                        <div class="col-md-12">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" readonly value="Jalan Mentri 4">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 16px;">
                        <div class="col-md-12">
                            <label class="form-label">Nomor Handphone</label>
                            <input type="number" class="form-control" readonly value="089523123213">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 16px;">
                        <div class="col-md-12">
                            <label class="form-label">Keperluan</label>
                            <textarea class="form-control" readonly rows="3">Bertamu</textarea>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 16px;">
                        <div class="col-md-12" style="display: flex; justify-content: end;">
                            <button type="button" class="btn btn-primary"><i class="lnr lnr-printer"></i> Cetak</button>
                        </div>
                    </div>
                    <!-- END TABLE HOVER -->
                </div>
            </div>
            <!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->