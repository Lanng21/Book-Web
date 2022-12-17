<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('library.Home')
    @include('library.addBooks')
    <title>Document</title>
</head>

<body>
    {{-- navbar --}}
    @include('PublicViews.navbar')
    <div class="wrapper col-md-12 col-lg-10">
        @include('admin.alert')
        <div class=" area-box-chart">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Area Chart</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </div>
    {{-- aside --}}
    @include('PublicViews.aside')


    <script src="../../../../public/plugins/chart.js/Chart.min.js"></script>
    <script>
        $(function() {

            <?php $XValues = []; ?>;
            <?php $YValues = []; ?>;


            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
            <?php foreach ($datas as $data) {

                array_push($XValues, $data->nametype);
            }

            ?>

            <?php foreach ($quantities as $quanlity) {
                array_push($YValues, $quanlity->soluong);
            }

            ?>


            var areaChartData = {
                labels: [<?php echo '"' . implode('","', $XValues) . '"'; ?>],
                datasets: [{
                    label: 'Digital Goods',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [<?php echo '"' . implode('","', $YValues) . '"'; ?>]
                }, ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            })
        })
    </script>
</body>

</html>