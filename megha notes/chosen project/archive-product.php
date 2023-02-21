<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );


?>
<link rel='stylesheet' id='parent-style-2-css' href='https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'
    type='text/css' media='all' />
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js'></script>

<style type="text/css">
.shop_section {
    display: flex;
}

.checkboxcategory label {
    left: 0px;
    position: absolute !important;
}

.checkboxcategory input {
    width: 100%;
    z-index: 99;
    cursor: pointer;
}

.checkboxcategory input:checked+label:after {
    background-color: transparent !important;
    border: none !important;
}

.checkboxcategory {
    position: relative !important;
}

.shop_section {
    width: 100%;
    max-width: 1230px;
    margin: auto;
    padding-top: 35px;
}

.checkboxcategory label::before {
    border: none !important;
}

.left_side_bar {
    width: 20%;
    padding-top: 30px;
}

.card_list_items h3 {
    font-size: 20px;
    line-height: 28px;
    font-weight: 400;
    margin: 0;
    color: #121216;
    padding: 0;
    position: relative;
    font-family: 'DM Serif Display', Georgia, "Times New Roman", serif !important;
}

.card_list_items ul {
    padding: 0px;
}

.card_list_items ul li {
    list-style: none;
    display: flex;
    align-items: center;
    padding-bottom: 20px;
}

#keyword {
    padding: 6px;
    margin: 10px;
}

.card_list_items h3 {
    font-size: 20px;
    line-height: 28px;
    font-weight: 400;
    margin: 0;
    color: black;
    padding-bottom: 27px;
    position: relative;
    font-family: 'DM Serif Display', Georgia, "Times New Roman", serif !important;
    border-bottom: 1px solid #ddd;
    margin-bottom: 23px;
    margin-top: 23px;
}

.border-bottom {
    border-bottom: 1px solid #ddd;
}

.border-top {
    border-top: 1px solid #ddd;
}

.card_list_items ul li {
    list-style-type: none;
}

#ship-to-different-address {
    position: relative;
}

.card_list_items ul input[type="checkbox"],
#ship-to-different-address input[type="checkbox"] {
    position: relative;
    /*    width: 0px;*/
    margin-right: 20px;
    opacity: 0;
    left: 5px;
    top: -2px;
}

.card_list_items ul label:before,
#ship-to-different-address label label:before {
    position: absolute;
    content: '';
    width: 20px;
    height: 20px;
    border: 1px solid;
    border-radius: 5px;
    left: -33px;
    top: -1px;
    cursor: pointer;
    z-index: -1;
}

#ship-to-different-address label label:before {
    left: 0px;
    top: 4px;
}

.card_list_items input:checked+label:after,
#ship-to-different-address input:checked+label.ship-label:after {
    position: absolute;
    content: '';
    width: 20px;
    height: 20px;
    border: 1px solid;
    border-radius: 5px;
    left: -33px;
    top: -1px;
    cursor: pointer;
    background-color: #ddbb79;
    border-color: #ddbb79;
    z-index: -1;
}

#ship-to-different-address input:checked+label.ship-label:after {
    left: 0px;
    top: 4px;
}

.card_list_items ul label {
    font-size: 20px;
    font-weight: 400;
    font-family: 'DM Serif Display', Georgia, "Times New Roman", serif !important;
    color: #000;
}

ul.category.sub_cats label {
    font-size: 16px !important;
    font-family: 'Inter', Helvetica, Arial, Lucida, sans-serif !important;
    position: relative;
    font-weight: 500;
}

.right_side_bar {
    width: 80%;
    padding-left: 35px;
}

.product_card_row {
    display: flex;
    flex-wrap: wrap;
}

.right_side_bar .product_card_row .card_prdcts {
    width: 30.7%;
    position: relative;
}

.product_card_row .card_prdcts .img_crd {
    position: relative;
    overflow: hidden;
    text-align: center;
    height: 350px;
    box-shadow: 0px 0px 10px rgb(0 0 0 / 5%);
}

.card_prdcts .img_crd img {
    height: 100%;
    width: 100%;
    object-fit: cover;
}

.product_card_row .card_prdcts .img_crd button {
    font-size: 16px;
    line-height: 34px;
    text-transform: uppercase;
    color: #000000;
    font-weight: 700;
    padding: 15px 30px;
    border-radius: 10px;
    background-color: #ddbb79;
    border-color: transparent;
    font-family: 'Inter', Helvetica, Arial, Lucida, sans-serif;
    line-height: normal !important;
    /*position: relative;*/
    bottom: 0px;
    position: absolute;
    bottom: 0px;
    left: calc(100% - 85%);
    width: 70%;
    opacity: 0;
    z-index: 2;
}

.product_card_row .card_prdcts .img_crd:hover:after {
    position: absolute;
    content: '';
    width: 100%;
    height: 100%;
    background: #ddbb7950;
    top: 0px;
    border: 0px;
    left: 0px;
    right: 0px;
    z-index: 1;
}

