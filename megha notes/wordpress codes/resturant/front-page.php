<?php
// echo get_template_directory_uri();
//    echo bloginfo('template_directory');
get_header();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .card_agent {
        margin-left: 87px;
    }

    h1 {
        padding-top: 48px;
        margin-left: 60px;
        margin-bottom: 60px;
    }

    h2 {
        color: black;
    }

    h3 {
        text-align: center;
        padding-top: 20px;
        font-family: rubik;
    }

    .post_card_section {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        width: 90%;
        margin: auto;
        padding-top: 50px;
    }

    h4 {
        font-family: rubik;
        font-weight: bold;
    }

    .post_card {
        width: 32%;
        margin-bottom: 30px;
        box-shadow: 0px 1px 18px 0px rgb(0 0 0 / 30%);

    }

    .post_card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .card-text {
        padding: 19px;
        text-align: center;
    }

    .card-text p {
        width: 100%;
        color: black;
    }
</style>
<!-- another section -->

<div class="chef_demand_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ">
        <h3>An Address Where Luxury</h3>
        <h4>Meets Your Every Desire!!</h4>
        <a href="http://127.0.0.1/wordpress/contact-us-2/" class="btn_chef">More Info</a>

      </div>

    </div>
    <div class="heading">
      <h1>Find Better Places to Live,<br> Work and Wonder...</h1>
    </div>

  </div>

</div>

<!-- another section -->
<div class="best_chef_section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 ">
        <span>GET STARTED WITH EXPLORING </span>
        <h3>REAL ESTATE OPTIONS<br>
        </h3>
        <!-- <a href="#" class="btn_chef">Chef Near Me</a> -->
      </div>
    </div>
  </div>
</div>
<!-- another section -->
<!-- slider -->
<div class="chef_slider">
  <div class="container">
    <div class="slider_heading">
      <h3 class="h3_tittle">GET STARTED WITH EXPLORING REAL ESTATE OPTIONS</h3>
      <a href="http://127.0.0.1/wordpress/buy/">VIEW ALL</a>
    </div>
    <?php
$params = array('posts_per_page' => 3, 'post_type' => 'blogpost');
$wc_query = new WP_Query($params);
?>
<div class="post_card_section">
        <?php if ($wc_query->have_posts()) : ?>
            <?php while ($wc_query->have_posts()) :
                $wc_query->the_post(); ?>
                <div class="post_card">
                    <span class="modal-toggle"><?php the_post_thumbnail(); ?></span>
                    <div class="card-text">
                        <h4><?php the_title(); ?></h4>
                        <?php the_excerpt(); ?>
                    </div>
                </div>

                </form>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <li>
                <?php _e('No Products'); ?>
            </li>
        <?php endif; ?>
    </div>
  </div>
</div>
<!-- another section -->
<div class="chef_discover_section">
  <div class="container">
    <h3 class="h3_tittle">Find, Buy & Own Your Dream Home</h3>
    <div class="row">
      <div class="col-md-6">
        <div class="card_discover Services">
          <h4>Rental Homes for Everyone </h4>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card_discover chif_find">
          <h4>
            Rental Homes for Everyone
          </h4>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- another section -->
<div class="questions_about">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>Questions about<br> any property?</h3>
        <a href="http://127.0.0.1/wordpress/contact-us-2/" class="btn btn-info">Contact Us</a>
      </div>
    </div>
  </div>
</div>
<!-- another section -->
<div class="qa_section">
  <div class="container">
    <div class="qa_div">
      <h4>Discover what Best Local Chef is about</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>

    <div class="qa_div">
      <h4>Here’s what makes a chef experience perfect for you</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
  </div>
</div>

<?php
get_footer();

?>