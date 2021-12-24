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
<script src="utils.js"></script>
<script>
    $(function() {
        var  options;

        let labels = [];
        let data_tamu = [];
        const hari_ini = (new Date()).getDay();
        
        for (let i = 0; i < HARI_DALAM_INDONESIA.length; i++) {
            if (hari_ini == 7) {
                labels.unshift(HARI_DALAM_INDONESIA[i])
            } else {
                if (hari_ini - i == -1) {
                    labels.unshift(HARI_DALAM_INDONESIA[HARI_DALAM_INDONESIA.length + (hari_ini - i)])
                } else {
                    labels.unshift(HARI_DALAM_INDONESIA[hari_ini - i])
                }
            }
        }

        <?php
        require_once "koneksi.php"; 
        $sql = "SELECT 
                    count(tanggal) AS jumlah_pengunjung
                FROM 
                    tabel_buku_tamu 
                WHERE 
                    tanggal 
                BETWEEN  
                    (CURRENT_DATE() - INTERVAL 1 WEEK) 
                    AND 
                    CURRENT_DATE() 
                GROUP BY tanggal;";
        $result = $mysqli->query($sql);
        ?>

        <?php while ($row = $result->fetch_assoc()) : ?>
            data_tamu.push(parseInt('<?= $row['jumlah_pengunjung']; ?>'))
        <?php endwhile; ?>
        while(data_tamu.length != 7){
            data_tamu.unshift(0);
        }

        // visits trend charts
        data = {
            labels: labels,
            series: [{
                name: 'series-real',
                data: data_tamu,
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