.product_card_row .card_prdcts .img_crd button a {
    color: #000000;
    text-decoration: none;
}

.product_card_row .card_prdcts .img_crd:hover button {
    bottom: 130px;
    transition: 0.7s;
    opacity: 1;
}

.card_prdcts .crd_text h5 {
    font-size: 20px;
    margin: 0px;
    margin-top: 15px;
    font-family: 'DM Serif Display', Georgia, "Times New Roman", serif;
    text-align: center;
    min-height: 50px;
}

.card_prdcts .crd_text p.rate_prdct {
    font-size: 17px;
    font-weight: bold;
    font-family: Nunito Bold;
    margin-top: 10px;
    color: #071458;
    text-align: center;
}

.product_card_row {
    display: flex;
    flex-wrap: wrap;
    gap: 35px;
}

.pt-3 {
    padding-top: 15px;
}

.filter_right {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-bottom: 15px;
    border-bottom: 1px solid lightgrey;
    margin-bottom: 25px;
}

.filter_right p.result-count {
    padding-top: 17px;
    color: #ddbb79;
    font-weight: bold;
    font-size: 18px;
}

.filter_right select.orderby3 {
    padding: 15px;
    color: #000;
    font-family: Nunito Bold;
    font-size: 18px;
}

.loader {
    border: 10px solid #f3f3f3;
    border-top: 10px solid #294466;
    border-radius: 50%;
    width: 90px;
    height: 90px;
    animation: spin 2s linear infinite;
    margin: 100px auto;
}

ul.category.sub_cats {
    padding-left: 15px;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
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
    background: #ddbb79;
}

.price-range-slider .range-bar .ui-slider-handle {
    border: none;
    border-radius: 25px;
    background: #ddbb79;
    border: 2px solid #090a0a;
    height: 17px;
    width: 17px;
    top: -0.52em;
    cursor: pointer;
}

.price-range-slider .range-bar .ui-slider-handle+span {
    background: #ddbb79;
}

.left_side_bar .card_list_items h4 {
    font-size: 20px;
    line-height: 28px;
    font-weight: 400;
    margin: 0;
    color: black;
    padding-bottom: 20px;
    padding-top: 15px;
    font-family: 'DM Serif Display', Georgia, "Times New Roman", serif !important;
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
    background: #ddbb79;
}

@media only screen and (max-width: 767px) {
    .cvf-pagination-nav .cvf-universal-pagination li {
        padding: 5px !important;
        color: #000;
        font-family: 'Inter', sans-serif;
        border: 1px solid lightgray;
        cursor: pointer;
        font-size: 13px;
    }

    .cvf-pagination-nav .cvf-universal-pagination ul {
        display: flex;
        justify-content: center;
        width: 100%;
        gap: 10px;
    }

}
</style>

