<?php

function my_theme_enqueue_styles() { 

    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function productonsale() {
   
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
  $content.= '<div class="party-card">
    <div class="party-card-img">
      <a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_id(), array('306','306')).$salebadge.'</a>
      <h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>
     </div>
      <div class="party-card-text">
      <p> STARTS AT <span>$'.$display_price."/".$priceunit.'</span></p> 
      <a href="'.get_the_permalink().'">BOOK NOW</a>
    </div>
    </div>';
	endif;
	 endwhile; 
	
$content.= '</div>';
  wp_reset_query();
    return $content;
	}

   add_shortcode('productonsale', 'productonsale');
   add_filter ('add_to_cart_redirect', 'redirect_to_checkout');

function redirect_to_checkout() {
    global $woocommerce;
    $checkout_url = $woocommerce->cart->get_checkout_url();
    return $checkout_url;
}

function mobilecartmenu()
{
    ob_start();
    echo '<a href="https://bpsmobileparty.atxclients.com/cart/" title="View your shopping cart" class="vi-wcaio-menu-cart-nav-wrap">
                    <span class="vi-wcaio-menu-cart-icon">
                        <i class="vi_wcaio_cart_icon-shopping-cart-13"></i>
                    </span>
                            <span class="vi-wcaio-menu-cart-text-wrap">
	        <span class="vi-wcaio-menu-cart-text vi-wcaio-menu-cart-text-all"> - <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>0.00</span></span>		</span>
		
                </a>';
                 $content = ob_get_clean();
    return $content;
}
  
add_shortcode('carticonshow','mobilecartmenu');

