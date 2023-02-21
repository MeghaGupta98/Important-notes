<?php

register_nav_menus(
    array('primary_menu' => 'Top Menu')
);

add_theme_support('post-thumbnails');
// ajax fetch function  category filter
add_action('wp_footer', 'ajax_fetch');
function ajax_fetch()
{
?>
    <script type="text/javascript">
        function sleep(delay) {
            var start = new Date().getTime();
            while (new Date().getTime() < start + delay);
        }

        function fetch() {
            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'data_fetch',
                    keyword: jQuery('#keyword').val(),
                    pcat: jQuery('#cat').val()
                },
                beforeSend: function() {
                    jQuery("#loaderCustom").show();

                },
                success: function(data) {
                    $("#loaderCustom").hide();
                    sleep(1000);
                    jQuery('#datafetch').html(data);
                }
            });

        }
    </script>

    <?php
}
// the ajax function
add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');

function data_fetch()
{
    if ($_POST['pcat']) {
        $product_cat_id = array(esc_attr($_POST['pcat']));
    } else {
        $terms = get_terms('category');
        $product_cat_id = wp_list_pluck($terms, 'term_id');
    }
    $the_query = new WP_Query(
        array(
            'posts_per_page' => 4,
            's' => esc_attr($_POST['keyword']),
            'post_type' => array('blogpost'),

            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $product_cat_id,
                    'operator' => 'IN',
                )
            )
        )
    );
    if ($the_query->have_posts()) :
        echo '<div class="post_card_section">';
        while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="post_card">
                <span class="modal-toggle"><?php the_post_thumbnail(); ?></span>
                <div class="card-text">
                    <h4><?php the_title(); ?></h4>
                    <?php the_excerpt(); ?>
                </div>
            </div>
<?php endwhile;
        echo '</div>';
        wp_reset_postdata();

    else :
        echo '<h3>No Results Found</h3>';
    endif;

    die();
}
?>