<div class="container-template">
    <div class="shop_section">
        <div class="left_side_bar">
            <div class="card_list_items">
                <input type="text" name="search" placeholder="Search" class="input_search search_brand" style="width: 100%;border:
     1px solid #bbb; color:black;padding:15px;">
                <h3>Product Categories</h3>
                <ul>
                    <?php
                    $taxonomy = 'product_cat';
                    $orderby = 'term_order';
                    $order = 'ASC';
                    $show_count = 0; // 1 for yes, 0 for no
                    $pad_counts = 0; // 1 for yes, 0 for no
                    $hierarchical = 1; // 1 for yes, 0 for no
                    $title = '';
                    $empty = 0;

                    $args = array(
                        'taxonomy' => $taxonomy,
                        'orderby' => $orderby,
                        'order' => $order,
                        'show_count' => $show_count,
                        'pad_counts' => $pad_counts,
                        'hierarchical' => $hierarchical,
                        'title_li' => $title,
                        'hide_empty' => $empty ,
                        'parent' => 0
                    );

                    // $currentUrlCat =  basename($_SERVER['REQUEST_URI']);
                    // $categoryss_id = get_cat_ID($currentUrlCat);

                    


                    // $category = get_category( get_query_var( $currentUrlCat ) );
                    // $cat_id = $category->cat_ID;
                    // var_dump($categoryss_id, $cat_id);
                    
                    //   var_dump();
                    // $category_id_url = get_cat_ID('Dresses');
                    // var_dump($category_id_url);
                    $category = get_queried_object();

                $cid = $category->term_id;

                var_dump($cid);

                $currentUrlCat = basename($_SERVER['REQUEST_URI']);
                // var_dump($currentUrlCat);

                    $all_categories = get_categories($args);
                    // var_dump($all_categories);
                    foreach ($all_categories as $cat) {
                        $category_id = $cat->term_id;

                        $args2 = array(
                            'taxonomy' => $taxonomy,
                            'parent' => $category_id,
                            'hierarchical' => $hierarchical,
                            'orderby' => $orderby,
                            'order' => $order,
                            'hide_empty' => $empty 
                        );
                      
                        $categories_cnt = count(get_categories($args2));
                        
                      
                    
                        
                        if ($categories_cnt != 0) {
                           
                           
                            echo "<ul class='category checkboxcategory'>
                                    <li ><input type='checkbox' id='$category_id;' value=' $category_id'".($cid == $category_id ? 'checked="checked"':'')." class='category'/>
                                    <label>
                                     $cat->name
                                    </label>
                                 </ul>
                                </li>";

                            $sub_cats = get_categories($args2);
                            if ($sub_cats) {
                                echo "<ul class='category sub_cats'>";
                                foreach ($sub_cats as $sub_category) {
                                    $sub_category_id = $sub_category->term_taxonomy_id;
                                    echo "<li ><input type='checkbox' name='' id='$sub_category_id' value='$sub_category_id'".($cid == $sub_category_id ? 'checked="checked"':'')." class='category'  /><label>$sub_category->cat_name</label></li>";
                                    $args = array(
                                        'post_type' => 'product',
                                        'product_cat' => $sub_category->slug,
                                        'orderby' => $orderby,
                                        'order' => $order
                                    );
                                }
                                echo "</ul>";
                            }
                        } else {
                            echo "<ul class='category checkboxcategory'><li ><input type='checkbox' id='$category_id' value='$category_id'".($cid == $category_id ? 'checked="checked"':'')." class='category'/><label>$cat->name</label></ul></li>";
                    ?>
                    <?php wp_reset_query();
                        }
                    }
                    ?>


                </ul>
                <ul>
                    <li class="border-top pt-3">
                        <input type="checkbox" name="" class="onsale" id="sale" value="sale">
                        <label for="sale">On sale</label>
                    </li>
                    <li class="border-bottom">
                        <input type="checkbox" name="" class="stock" id="stock" value="stock">
                        <label for="stock">In stock</label>
                    </li>
                    <li>
                </ul>
            </div>
            <div class="price-range-slider">
                <p class="range-value">
                    <input type="text" id="amount" readonly>
                    <input type="hidden" id="pmin">
                    <input type="hidden" id="pmax">
                </p>
                <div id="slider-range" class="range-bar"></div>
            </div>
        </div>
        <div class="right_side_bar">
            <div class="filter_right">
                <p class="result-count"><span class="tot"></span> results</p>

                <div class="right_toggle_side">
                    <div class="toggle_mobile_left_bar" style="display: none;">
                        <img src="/wp-content/uploads/2023/01/filterr-1.png">
                    </div>
                    <div class="sort_filter">
                        <select name="orderby" class="orderby3" aria-label="Shop order">
                            <option value="" selected="selected">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="date">Sort by latest</option>
                            <option value="price-asc">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="loader"></div>
            <div class="product_card_row" id="list-row">
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
<script type="text/javascript">
jQuery(document).ready(function() {
    var page = 1;
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 2000,
        values: [0, 500],
        slide: function(event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            $("#pmin").val(ui.values[0]);
            $("#pmax").val(ui.values[1]);
        },
        stop: function(event, ui) {
            ajaxCall(page)
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));

    $("#pmin").val($("#slider-range").slider("values", 0));
    $("#pmax").val($("#slider-range").slider("values", 1));

    var data = {
        action: 'filter_data',
    };


    function ajaxCall(page) {
        var category = [];
        jQuery('#list-row').html("");
        jQuery('.loader').show();


        $(".category:checkbox:checked").each(function() {
            const val = $(this).val()
            console.log(val);
            category.push(val)
        })

        data.category = category;
        data.onsale = $('.onsale').is(':checked') ? 'yes' : 'no';
        data.stock = $('.stock').is(':checked') ? 'yes' : 'no';
        data.price_min = $("#pmin").val();
        data.price_max = $("#pmax").val();
        data.keyword = $(".search_brand").val();
        data.page = page;
        data.orderby = $(".orderby3").val();

        jQuery.ajax({
            type: "post",
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            data: data,
            success: function(response) {
                jQuery('.loader').hide();
                jQuery('#list-row').html(response);
                setTimeout(() => {
                    jQuery('.result-count .tot').text(jQuery('#cnt').val());
                }, 1000)
            }
        });
    }

    ajaxCall(page)

    $('.category, .onsale, .stock').on('click', function() {
        ajaxCall(page);
    })
    $('.orderby3').on('change', function() {
        ajaxCall(page);
    })

    $(document).on('keyup', '.search_brand', function() {
        ajaxCall(page);
    })

    jQuery(document).on('click', '.cvf-universal-pagination li.active', function() {
        page = jQuery(this).attr('p');
        ajaxCall(page);
    });

});
</script>

<script>
$(document).ready(function() {
    //         console.log("hello");
    $(".toggle_mobile_left_bar").click(function() {
        $(".left_side_bar").toggleClass("slide");
    });
});
</script>