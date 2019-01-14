<?php 

    $koneksi = mysqli_connect('localhost', 'root', 'furwadijaya97', 'grafik_penjualan');
    $bulan = mysqli_query($koneksi, "SELECT bulan FROM penjualan WHERE tahun = '2016' ORDER BY id ASC");

    $penghasilan = mysqli_query($koneksi, "SELECT hasil_penjualan FROM penjualan WHERE tahun = '2016' ORDER BY id ASC");

 ?>


<html>
    <head>
        <title>Belajarchart - ChartJS</title>
        <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>

        <script src="Chart.js"></script>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while($b = mysqli_fetch_array($bulan)) { echo '"'.$b['bulan'].'",'; } ?>],
                    datasets: [{
                            label: '# of Votes',
                            data: [<?php while($b = mysqli_fetch_array($penghasilan)) { echo '"'.$b['hasil_penjualan'].'",'; } ?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
    </body>
</html>