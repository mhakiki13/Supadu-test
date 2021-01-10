<?php
// Get the json data from the URL
$json = file_get_contents('https://v3-static.supadu.io/dev/product/9780060577315.json');

// Decode the data
$obj = json_decode($json);

// Setup vars for the required data
$title = $obj->title; 
$author_img = $obj->contributors[0]->contributor->image;
$author_name = $obj->contributors[0]->contributor->name;
$book_cover = $obj->assets[2]->asset->path;
$book_cover_400 = str_replace("x145", "x400" ,$book_cover);
$summary = $obj->summary;
$desc = $obj->description;
$author_bio = $obj->contributors[0]->contributor->bio;
$price_usd = $obj->prices[1]->amount;
$sale_date = $obj->sale_date->date;
$sale_date_split = explode(" ", $sale_date);
$sale_date_only = $sale_date_split[0];
$retailers = $obj->retailers;
$reviews = $obj->reviews;
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <meta name="description" content="<?= $summary ?>">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!-- Main CSS file -->
  <link rel="stylesheet" href="public/css/main.min.css">
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container main-container"> <!-- Start main-container -->

        <!-- Title -->
        <section class="section title">
            <h1 class="text-center"><?= $title ?></h1>
            <hr class="title_line">
        </section>

        <!-- Description: Summary -->
        <section class="section desc text-center">
            <p class="desc_p is-lg">
                <?= $summary ?> <a href="#book-info">Read more</a>
            </p>
        </section>

        <!-- Author -->
        <section class="section author">
            <div class="author_wrap">
                <img class="author_img" src="<?= $author_img ?>" alt="Profile image for author: <?= $author_name ?>">
                <h3 class="author_name">
                    By <strong><?= $author_name ?></strong>, <?= $sale_date_only ?>
                </h3>
            </div>
        </section>

        <div class="row pt-5"> <!-- Intro Row with multiple components -->  

            <div class="col-sm-12 col-md-6">
                <!-- Book Cover -->
                <section class="section book-cover">
                    <img  class="book-cover_img" src="<?= $book_cover_400 ?>" alt="Book cover">
                </section>
            </div>

            
            <div class="col-sm-12 col-md-6">
                <!-- Price -->
                <section class="section price">
                    <p class="price_p">$<?= $price_usd ?></p>
                </section>

                <!-- Retailers -->
                <section class="section retailers">
                    <h2 class="is-red"> Buy it from: </h2>
                    <?php foreach($retailers as $retailer): ?>
                    <a target="_blank" class="retailers_link" href="<?= $retailer->path ?>"><?= $retailer->label ?></a>
                    <?php endforeach; ?>
                </seciton>
            </div>

        </div> <!-- End Intro Row -->

        
        <ul id="book-info" class="nav nav-tabs" id="myTab" role="tablist"><!-- Bootstrap tabbed nav -->
            <li class="nav-item">
                <a class="nav-link active" id="desc-tab" data-toggle="tab" href="#desc" role="tab" aria-controls="home" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="author-tab" data-toggle="tab" href="#author" role="tab" aria-controls="profile" aria-selected="false">About the author</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="contact" aria-selected="false">Reviews</a>
            </li>
        </ul>

        <div class="tab-content pt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="desc" role="tabpanel" aria-labelledby="home-tab">

                <!-- Description: Main -->
                <section class="section desc">
                    <div class="desc_p">
                        <?= $desc ?>
                    </div>
                </section>

            </div>
            <div class="tab-pane fade" id="author" role="tabpanel" aria-labelledby="profile-tab">

                <!-- Author Bio -->
                <section class="section author-bio">
                    <div class="author-bio_content">
                        <?= $author_bio ?>
                    </div>
                </section>

            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="contact-tab">

                <!-- Reviews -->
                <section class="section reviews">
                    <div class="reviews_item">
                        <blockquote class="reviews_quote blockquote">
                            <?php foreach($reviews as $review): ?>
                            <p><?= $review->review->description ?></p>
                            <div class="blockquote-footer">
                                <cite title="<?= $review->review->reviewer ?>"><?= $review->review->reviewer ?></cite>
                            </div>
                            <?php endforeach; ?>
                        </blockquote>
                    </div>
                </section>

            </div>
        </div> <!-- End bootstrap tabbed nav -->
    
    </div> <!-- End main-container -->

    <!-- Main JS -->
    <script src="public/js/main.js"></script>

</body>

</html>