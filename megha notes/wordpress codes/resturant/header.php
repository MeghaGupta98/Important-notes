<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet" type="text/css">
    <?php wp_head();?>
    <title></title>
</head>

<body>
    <!-- chef header -->
    <nav class="navbar navbar-expand-lg  chef_header">
        <div class="container-fluid">
         <a class="navbar-brand" href="#"><img class="img-banner" src="<?php echo bloginfo('template_directory'); ?>/images/3v-builders-logo-1.png"></a> 
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> 
            <div class="collapse navbar-collapse" id="navbarNavDropdown">

                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'primary_menu', 'menu-class' => 'nav'
                    )
                ) ?>
                <a href="http://127.0.0.1/wordpress/contact-us-2/" class="btn btn-warning">MORE INFO</a>
            </div>
        </div>
    </nav>


    <!-- chef header end here -->

    <!-- another section -->
    <!-- <div class="location_date_section">
        <div class="container d-flex justify-content-center">
            <div class="form fields_form">
                <div class="location">
                    <label for="">Location</label>
                    <input type="text" placeholder="What’s your zip code?">
                </div>
                <div class="Search">
                    <label for="">Preference</label>
                    <input type="search" placeholder="Property type">
                </div>
                <div>
                    <button><img src="<?php echo bloginfo('template_directory'); ?>/images/search.png"></button>
                </div>
            </div>
        </div>
    </div> -->