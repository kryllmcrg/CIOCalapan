<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    
    <link rel="stylesheet" href="<?= base_url('assets2/vendors/mdi/css/materialdesignicons.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets2/vendors/css/vendor.bundle.base.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets2/css/style.css')?>">
    <link rel="shortcut icon" href="<?= base_url('assets2/images/ciologo.png')?>" />
  </head>

  <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>

  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          </div>
        </div>
      </div>
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <!-- Larger Logo -->
          <a class="navbar-brand brand-logo" href="dashboard">
          <img src="<?= base_url('assets2/images/ciologo.png')?>" alt="logo" style="width: 70px; height: auto;">
          </a>

          <!-- Smaller Logo for Mini View -->
          <a class="navbar-brand brand-logo-mini" href="dashboard">
          <img src="<?= base_url('assets2/images/ciologo.png')?>" alt="logo" style="width: 70px; height: auto;">
          </a>
      </div>
      <?php include('include/header.php'); ?>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <div class="container-fluid page-body-wrapper">
        <?php include('include/sidebar.php'); ?>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white" style="height: 200px; width: 200px;">
                    <div class="card-body">
                        <h4 class="font-weight-normal mb-3">Users <i class="mdi mdi-account mdi-36px float-right"></i></h4>
                        <h2 class="mb-5"><?php echo isset($userCount) ? $userCount : '0'; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white" style="height: 200px; width: 200px;">
                    <div class="card-body">
                        <h4 class="font-weight-normal mb-3">Staff <i class="mdi mdi-account-group mdi-36px float-right"></i></h4>
                        <h2 class="mb-5"><?php echo isset($staffCount) ? $staffCount : '0'; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white" style="height: 200px; width: 200px;">
                    <div class="card-body">
                        <h4 class="font-weight-normal mb-3">News by Admin <i class="mdi mdi-newspaper mdi-36px float-right"></i></h4>
                        <h2 class="mb-5"><?php echo isset($newsByAdmin) ? $newsByAdmin : '0'; ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white" style="height: 200px; width: 200px;">
                    <div class="card-body">
                        <h4 class="font-weight-normal mb-3">News by Staff <i class="mdi mdi-newspaper mdi-36px float-right"></i></h4>
                        <h2 class="mb-5"><?php echo isset($newsByStaff) ? $newsByStaff : '0'; ?></h2>
                    </div>
                </div>
            </div>
            </div>
            <div class="row mt-4">
            <!-- Line Chart for Sentiment Analysis -->

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">News Status</h4>
                        <canvas id="pieChartNewsStatus" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Publication Status</h4>
                        <canvas id="barChartPublicationStatus" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Number of News per Months</h4>
                        <canvas id="timeSeriesChartPublicationDate" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <!-- Line Chart for Sentiment Analysis -->
                <div class="col-md-6 offset-md-3"> <!-- Center the column -->
                    <div class="card mt-4"> <!-- Added margin-top for spacing -->
                        <div class="card-body">
                            <h4 class="card-title text-center">Sentiment Analysis</h4> <!-- Center the title -->
                            <canvas id="sentimentChart" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-4"></div>
        </div>
    </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php include('include/footer.php'); ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <script src="<?= base_url('assets2/vendors/js/vendor.bundle.base.js')?>"></script>
    <script src="<?= base_url('assets2/vendors/chart.js/Chart.min.js')?>"></script>
    <script src="<?= base_url('assets2/js/jquery.cookie.js" type="text/javascript')?>"></script>
    <script src="<?= base_url('assets2/js/off-canvas.js')?>"></script>
    <script src="<?= base_url('assets2/js/hoverable-collapse.js')?>"></script>
    <script src="<?= base_url('assets2/js/misc.js')?>"></script>
    <script src="<?= base_url('assets2/js/dashboard.js')?>"></script>
    <script src="<?= base_url('assets2/js/todolist.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-wordcloud"></script>

    <script>
    // Fetch the news status counts from the database
    const newsStatusCounts = <?php echo json_encode($newsModel->getNewsStatusCounts()); ?>;

    const newsStatusData = {
        labels: ['Approved', 'Pending', 'Rejected', 'Decline'],
        datasets: [{
            label: 'News Status',
            data: Object.values(newsStatusCounts),
            backgroundColor: [
                'rgba(75, 192, 192, 0.7)', // Approved
                'rgba(255, 206, 86, 0.7)', // Pending
                'rgba(255, 99, 132, 0.7)', // Rejected
                'rgba(54, 162, 235, 0.7)'  // Decline
            ],
            borderWidth: 1
        }]
    };

    // Get the canvas element for News Status Pie Chart
    const pieChartCanvas = document.getElementById('pieChartNewsStatus').getContext('2d');

    // Create the Pie Chart
    const pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: newsStatusData,
        options: {
            title: {
                display: true,
                text: 'News Status Distribution'
            }
        }
    });

    // Fetch the publication status counts from the database
    const publicationStatusCounts = <?php echo json_encode($publicationStatusCounts); ?>;

    const publicationStatusData = {
        labels: ['Published', 'Unpublished'],
        datasets: [{
            label: 'Publication Status',
            data: Object.values(publicationStatusCounts),
            backgroundColor: [
                'rgba(75, 192, 192, 0.7)', // Published
                'rgba(255, 99, 132, 0.7)'   // Unpublished
            ],
            borderWidth: 1
        }]
    };

    // Get the canvas element for Publication Status Bar Chart
    const barChartCanvas = document.getElementById('barChartPublicationStatus').getContext('2d');

    // Create the Bar Chart for Publication Status
    const barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: publicationStatusData,
        options: {
            title: {
                display: true,
                text: 'Publication Status'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    // Fetch the published news count by month from PHP
    const publishedNewsByMonth = <?php echo json_encode($newsModel->getPublishedNewsCountByMonth()); ?>;

    // Prepare data for the chart
    const publicationDates = publishedNewsByMonth.map(entry => entry.pub_month);
    const publicationCounts = publishedNewsByMonth.map(entry => entry.count);

    // Create the data structure for the Time Series chart
    const publicationDateData = {
        labels: publicationDates,
        datasets: [{
            label: 'Number of News per Month',
            data: publicationCounts,
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            fill: false
        }]
    };

    // Get the canvas element for the Time Series Chart
    const timeSeriesChartCanvas = document.getElementById('timeSeriesChartPublicationDate').getContext('2d');

    // Create the Time Series Chart
    const timeSeriesChart = new Chart(timeSeriesChartCanvas, {
        type: 'line',
        data: publicationDateData,
        options: {
            title: {
                display: true,
                text: 'Number of News per Month'
            },
            scales: {
                xAxes: [{
                    type: 'category', // Use 'category' to display month labels
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1 // Adjust step size based on expected max count
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Number of Articles'
                    }
                }]
            }
        }
    });
    const ratingsData = {
            labels: <?= json_encode($ratingsData['labels']) ?>,
            data: <?= json_encode($ratingsData['data']) ?>
        };

        const ctx = document.getElementById('sentimentChart').getContext('2d');
        const sentimentChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ratingsData.labels,
                datasets: [{
                    label: 'Number of Testimonials by Rating',
                    data: ratingsData.data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

</script>
  </body>
</html>