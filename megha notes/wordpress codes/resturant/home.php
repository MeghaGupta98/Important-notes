<?php
get_header();
?>
<div class="chef_slider">
    <div class="container">
        <div class="slider_heading">
            <h3 class="h3_tittle">GET STARTED WITH EXPLORING REAL ESTATE OPTIONS</h3>
            <a href="#">VIEW ALL</a>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-interval="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active ist_slide">
                    <div class="row">
                        <?php
                        while (have_posts()) {
                            the_post();
                        ?>
                            <div class="col-md-3">
                                <div class="card_meals">
                                    <?php the_post_thumbnail(); ?>
                                    <div class="chef_content bg_cntent_1">
                                        <h3><?php the_title(); ?></h3>
                                        <span><?php the_excerpt(); ?></span>
                                        <a href="">MORE INFO <img src="<?php echo bloginfo('template_directory'); ?>/images/next_arrow.png"></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
   
</div>
<?php echo wp_pagenavi() ?>

<?php
get_footer();

?>