<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <title>IOT VOKASI</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-0">Iot Vokasi</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="tabels_sensorjarak.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Sensor Jarak</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tabel_sensorsuhu_lembab.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Sensor</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tabel_pengguna.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Pengguna</span></a>
            </li>
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-danger d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Pengguna</span>
                                <img class="img-profile rounded-circle" src="https://cdn-icons-png.flaticon.com/512/6596/6596121.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="signout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard IOT</h1>

                    </div>

                    <div class="row">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                <b>Jarak (CM)</b>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include 'koneksi/koneksi.php';
                                                $sql = "SELECT nilai FROM tampung_data_device  ORDER BY id DESC LIMIT 1";
                                                $result = $koneksi->query($sql);
                                                $nilai = 0;
                                                if ($result->num_rows > 0) {
                                                    $row = $result->fetch_assoc();
                                                    $nilai = $row['nilai'];
                                                    echo $nilai;
                                                }
                                                $koneksi->close();
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <b>Suhu</b>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include 'koneksi/koneksi.php';
                                                $sql = "SELECT suhu FROM tabel_sensor ORDER BY id DESC LIMIT 1";
                                                $result = $koneksi->query($sql);
                                                $nilai = 0;
                                                if ($result->num_rows > 0) {
                                                    $row = $result->fetch_assoc();
                                                    $nilai = $row['suhu'];
                                                    echo $nilai;
                                                }
                                                $koneksi->close();
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><b>Kelembaban</b>
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php
                                                        include 'koneksi/koneksi.php';
                                                        $sql = "SELECT kelembaban FROM tabel_sensor ORDER BY id DESC LIMIT 1";
                                                        $result = $koneksi->query($sql);
                                                        $nilai = 0;
                                                        if ($result->num_rows > 0) {
                                                            $row = $result->fetch_assoc();
                                                            $nilai = $row['kelembaban'];
                                                            echo $nilai;
                                                        }
                                                        $koneksi->close();
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col">

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-gray-800">Grafik Jarak</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="GrafikJarak"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-gray-800">Sensor Jarak</h6>

                                </div>
                                <?php
                                include 'koneksi/koneksi.php';

                                $sql = "SELECT nilai FROM tampung_data_device 
                                ORDER BY id DESC LIMIT 1";
                                $result = $koneksi->query($sql);

                                $nilai = 0;
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $nilai = $row['nilai'];
                                }

                                $koneksi->close();
                                ?>

                                <script type="text/javascript">
                                    // Load Google Charts library
                                    google.charts.load('current', {
                                        'packages': ['gauge']
                                    });
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                        // Prepare data for the gauge chart
                                        var data = google.visualization.arrayToDataTable([
                                            ['Label', 'Value'],
                                            ['Sensor Jarak', <?php echo $nilai; ?>]
                                        ]);

                                        // Set options for the gauge chart
                                        var options = {
                                            width: 800,
                                            height: 320,
                                            redFrom: 90,
                                            redTo: 400,
                                            yellowFrom: 75,
                                            yellowTo: 90,
                                            minorTicks: 5
                                        };

                                        // Create a new gauge chart and draw it in the 'chart_div' element
                                        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));
                                        chart.draw(data, options);
                                    }
                                </script>

                                <!-- Display the gauge chart in this div -->
                                <div id="chart_div" style=" height: 18px;"></div>

                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-gray-800">Grafik Suhu</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="GrafikSuhu"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-gray-800">Sensor Suhu</h6>

                                </div>
                                <?php
                                include 'koneksi/koneksi.php';

                                $sql = "SELECT suhu FROM tabel_sensor  
                                ORDER BY id DESC LIMIT 1";
                                $result = $koneksi->query($sql);

                                $nilai = 0;
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $nilai = $row['suhu'];
                                }

                                $koneksi->close();
                                ?>

                                <script type="text/javascript">
                                    // Load Google Charts library
                                    google.charts.load('current', {
                                        'packages': ['gauge']
                                    });
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                        // Prepare data for the gauge chart
                                        var data = google.visualization.arrayToDataTable([
                                            ['Label', 'Value'],
                                            ['Sensor Suhu', <?php echo $nilai; ?>]
                                        ]);

                                        // Set options for the gauge chart
                                        var options = {
                                            width: 800,
                                            height: 320,
                                            redFrom: 90,
                                            redTo: 400,
                                            yellowFrom: 75,
                                            yellowTo: 90,
                                            minorTicks: 5
                                        };

                                        // Create a new gauge chart and draw it in the 'chart_div' element
                                        var chart = new google.visualization.Gauge(document.getElementById('chart_div1'));
                                        chart.draw(data, options);
                                    }
                                </script>

                                <!-- Display the gauge chart in this div -->
                                <div id="chart_div1" style=" height: 18px;"></div>

                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart1"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-gray-800">Grafik Kelembaban</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="GrafikKelembaban"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-gray-800">Sensor Kelembaban</h6>

                                </div>
                                <?php
                                include 'koneksi/koneksi.php';

                                $sql = "SELECT kelembaban FROM tabel_sensor
                                ORDER BY id DESC LIMIT 1";
                                $result = $koneksi->query($sql);

                                $nilai = 0;
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $nilai = $row['kelembaban'];
                                }

                                $koneksi->close();
                                ?>

                                <script type="text/javascript">
                                    // Load Google Charts library
                                    google.charts.load('current', {
                                        'packages': ['gauge']
                                    });
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                        // Prepare data for the gauge chart
                                        var data = google.visualization.arrayToDataTable([
                                            ['Label', 'Value'],
                                            ['Sensor Kelembaban', <?php echo $nilai; ?>]
                                        ]);

                                        // Set options for the gauge chart
                                        var options = {
                                            width: 800,
                                            height: 320,
                                            redFrom: 90,
                                            redTo: 400,
                                            yellowFrom: 75,
                                            yellowTo: 90,
                                            minorTicks: 5
                                        };

                                        // Create a new gauge chart and draw it in the 'chart_div' element
                                        var chart = new google.visualization.Gauge(document.getElementById('chart_div2'));
                                        chart.draw(data, options);
                                    }
                                </script>

                                <!-- Display the gauge chart in this div -->
                                <div id="chart_div2" style=" height: 18px;"></div>

                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart2"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sistem Iot Vokasi 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik logout untuk keluar dari website</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.php"></script>
    <script src="js/demo/chart-area-demo1.php"></script>
    <script src="js/demo/chart-area-demo2.php"></script>
    <script src="js/demo/chart-pie-demo.php"></script>
    <script src="js/demo/chart-pie-demo1.php"></script>
    <script src="js/demo/chart-pie-demo2.php"></script>

</body>

</html>