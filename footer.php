<div class="clearfix"></div>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="assets/vendor/chartist/js/chartist.min.js"></script>
<script src="assets/scripts/klorofil-common.js"></script>
<script>
    $(function() {
        var  options;

        const hari = [
            "Minggu",
            "Senin",
            "Selasa",
            "Rabu",
            "Kamis",
            "Jumat",
            "Sabtu"
        ];
        const hari_ini = (new Date()).getDay();
        let labels = [];
        for (let i = 0; i < hari.length; i++) {
            if (hari_ini == 7) {
                labels.unshift(hari[i])
            } else {
                if (hari_ini - i == -1) {
                    labels.unshift(hari[hari.length + (hari_ini - i)])
                } else {
                    labels.unshift(hari[hari_ini - i])
                }
            }
        }

        <?php require_once "koneksi.php"; ?>
        <?php
        $sql = "SELECT count(tanggal) from tabel_buku_tamu WHERE tanggal BETWEEN  (CURRENT_DATE() - INTERVAL 1 WEEK) AND CURRENT_DATE() GROUP BY tanggal;";
        $result = $mysqli->query($sql);
        ?>

        let data = [];
        <?php while ($row = $result->fetch_assoc()) : ?>
            data.push(parseInt('<?= $row['count(tanggal)']; ?>'))
        <?php endwhile; ?>
        do {
            data.unshift(0);
        } while(data.length != 7);
        // visits trend charts
        data = {
            labels: labels,
            series: [{
                name: 'series-real',
                data: data,
            }]
        };

        options = {
            fullWidth: true,
            lineSmooth: false,
            height: "270px",
            low: 0,
            high: 'auto',
            axisX: {
                showGrid: false,
            },
            axisY: {
                showGrid: false,
                onlyInteger: true,
                offset: 0,
            },
            chartPadding: {
                left: 20,
                right: 50
            }
        };

        new Chartist.Line('#visits-trends-chart', data, options);
    });
</script>
</body>

</html>