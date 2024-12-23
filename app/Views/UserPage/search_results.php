<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>CIO Official Website</title>
    <!-- Mobile Specific Metas -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="http://localhost:8080/assets/images/cio.png">
    <!-- CSS -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://localhost:8080/assets/plugins/bootstrap/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="http://localhost:8080/assets/plugins/fontawesome/css/all.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="http://localhost:8080/assets/plugins/animate-css/animate.css">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="http://localhost:8080/assets/plugins/slick/slick.css">
    <link rel="stylesheet" href="http://localhost:8080/assets/plugins/slick/slick-theme.css">
    <!-- Colorbox -->
    <link rel="stylesheet" href="http://localhost:8080/assets/plugins/colorbox/colorbox.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="http://localhost:8080/assets/css/style.css">
    <!-- Additional CSS -->
</head>
<style>
    .ts-service-box {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
    }

    .ts-service-box:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .ts-service-image-wrapper {
        height: 250px;
        overflow: hidden;
    }

    .ts-service-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .ts-service-content {
        padding: 20px;
    }

    .news-box-title {
        font-weight: bold;
        font-size: 20px;
        text-transform: capitalize;
        margin-bottom: 10px;
    }

    .content-container {
        max-height: 80px;
        overflow: hidden;
        margin-bottom: 10px;
    }

    .learn-more {
        color: #007bff;
    }

    .like-icons {
        display: flex;
        color: purple;
        /* Change to the desired purple color */
    }

    .like-icon {
        margin-right: 10px;
        color: violet;
        /* Change to the desired violet color */
        transition: color 0.3s ease-in-out;
    }

    .like-icon:hover {
        color: blueviolet;
        /* Change to the desired color when hovered */
    }

    .shuffle-btn-group label {
        margin-right: 15px;
        cursor: pointer;
    }

    .shuffle-btn-group label.active {
        font-weight: bold;
    }
    .entry-title a {
    color: initial; /* Set initial color for the link */
    text-decoration: none; /* Remove underline if desired */
    }

    .entry-title a:hover {
        color: purple; /* Change color on hover */
    }

    .entry-title a:visited {
        color: purple; /* Change color after the link has been clicked */
    }

    /* To specifically handle clicked links using JavaScript */
    .clicked {
        color: black; /* Change color to purple for clicked links */
    }
    .result-card {
        transition: box-shadow 0.3s ease;
    }
    .result-card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

</style>

<body>
    <?php include ('include/header.php'); ?>
    <div class="banner-carousel banner-carousel-2 mb-0">
    <?php if (!empty($latestNews)): ?>
    <?php foreach ($latestNews as $newsItem): ?>
        <?php
        // Decode the images field and handle errors
        $images = json_decode($newsItem['images'], true);

        $imageUrl = isset($images[0]) ? esc($images[0]) : 'default-image.jpg'; // Fallback if no image found

        // Validate URL to ensure correct file type
        $validExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Allowed extensions

        $fileExtension = pathinfo($imageUrl, PATHINFO_EXTENSION);

        if (!in_array(strtolower($fileExtension), $validExtensions)) {
            $imageUrl = 'default-image.jpg'; // Fallback to a default image if the extension is incorrect
        }
        ?>
        <div class="banner-carousel-item" style="background-image:url('<?= esc($imageUrl) ?>')">
            <div class="container">
                <div class="box-slider-content">
                    <div class="box-slider-text">
                        <!-- Adjusting the size of the title text -->
                        <h4 class="box-slide-title" style="font-size: 24px;"><?= esc($newsItem['title']) ?></h4>
                        
                        <!-- Adjusting the size of the description text -->
                        <p class="box-slide-description" style="font-size: 16px;">
                            <?= substr(esc($newsItem['content']), 0, 500) . '...' ?>
                        </p>
                        <!-- Adjusting the size of the author text -->
                        <h1 class="box-slide-sub-title" style="font-size: 18px;">By: <?= esc($newsItem['author']) ?></h1>
                        
                        <p>
                            <a href="<?= base_url('news_read/'. esc($newsItem['news_id'])) ?>" class="slider btn btn-primary">Read More</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>
<?php else: ?>
    <p>No news items available.</p>
<?php endif; ?>


