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
    <link rel="icon" type="assets/image/png" href="<?= base_url('assets/images/cio.png') ?>">
    <!-- CSS -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/bootstrap.min.css') ?>">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome/css/all.min.css') ?>">
    <!-- Animation -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/animate-css/animate.css') ?>">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/slick/slick.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/slick/slick-theme.css') ?>">
    <!-- Colorbox -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/colorbox/colorbox.css') ?>">
    <!-- Template styles-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    
</head>
<style>
    .reply-form {
        display: none;
        margin-top: 10px;
    }

    .reply-form input[type="text"] {
        width: calc(100% - 110px); /* Adjust the width of the input field */
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
    }

    .submit-reply {
        display: inline-block;
        vertical-align: middle;
        cursor: pointer;
        background-color: #007bff;
        color: #fff;
        padding: 5px 10px;
        border-radius: 3px;
    }

    .submit-reply:hover {
        background-color: #0056b3; /* Darker color on hover */
    }
    .star {
    color: darkorchid; /* Set the color of the star to violet */
    }

    .star:hover {
        color: purple; /* Change color to purple on hover */
    }

    .rating .star {
    font-size: 2em; /* Adjust this value to increase/decrease the size of the stars */
    cursor: pointer; /* Optional: Change the cursor to a pointer when hovering over stars */
    }

    .rating .star:hover, 
    .rating .star:hover ~ .star {
        color: #FFD700; /* Optional: Change color of stars on hover */
    }

    .btn {
        padding: 0.2rem 0.4rem; /* Adjust padding to decrease button size */
        font-size: 0.8rem;
    }
    #news-article {
        width: 100%;
        margin: auto;
        font-family: 'Times New Roman', Times, serif;
        padding: 20px;
    }
    .header, .footer {
        text-align: center;
        margin: 20px 0;
    }
    .header h1 {
        font-size: 24px;
        margin: 0;
    }
    .header p {
        font-size: 14px;
        margin: 5px 0 0 0;
    }
    .footer p {
        font-size: 12px;
        margin: 5px 0;
    }
    .content p {
        font-size: 14px;
        text-align: justify;
        margin: 15px 0;
    }
    .content img {
        max-width: 100%;
        height: auto;
        margin: 15px 0;
    }
</style>

