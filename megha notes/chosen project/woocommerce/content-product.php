<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

     $product = wc_get_product( get_the_ID() );
            $display_price = $product->get_price();
            if ( $product->is_type( 'variable' ) ) {
                $variations = $product->get_available_variations();
                $display_price = @$variations[0]['display_price'];
            }
            ?>
            <div class="card_prdcts">
              <div class="img_crd">
                <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>"></a>
                <button><a href="<?php echo $product->add_to_cart_url(); ?>">View Product</a></button>
              </div>
              <div class="crd_text">
                 <h5><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title();?></a></h5>
                 <p class="rate_prdct">$<?php echo $display_price;?></p>
              </div>
           </div>   