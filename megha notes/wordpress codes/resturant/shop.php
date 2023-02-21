<?php
/* Template Name: Shop
*/
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

    * {
        box-sizing: border-box;
    }

    /* Style the search field */
    form.example input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
    }

    /* 
/ Style the submit button / */
    form.example button {
        float: left;
        width: 20%;
        padding: 10px;
        background: #2196F3;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        /* / Prevent double borders / */
        cursor: pointer;
    }

    form.example button:hover {
        background: #0b7dda;
    }

    .error h1 {
        padding: 150px 150px;
        text-align: center;
        font-size: 120px;
        color: blue;
        font-family: rubik;
    }

    /* / Clear floats / */
    form.example::after {
        content: "";
        clear: both;
        display: table;
    }

    input#keyword {
        width: 26%;
        padding: 10px;
    }

    select#cat {
        width: 26%;
        padding: 10px;
    }

    /* / modal css here / */
    .modal {
        position: absolute;
        z-index: 10000;
        top: 0;
        left: 0;
        visibility: hidden;
        width: 100%;
        height: 100%;
    }

    .modal.is-visible {
        visibility: visible;
    }

    .modal-overlay {
        position: fixed;
        z-index: 10;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: hsla(0, 0%, 0%, 0.5);
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s linear 0.3s, opacity 0.3s;
    }

    .modal.is-visible .modal-overlay {
        opacity: 1;
        visibility: visible;
        transition-delay: 0s;
    }

    .modal-wrapper {
        position: fixed;
        z-index: 9999;
        top: 10em;
        left: 33%;
        width: 55%;
        margin-left: -16em;
        background-color: #fff;
        box-shadow: 0 0 1.5em hsla(0, 0%, 0%, 0.35);
    }

    .modal-transition {
        transition: all 0.3s 0.12s;
        transform: translateY(-10%);
        opacity: 0;
    }

    .modal.is-visible .modal-transition {
        transform: translateY(0);
        opacity: 1;
    }

    .form_madl {
        display: flex;
    }

    .form_madl .left_1 {
        width: 50%;
    }

    .form_madl .right_1 {
        width: 50%;
    }

    label {
        font-size: 16px;
        font-weight: 500;
        color: black;
        margin-bottom: 20px;
    }

    button.btn.btn-primary {
        padding: 8px;
        width: 100%;
        background: #1ea69a;
        border: 1px;
        color: white;
        font-family: rubik;
        font-size: 16px;
        margin-top: 10px;
        margin-bottom: 30px;
    }

    img {
        height: 100%;
        max-width: 100%;
    }

    input#email {
        margin-top: 10px;
        margin-bottom: 10px;
        padding: 8px;
    }

    input#name {
        margin-top: 10px;
        padding: 8px;
    }

    input#phone {
        margin-top: 10px;
        padding: 8px;
    }

    p.contact-us {
        margin: 0px;
        text-align: center;
        color: black;
        font-family: 'Rubik';
    }
</style>

<h1>PROPERTIES</h1>


<!--- SEARCH BAR --->

<div class="search_bar">
    <form action="/" method="get" autocomplete="off" id="product_search">
        <center> <input type="text" name="s" placeholder="Search Properties..." id="keyword" class="input_search" onkeyup="fetch()">
            <select name="cat" id="cat" onchange="fetch()">
                <option value="">All Categories</option>
                <?php

                // Product category Loop

                $terms = get_terms(array(
                    'taxonomy' => 'category',
                    'hide_empty' => false,
                ));

                // Loop through all category with a foreach loop
                foreach ($terms as $term) {
                    echo '<option value="' . $term->term_id . '"> ' . $term->name . ' </option>';
                }
                ?>
            </select>
        </center>
    </form>
    <br>
    <div class="search_result" id='loaderCustom' style='display: none;'>
        <center><img src="http://127.0.0.1/wordpress/wp-content/uploads/2022/11/b4d657e7ef262b88eb5f7ac021edda87.gif" title="loading" height="80" width="100" /></center>
    </div>



</div>

<?php
$params = array('posts_per_page' => 6, 'post_type' => 'blogpost');
$wc_query = new WP_Query($params);
?>
<div class="search_result" id="datafetch">
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
<?php
get_footer();
?>