<body>
    <?php include ('include\header.php'); ?>

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0 order-lg-1">
                    <div class="post-content post-single" id="news-article">
                        <div class="post-media post-image">
                            <?php if (isset($article['videos'])) {
                                echo '<iframe src="' . json_decode($article['videos'])[0] . '" width="640" height="360" frameborder="0" allowfullscreen></iframe>';
                            } else {
                                echo "<img loading='lazy' class='w-100' src=" . json_decode($article['images'])[0] . " alt='news-image' />";
                            } ?>
                        </div>
                        <div class="post-body">
                            <div class="entry-header">
                                <div class="post-meta">
                                    <span class="post-author">
                                        <i class="far fa-user"></i> <?= $article['author'] ?>
                                    </span>
                                    <span class="post-cat">
                                        <i class="far fa-folder-open"></i> <?= $category_name ?>
                                    </span>
                                    <span class="post-meta-date">
                                        <i class="far fa-calendar"></i> <?= $article['publication_date'] ?>
                                    </span>
                                    <span class="post-comment">
                                        <i class="far fa-comment"></i> <?= count($comments) ?><a href="#"
                                            class="comments-link"><?= (count($comments) == 1) ? 'Comment' : 'Comments' ?></a>
                                    </span>
                                    <span class="post-pdf">
                                        <button id="download-pdf" class="btn btn-secondary">
                                            <i class="far fa-file-pdf"></i>
                                        </button>
                                    </span>
                                    <span class="post-preview">
                                        <button id="preview-news" class="btn btn-primary" onclick="previewNews(<?= $article['news_id']?? null?>)">
                                            <i class="fas fa-print"></i>
                                        </button>
                                    </span>
                                </div>
                                <h2 class="entry-title"><?= $article['title'] ?></h2>
                            </div><!-- header end -->
                            <div class="entry-content">
                                <?= $article['content'] ?>
                            </div>
                        </div><!-- post-body end -->
                    </div><!-- post content end -->

                    <!-- POST COMMENTS -->
                    <div id="comments" class="comments-area">
                        <!-- ADD COMMENTS -->
                        <div class="comments-form border-box">
                            <h3 class="title-normal">Add a comment</h3>
                            <form action="<?= base_url('addComment') ?>" method="post" role="form">
                                <input type="hidden" name="news_id" value="<?= $article['news_id'] ?>">
                                <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>">
                                <input type="hidden" name="parent_comment_id" id="parent_comment_id" value="">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">
                                                <input class="form-control" name="name" id="name" placeholder="Your Name" type="text" required>
                                            </label>
                                        </div>
                                    </div><!-- Col 4 end -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="message">
                                                <textarea class="form-control required-field" id="message" name="message" placeholder="Your Comment" rows="10" required></textarea>
                                            </label>
                                        </div>
                                    </div><!-- Col 12 end -->
                                </div><!-- Form row end -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form><!-- Form end -->
                        </div><!-- Comments form end -->

                        <?php if (!empty($comments)): ?>
                            <h3 class="comments-heading"><?= count($comments) ?> Comments</h3>
                            <ul class="comments-list">
                            <?php foreach ($comments as $comment): ?>
                                        <li>
                                            <div class="comment d-flex">
                                                <img loading="lazy" class="comment-avatar" alt="author" src="images/news/avator1.png">
                                                <div class="comment-body">
                                                    <div class="meta-data">
                                                        <span class="comment-author mr-3"><?= $comment['comment_author'] ?></span>
                                                        <span class="comment-date float-right"><?= $comment['comment_date'] ?></span>
                                                    </div>
                                                    <div class="comment-content">
                                                        <p><?= $comment['comment'] ?></p>
                                                    </div>
                                                   <!-- Reply link -->
                                                   <div class="text-left">
                                                        <input type="hidden" name="news_id" value="<?= $article['news_id'] ?>">
                                                        <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>">
                                                        <input type="hidden" name="parent_comment_id" id="parent_comment_id" value="">
                                                        <a class="comment-reply font-weight-bold" href="#" data-comment-id="<?= $comment['comment_id'] ?>">Reply</a>
                                                        <div class="reply-form" style="display: none;">
                                                            <input type="hidden" id="parent_comment_id" value="<?= $comment['comment_id'] ?>">
                                                            <input type="text" class="form-control required-field" id="message" name="message" placeholder="Your Comment" required>
                                                            <span class="submit-reply" data-comment-id="<?= $comment['comment_id'] ?>">
                                                                <i class="far fa-folder-open"></i> Submit Reply
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- Comments end -->
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                        <?php else: ?>
                            <h3 class="comments-heading">No Comments</h3>
                        <?php endif; ?>
                    </div><!-- Post comment end -->
                </div><!-- Col 8 end -->

                <!-- Sidebar Col -->
                <div class="col-lg-4 order-lg-2">
                    <div class="sidebar sidebar-right">
                        <!-- Recent Posts -->
                            <div class="widget recent-posts">
                                <h3 class="widget-title">Recent Posts</h3>
                                <ul class="list-unstyled">
                                    <?php foreach ($latestNews as $news): ?>
                                    <li class="d-flex align-items-center">
                                        <div class="posts-thumb">
                                            <a href="">
                                                <?php foreach(json_decode($news['images'], true) as $image):?>
                                                <img loading="lazy" alt="img" src="<?= $image ?>">
                                                <?php endforeach; ?>
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <h4 class="entry-title">
                                                <a href="<?= site_url('news_read/'.$news['news_id']) ?>"><?= $news['title'] ?></a>
                                            </h4>
                                        </div>
                                    </li>
                                    <?php endforeach; ?> 
                                </ul>
                            </div>
                            <!-- Recent post end -->

                            <div class="widget">
                                <h3 class="widget-title">Categories</h3>
                                <ul class="arrow nav nav-tabs">
                                    <?php foreach ($categories as $category): ?>
                                        <li><a href="#"><?php echo $category['category_name']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div><!-- Categories end -->

                        <!-- MOST LIKED -->
                        <div class="widget recent-posts">
                            <h3 class="widget-title">Most Liked Posts</h3>
                            <ul class="list-unstyled">
                                <?php foreach ($mostLikedPosts as $post): ?>
                                    <li class="d-flex align-items-center">
                                        <div class="posts-thumb">
                                            <a href="#"><?php foreach(json_decode($news['images'], true) as $image):?>
                                                <img loading="lazy" alt="img" src="<?= $image ?>">
                                                <?php endforeach; ?></a>
                                        </div>
                                        <div class="post-info">
                                            <h4 class="entry-title">
                                                <a href="<?= site_url('news_read/'.$news['news_id']) ?>"><?= esc($post['title']) ?></a>
                                            </h4>
                                        </div>
                                    </li><!-- post end -->
                                <?php endforeach; ?>
                            </ul>
                        </div><!-- MOST LIKED end -->
                        <!-- Star rating -->
                        <form id="rating-form">
                            <input type="hidden" name="news_id" value="<?= "$news_id" ?>"> <!-- Pass the news ID -->
                            <input type="hidden" name="user_id" value="<?= session()->get('user_id') ??null ?>"> <!-- Pass the user ID -->

                            <div class="form-group">
                                <div class="rating">
                                    <input type="hidden" name="rating" id="rating" value="0"> <!-- Hidden input to store the selected rating -->
                                    <i class="far fa-star star" data-rating="1"></i> <!-- Star icon for rating 1 -->
                                    <i class="far fa-star star" data-rating="2"></i> <!-- Star icon for rating 2 -->
                                    <i class="far fa-star star" data-rating="3"></i> <!-- Star icon for rating 3 -->
                                    <i class="far fa-star star" data-rating="4"></i> <!-- Star icon for rating 4 -->
                                    <i class="far fa-star star" data-rating="5"></i> <!-- Star icon for rating 5 -->
                                </div>
                                <p>Average Rating: <span id="average-rating"><?= number_format($average_rating, 1); ?></span></p>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <ul class="list-group mt-3 rounded-0 d-flex flex-row">
                                        <li class="list-group-item justify-content-between align-items-center rounded-0 bg-purple flex-grow-1" style="margin-right: 5px;">
                                            5 Star
                                            <span class="badge badge-primary badge-pill" style="background-color: #8E8FFA;"><?php echo $rating_counts[5]; ?></span>
                                        </li>
                                        <li class="list-group-item justify-content-between align-items-center rounded-0 bg-purple flex-grow-1" style="margin-right: 5px;">
                                            4 Star
                                            <span class="badge badge-primary badge-pill" style="background-color: #8E8FFA;"><?php echo $rating_counts[4]; ?></span>
                                        </li>
                                        <li class="list-group-item justify-content-between align-items-center rounded-0 bg-purple flex-grow-1" style="margin-right: 5px;">
                                            3 Star
                                            <span class="badge badge-primary badge-pill" style="background-color: #8E8FFA;"><?php echo $rating_counts[3]; ?></span>
                                        </li>
                                        <li class="list-group-item justify-content-between align-items-center rounded-0 bg-purple flex-grow-1" style="margin-right: 5px;">
                                            2 Star
                                            <span class="badge badge-primary badge-pill" style="background-color: #8E8FFA;"><?php echo $rating_counts[2]; ?></span>
                                        </li>
                                        <li class="list-group-item justify-content-between align-items-center rounded-0 bg-purple flex-grow-1" style="margin-right: 5px;">
                                            1 Star
                                            <span class="badge badge-primary badge-pill" style="background-color: #8E8FFA;"><?php echo $rating_counts[1]; ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div><!-- Sidebar end -->
                </div><!-- Sidebar Col end -->
            </div><!-- Main row end -->
        </div><!-- Container end -->
    </section><!-- Main container end -->

    <?php include ('include\footer.php'); ?>

    <!-- Javascript Files -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

        <script>
        function previewNews(newsId) {
            // Make an AJAX request to fetch the news data
            $.ajax({
            url: '/fetch_news',
            type: 'POST',
            data: { news_id: newsId },
            success: function(response) {
                if (response && !response.error) {
                    displayNews(response.html);
                } else {
                    console.error('Error fetching news:', response.error);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });
        }

        function displayNews(htmlContent) {
            // Create a new window for the print preview
            var previewWindow = window.open('', '_blank');

            // Write the HTML content to the preview window
            previewWindow.document.write(htmlContent);

            // Close the document
            previewWindow.document.close();

            // Trigger the print preview for the preview window
            previewWindow.print();
        }
    </script>

    <script>
        $(document).ready(function() {
            $(".comment-reply").click(function(e) {
                e.preventDefault();
                var commentId = $(this).data("comment-id");
                console.log("Comment ID:", commentId); // Log comment ID to check if it's correct
                // Find the closest parent comment and then find the reply form within it
                $(this).closest('.text-left').find(".reply-form").toggle(); // Toggle the visibility of the reply form for the clicked comment
            });
        });
    </script>

    <script>
    document.getElementById('download-pdf').addEventListener('click', function() {
        // Get the article ID
        var articleId = <?= json_encode($article['news_id']) ?>;

        // Fetch the PDF for the specific article
        fetch('/generate-pdf/' + articleId, {
            method: 'GET' // Use GET method as we are passing the article ID as a route parameter
        })
        .then(response => response.blob())
        .then(blob => {
            // Create a URL for the PDF blob
            const url = window.URL.createObjectURL(blob);

            // Create a temporary anchor element to trigger the download
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = 'document.pdf';
            document.body.appendChild(a);

            // Click the anchor element to start the download
            a.click();

            // Revoke the URL to free up memory
            window.URL.revokeObjectURL(url);
        })
        .catch(error => console.error('Error generating PDF:', error));
    });
    </script>
    
    <script>
        $(document).ready(function () {
            $('.star').click(function () {
                var rating = parseInt($(this).data('rating'));
                $('#rating').val(rating); // Set the hidden input value to the selected rating

                // Update star colors
                $('.star').removeClass('fas').addClass('far'); // Reset all stars to empty
                $(this).prevAll('.star').addBack().removeClass('far').addClass('fas'); // Fill clicked star and previous stars

                // Optionally, submit the form immediately after clicking a star
                $('#rating-form').submit();
            });

            // Handle form submission via AJAX
            $('#rating-form').submit(function (event) {
                event.preventDefault(); // Prevent the form from submitting the traditional way
                var formData = $(this).serialize(); // Serialize form data

                var formDataArray = $(this).serializeArray(); // Serialize form data as an array of objects

                // Find the user_id in the serialized form data
                var user_id = formDataArray.find(function (field) {
                    return field.name === 'user_id';
                });

                if (user_id.value === '') {
                    // Redirect to login page
                    window.location.href = "<?= base_url('login') ?>";
                    return; // Exit the function to prevent further processing
                }

                $.ajax({
                    url: '/submit-rating',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        if (response.average_rating) {
                            $('#average-rating').text(response.average_rating);
                        } else if (response.error) {
                            alert(response.error);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log('AJAX error:', status, error, xhr.responseText);
                    }
                });
            });
        });
    </script>

</body>

</html>