<section id="ts-features" class="ts-features pb-4">
    <div class="container">
        <?php if (!empty($searchResults)) : ?>
            <div class="row">
                <?php foreach ($searchResults as $result) : ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="result-card p-3 h-100 border rounded">
                            <h4 class="entry-title">
                                <a href="<?= base_url('news_read/' . $result['news_id']) ?>" class="news-link text-decoration-none">
                                    <?= $result['title'] ?>
                                </a>
                            </h4>
                            <p><?= $result['content'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>No results found.</p>
        <?php endif; ?>
    </div><!-- Container end -->
</section><!-- Feature area end -->

    <?php include ('include/footer.php'); ?>
    <!-- Javascript Files
  ================================================== -->
    <!-- Javascript Files
  <!-- initialize jQuery Library -->
    <script src="<?= base_url('assets/plugins/jQuery/jquery.min.js') ?>"></script>
    <!-- Bootstrap jQuery -->
    <script src="<?= base_url('assets/plugins/bootstrap/bootstrap.min.js') ?>" defer></script>
    <!-- Slick Carousel -->
    <script src="<?= base_url('assets/plugins/slick/slick.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/slick/slick-animation.min.js') ?>"></script>
    <!-- Color box -->
    <script src="<?= base_url('assets/plugins/colorbox/jquery.colorbox.js') ?>"></script>
    <!-- shuffle -->
    <script src="<?= base_url('assets/plugins/shuffle/shuffle.min.js') ?>" defer></script>
    <!-- Google Map API Key-->
    <script src="<?= base_url('https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU') ?>"
        defer></script>
    <!-- Google Map Plugin-->
    <script src="<?= base_url('assets/plugins/google-map/map.js') ?>" defer></script>
    <!-- Template custom -->
    <script src="<?= base_url('assets/js/script.js') ?>"></script>

    <script>
        // JavaScript function to handle like and dislike actions
        function toggleLike(element, action) {
            let newsId = element.getAttribute('data-news-id');
            let likeId = element.getAttribute('data-like-id');
            let likeStatus = element.getAttribute('data-like-status');

            let likeCount = parseInt($('#like-count-' + newsId).text());
            let dislikeCount = parseInt($('#dislike-count-' + newsId).text());

            let newLikeStatus = "";
            if (action === "like") {
                likeCount++;
                if(likeStatus === "dislike"){
                    dislikeCount--;
                }
                $('#like-count-' + newsId).text(likeCount);
            } else if (action === "dislike") {
                dislikeCount++;
                if(likeStatus === "like"){
                    likeCount--;
                }
                $('#dislike-count-' + newsId).text(dislikeCount);
            }

            $.ajax({
                type: 'POST',
                url: '/like/' + newsId, // Replace with your server-side endpoint URL
                data: {
                    newsId: newsId,
                    likeCount: likeCount,
                    dislikeCount: dislikeCount,
                    likeId: likeId,
                    action: action,
                },
                
            });
        }
    </script>

    <script>
        function displayNews(newsData) {
            const newsContainer = document.getElementById('news-container');
            // Check if the target element exists
            if (newsContainer) {
                // Clear previous news articles
                newsContainer.innerHTML = '';

                // Display each news article
                newsData.forEach(article => {
                    const articleElement = document.createElement('div');
                    articleElement.classList.add('col-lg-4', 'col-md-6', 'mb-5');
                    const newsId = article.news_id;
                    const newsUrl = `/news_read/${newsId}`;
                    articleElement.innerHTML = `
                <div class="ts-service-box d-flex flex-column align-items-center" style="border: 1px solid #ddd; border-radius: 8px; overflow: hidden; transition: all 0.3s ease-in-out;">
                    <div class="ts-service-image-wrapper" style="width: 350px; height: 250px; overflow: hidden;">
                        <img loading="lazy" class="w-100 h-100" src="${article.images[0]}" alt="news-image" style="object-fit: cover; width: 100%; height: 100%;" />
                    </div>
                    <div class="d-flex flex-column align-items-start mt-3 w-100">
                        <div class="ts-news-info">
                            <a href="${newsUrl}" class="news-link" id="newsLink">
                                <h3 class="news-box-title" style="font-weight: bold; font-size: larger; text-transform: capitalize; font-size: 20px; text-align: justify;">
                                    ${article.title}
                                </h3>
                            </a>
                            <div class="content-container">
                                <p class="advisoryContent">${article.content}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <a class="learn-more" href="${newsUrl}" aria-label="news-details"><i class="fa fa-caret-right"></i> Read more</a>
                            <div class="like-icons">
                                <a class="like-icon" href="#" data-news-id="${article.news_id}" onclick="toggleLike(this)"><i class="far fa-thumbs-up" style="margin-right: 10px; color: #777; transition: color 0.3s ease-in-out;"></i></a>
                                <a class="like-icon" href="#" data-news-id="${article.news_id}" onclick="toggleLike(this)"><i class="far fa-thumbs-down" style="margin-right: 10px; color: #777; transition: color 0.3s ease-in-out;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                    newsContainer.appendChild(articleElement);
                });
            } else {
                console.error('News container element not found.');
            }
        }
    </script>

    <script>
        function formatAdvisoryDetails(content) {
            // Define the maximum width percentage or retrieve it from an appropriate source
            var maxWidthPercentage = 80; // Adjust this according to your needs

            // Calculate the maximum width based on the window width and maximum width percentage
            var maxWidth = (window.innerWidth * maxWidthPercentage) / 50;

            // Calculate the maximum length for the combined subject and content
            var maxLength = Math.floor(maxWidth / 8);

            // Check if content length exceeds the maximum length
            if (content.length > maxLength) {
                // If combined length exceeds maxLength, truncate and add ellipsis
                content = content.substring(0, maxLength - 3) + "...";
            }

            return content;
        }

        // Call the function to truncate content after page load
        window.onload = function () {
            var advisoryContents = document.getElementsByClassName("advisoryContent");
            for (var i = 0; i < advisoryContents.length; i++) {
                var content = advisoryContents[i].innerText;
                var truncatedContent = formatAdvisoryDetails(content);
            }
        };
    </script>
</body>
</html>