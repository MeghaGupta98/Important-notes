<?php 
	/* Template Name: Shop page template */
	get_header();
?>

<link rel='stylesheet' id='parent-style-2-css' href='https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' type='text/css' media='all' />
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js'></script>
<style type="text/css">
  .loader {
    border: 10px solid #f3f3f3;
    border-top: 10px solid #294466;
    border-radius: 50%;
    width: 90px;
    height: 90px;
    animation: spin 2s linear infinite;
    margin: 100px auto;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

.price-range-slider {
  width: 100%;
  padding-bottom: 30px;
}
.price-range-slider .range-value {
  margin: 0;
}
.price-range-slider .range-value input {
  width: 100%;
  background: none;
  color: #000;
  font-size: 22px;
  font-weight: initial;
  box-shadow: none;
  border: none;
  margin: 20px 0 20px 0;
   font-family: 'Nunito', sans-serif;
}
.price-range-slider .range-bar {
  border: none;
  background: #000;
  height: 3px;
  width: 96%;
  margin-left: 8px;
}
.price-range-slider .range-bar .ui-slider-range {
  background: #5D5E55;
}
.price-range-slider .range-bar .ui-slider-handle {
  border: none;
  border-radius: 25px;
  background: #5D5E55;
  border: 2px solid #090a0a;
  height: 17px;
  width: 17px;
  top: -0.52em;
  cursor: pointer;
}
.price-range-slider .range-bar .ui-slider-handle + span {
  background: #5D5E55;
}

/*--- /.price-range-slider ---*/

.cvf-pagination-nav {
    width: 100%;
}
.cvf-pagination-nav .cvf-universal-pagination ul {
    display: flex;
    justify-content: center;
    width: 100%;
    gap: 20px;
}
.cvf-pagination-nav .cvf-universal-pagination li {
    padding: 18px !important;
    color: #000;
    font-family: 'Inter', sans-serif;
    border: 1px solid lightgray;
    cursor: pointer;
}
.cvf-pagination-nav {
    padding-bottom: 35px;
}
.cvf-pagination-nav .cvf-universal-pagination li.selected {
    background: #5D5E55;
	color:#fff;
}
</style>
  <div class="container-template">
	  
	  <div class="shop_tittle">
		 <p>BP'S Mobile Party Bus</p>
		
		  <h3>Our Products</h3>
		</div>
   
	  <div class="shop_section">
     
         <div class="right_side_bar">
            <div class="product_card_row" id="list-row">
               
				<?php 
				   $args = array(
	    'posts_per_page' => 10,
	    'post_type' => 'product'
	);

    $loop = new WP_Query( $args );
    $return_string = ""; 
	while ( $loop->have_posts() ) : $loop->the_post(); 
	if(has_post_thumbnail()):
        $product = wc_get_product(get_the_ID());
        $display_price = $product->get_price();
		if ($product->is_type('variable')) {
			$variations = $product->get_available_variations();
			$display_price = @$variations[0]['display_price'];
		} 
	if($product->is_on_sale())
	{
		$salebadge = '<a href="#" class="prdct_sale">Sale</a>';
	}
	else
	{
		$salebadge='';
	} 
	$priceunit= get_post_meta( $product->id, 'mwb_mbfw_booking_unit', true );
	 if($priceunit!="")
	 { 
	     $priceunithtml="/".$priceunit;
	     
	 }
	
	?>
  
   <div class="party-card">
    <div class="party-card-img">
    <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>"></a>
      <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title();?></a></h3>
    </div>
    <div class="party-card-text">
      <p> STARTS AT <span>$<?php echo $display_price; if($priceunit!="")
	 { echo "/".$priceunit; } ?>  </span></p> 
      <a href="<?php echo get_the_permalink(); ?>">BOOK NOW</a>
    </div>
  </div>
    
	<?php endif;
	 endwhile; 
	
  wp_reset_query();
				?>
            </div>
         </div>
      </div>
      </div>

<?php get_footer(); ?>
