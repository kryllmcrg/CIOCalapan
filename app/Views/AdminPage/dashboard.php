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
      <?php include('include\header.php'); ?>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <div class="container-fluid page-body-wrapper">
        <?php include('include\sidebar.php'); ?>

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
                        <h4 class="card-title">Sentiment Analysis</h4>
                        <canvas id="sentiment-analysis-chart" style="height: 400px;"></canvas>
                    </div>
                </div>
            </div>

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

            <div class="row mt-4"></div>
           
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Time Series of Publication Date</h4>
                        <canvas id="timeSeriesChartPublicationDate" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php include('include\footer.php'); ?>
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
        // Sample data for the charts
        var sentimentAnalysisData = {
            labels: ['Positive', 'Negative', 'Neutral'],
            datasets: [{
                label: 'Sentiment',
                data: [40, 20, 40],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        };
        // Initialize the charts
        var sentimentAnalysisChart = new Chart(document.getElementById('sentiment-analysis-chart'), {
            type: 'doughnut',
            data: sentimentAnalysisData
        });
    </script>


<script>
     const newsStatusData = {
            labels: ['Approved', 'Pending', 'Rejected'],
            datasets: [{
                label: 'News Status',
                data: [75, 15, 10], // Sample percentages of news articles in each status category
                backgroundColor: [
                    'rgba(75, 192, 192, 0.7)', // Approved
                    'rgba(255, 206, 86, 0.7)', // Pending
                    'rgba(255, 99, 132, 0.7)'  // Rejected
                ],
                borderWidth: 1
            }]
        };

        // Get the canvas element
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


        // Sample data for publication status
    const publicationStatusData = {
        labels: ['Published', 'Unpublished'],
        datasets: [{
            label: 'Publication Status',
            data: [80, 20], // Sample percentages of published and unpublished news articles
            backgroundColor: [
                'rgba(75, 192, 192, 0.7)', // Published
                'rgba(255, 99, 132, 0.7)'   // Unpublished
            ],
            borderWidth: 1
        }]
    };

    // Get the canvas element
    const barChartCanvas = document.getElementById('barChartPublicationStatus').getContext('2d');

    // Create the Bar Chart
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

    // Sample data for time series chart
    const publicationDateData = {
        labels: ['2022-01-01', '2022-01-02', '2022-01-03'], // Sample publication dates
        datasets: [{
            label: 'Number of News Articles Published',
            data: [10, 15, 8], // Sample number of news articles published on each date
            borderColor: 'rgba(75, 192, 192, 1)', // Line color
            borderWidth: 1,
            fill: false
        }]
    };

    // Get the canvas element
    const timeSeriesChartCanvas = document.getElementById('timeSeriesChartPublicationDate').getContext('2d');

    // Create the Time Series Chart
    const timeSeriesChart = new Chart(timeSeriesChartCanvas, {
        type: 'line',
        data: publicationDateData,
        options: {
            title: {
                display: true,
                text: 'Publication Date Trend'
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'day'
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    // Sample data for word cloud
const wordCloudData = {
    labels: ['Author1', 'Author2', 'Author3', 'Author4'],
    datasets: [{
        data: [10, 8, 6, 4], // Sample frequency of each author
        backgroundColor: 'rgba(75, 192, 192, 0.7)', // Color of the words
    }]
};

// Get the canvas element
const wordCloudCanvas = document.getElementById('wordCloudAuthors').getContext('2d');

// Create the Word Cloud chart
const wordCloud = new Chart(wordCloudCanvas, {
    type: 'wordcloud',
    data: wordCloudData,
    options: {
        plugins: {
            legend: false,
            title: {
                display: true,
                text: 'Word Cloud of Authors'
            }
        }
    }
});

// Sample data for stacked bar chart
const stackedBarChartData = {
    labels: ['Category1', 'Category2', 'Category3'],
    datasets: [{
        label: 'News Articles',
        data: [10, 20, 15], // Sample number of news articles in each category
        backgroundColor: 'rgba(75, 192, 192, 0.7)' // Color of the bars
    }, {
        label: 'Archived Articles',
        data: [5, 8, 10], // Sample number of archived articles in each category
        backgroundColor: 'rgba(255, 99, 132, 0.7)' // Color of the bars
    }]
};

// Get the canvas element
const stackedBarChartCanvas = document.getElementById('stackedBarChartCategories').getContext('2d');

// Create the Stacked Bar Chart
const stackedBarChart = new Chart(stackedBarChartCanvas, {
    type: 'bar',
    data: stackedBarChartData,
    options: {
        title: {
            display: true,
            text: 'Stacked Bar Chart of Categories'
        },
        scales: {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true
            }]
        }
    }
});
</script>
  </body>
</html>