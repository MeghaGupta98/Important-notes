<?php
//Template Name:template
get_header();
?>
<style>
.search_bar {
    margin-top: 60px;
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
select#cat {
    padding: 5px;
    width: 300px;
    color: black;
    border-radius: 5px;
}
ul.products.columns-4 li img {
    max-width: 247px;
    min-height: 150px;
}
button{
    background: purple;
	border: none;
    color: white;
    border-radius: 23px;
    padding: 10px;
    margin-top: 10px;
    font-weight: bold;
}
.loader {
        border: 8px solid #f3f3f3; /* Light grey */
        border-top: 8px solid #000; /* Black */
        border-radius: 50%;
        width: 80px;
        height: 80px;
        margin: 10% auto;
        animation: spin 2s linear infinite;
      }

      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }

</style>

<!--TO SHOW ALL CATEGORIES-->

<div class="recipeFilter-box-wrapper">
      <div class="recipe-filter-div">
          <div class="recipe_filter-heading">
              <center><h6>Category:</h6>
              <form class="recipe-form">
                  <div class="d-flex recipe_three-column">
                      <div class="flex-column first-column">
                      <div class="form-group select-design">
                          <label>Select Type</label>
                          <select name="drink_type" id="drink_type">
                              <option value="">Select</option>
                              <?php  
                              $terms = get_terms(
                                  array(
                                      'taxonomy'   => 'product_cat',
                                      'hide_empty' => true,
                                  )
                              );                              
                              if ( ! empty( $terms ) && is_array( $terms ) ) {
                                  foreach ( $terms as $term ) { ?>
                                    <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                                  <?php
                                  }
                              } 
                              ?>
                          </select>
                          <label>Select Items</label>
                          <select name="add_in" id="add_in">
                             <option value="">Select</option>
                          </select></center>
                      </div>
                      </div>
                  </div>
              </form>
          </div>
      </div>
      <!--<div class="loader-div">
        <div class="loader"></div>
      </div>
      <div id="recipe-listing">
        
      </div>
   </div>-->

<!--to Show list of ALL PRODUCTS-->

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



   