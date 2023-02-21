<?php
get_header();
?>

<style>
    .main_nav {
    padding: 40px;
}
.main_nav ul li {
    list-style: none;
    padding: 0px 30px;
    float: left;
    text-transform: uppercase;
    font-size: 18px; 
    color: black;
}
.logo_img {
    width: 25%;
    float: left;
}
.search_bar {
    margin-top: 100px;
}
input#keyword {
    padding: 5px;
}
select#cat {
    padding: 5px;
}
.nav_container {
    float: left;
    width: 75%;
    text-align: right;
}
ul.products.columns-4 {
    display: flex;
}
ul.products.columns-4 li {
    
    padding: 20px;
    width: 30%;
    margin-right: 40px;
    list-style: none;
    filter: drop-shadow(0 0.1rem 0.15rem rgba(0, 0, 0, 0.1));
    background: #fff;
}
  ul.products.columns-4 li img{
    max-width:350px;
    min-height: 350px;
  }  
  button {
    background: #4298c5;
    border: none;
    color: #fff;
    border-radius: 5px;
    padding: 10px;
    margin-top: 10px;
}
div#datafetch ul {
    display: flex;
    justify-content: center;
}
div#datafetch ul li{
width: 27%;
margin-right: 30px;
}
.et_pb_row.et_pb_row_0_tb_footer {
    margin-top: 50px;
    display: flex;
}
.page-template-Products #header-sec{
display: none;
}






.b-tab {
  padding: 20px;
  
  display: none;
}

.b-tab.active {
  display: block;

}

.b-nav-tab {
  display: inline-block;
  padding: 20px;
  text-transform: uppercase;
    font-size: 18px;
    color: black;
}

.b-nav-tab.active {
  color: maroon;
  text-decoration: underline;

}





</style>
<div class="main_nav">
    <div class="logo_img">
        <img src="/wp-content/uploads/2022/05/footer-logo.png">
    </div>
   <div class="nav_container">
    <ul><li>Home</li>
    <li>About</li>
<li><a href="https://hydroleash.atxclients.com/template-page/">Shop</a></li>
<li>Blog</li>
<li>Contact Us</li> 
<li><a class="et_pb_button et_pb_button_0_tb_header et_pb_bg_layout_light" href="/product/the-hydro-leash/">Pre-Order</a></li>
</ul>
</div>
</div>

  
<div class="search_bar">
    <form action="/" method="get" autocomplete="off" id="product_search">
      <center>  <input type="text" name="s" placeholder="Search Product..." id="keyword" class="input_search" onkeyup="fetch()">
        <select name="cat" id="cat" onchange="fetch()">
            <option value="">All Categories</option>
            <?php

                // Product category Loop

                $terms = get_terms( array(
                        'taxonomy'   => 'product_cat', 
                        'hide_empty' => true, 
                ));

                // Loop through all category with a foreach loop
                foreach( $terms as $term ) {
                    echo '<option value="'. $term->term_id.'"> '. $term->name .' </option>';
                }
                ?>
        </select></center>
    </form>
    <br>
    <div class="search_result" id='loader' style='display: none;'>
    <center><img src="/wp-content/uploads/2022/07/Fading-petals.gif" title="loading" height="70" width="100" /></center>
</div>
 
</div>
<a href="#orange" data-tab="orange" class="b-nav-tab active" >
  <span id="category" data-slug="filtered" onclick="fetch()">Filtered</span>
</a>
<a href="#green" data-tab="green" class="b-nav-tab">
     <span id="category1" data-slug="Detergent" onclick="fetch()">Detergent</span>
  
</a>
<a href="#blue" data-tab="blue" class="b-nav-tab">
    <span id="category2" data-slug="Hydration" onclick="fetch()">Hydration</span>
  
</a>
<div id="orange" class="b-tab ">
</div>
<div id="green" class="b-tab">
</div>
<div id="blue" class="b-tab">
</div>


<?php
$params = array('posts_per_page' => 3, 'post_type' => 'product');
$wc_query = new WP_Query($params);
?>
<div class="search_result" id="datafetch">

<div class="product1"> 
<ul class="products columns-4 ">
    <?php if ($wc_query->have_posts()) : ?>
     <?php while ($wc_query->have_posts()) :
                $wc_query->the_post(); ?>
    <li class="product type-product post-289 status-publish first instock product_cat-uncategorized has-post-thumbnail shipping-taxable purchasable product-type-simple">
               <a href="<?php the_permalink(); ?>">
               </a>
          <?php the_post_thumbnail(); ?>
          <h4><?php the_title(); ?></h4>
          <?php echo $product->get_price_html(); ?>
          <?php if($product->is_on_sale()) : ?>
<b style="color:red">
<?php _e('Sale', 'my-theme'); ?>
</b>
<?php endif; ?>
<form class="cart" action="<?php the_permalink() ?>" method="post" enctype="multipart/form-data">
     
     <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->id); ?>">
     <button type="submit"><?php echo $product->single_add_to_cart_text(); ?></button>
</form>
     </li>

     <?php endwhile; ?>
     <?php wp_reset_postdata(); ?>
     <?php else:  ?>
     <li>
          <?php _e( 'No Products' ); ?>
     </li>
     <?php endif; ?>
</ul>
</div>

    <script type="text/javascript">
        'use strict';

function Tabs() {
  var bindAll = function() {
    var menuElements = document.querySelectorAll('[data-tab]');
    for(var i = 0; i < menuElements.length ; i++) {
      menuElements[i].addEventListener('click', change, false);
    }
  }

  var clear = function() {
    var menuElements = document.querySelectorAll('[data-tab]');
    for(var i = 0; i < menuElements.length ; i++) {
      menuElements[i].classList.remove('active');
      var id = menuElements[i].getAttribute('data-tab');
      document.getElementById(id).classList.remove('active');
    }
  }

  var change = function(e) {
    clear();
    e.target.classList.add('active');
    var id = e.currentTarget.getAttribute('data-tab');
    document.getElementById(id).classList.add('active');
  }

  bindAll();
}

var connectTabs = new Tabs();

    </script>

<script>
$(document).ready(function() {
//Preloader
preloaderFadeOutTime = 500;
function hidePreloader() {
var preloader = $('.spinner-wrapper');
preloader.fadeOut(preloaderFadeOutTime);
}
hidePreloader();
});
</script>


<?php
get_footer();
?>

