<?php
/*
Template Name:CaseStudy

*/
get_header();

$show_default_title = get_post_meta(get_the_ID(), '_et_pb_show_title', true);

$is_page_builder_used = et_pb_is_pagebuilder_used(get_the_ID());

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
<style>
.et_pb_row {
    width: 100%;
    max-width: 1300px;
    padding-left: 15px;
    padding-right: 15px;
}
</style>

<div id="about-sec-banner" class="et_pb_section et_pb_section_0 et_pb_with_background et_section_regular"
    style="background-image: url(/wp-content/uploads/2022/12/inner-banner.png);">
    <div id="about-row-banner" class="et_pb_row et_pb_row_0">
        <div class="et_pb_column et_pb_column_4_4 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough et-last-child">
            <div
                class="et_pb_module et_pb_text et_pb_text_0 banner-inner-text et_pb_text_align_left et_pb_bg_layout_light">
                <div class="et_pb_text_inner">
                    <h2>Case Studies</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="services-welcome-text" class="et_pb_section et_pb_section_1 et_section_regular">
    <div id="services-welcome-text-row" class="et_pb_row et_pb_row_1">
        <div class="et_pb_column et_pb_column_4_4 et_pb_column_1  et_pb_css_mix_blend_mode_passthrough et-last-child">
            <div
                class="et_pb_module et_pb_text et_pb_text_1 heading-paagraph-design text-center  et_pb_text_align_left et_pb_bg_layout_light">
                <div class="et_pb_text_inner">
                    <h2>Our <strong>Case Studies</strong></h2>
                    <p>In the past 12 years, The Silver Telegram team has worked across technology from startups to IPO. Our full-range communications programs go from crowdfunding to thought leadership. We incorporate traditional PR strategies and execute them with a  comprehensive tactical approach to ensure you get the most visibility.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="case-studies-blocks-page" class="et_pb_section et_pb_section_1 et_section_regular margin-bg-wrap">
    <div id="case-studies-blocks-row" class="et_pb_row et_pb_row-3">
        <div class="case-studies-list">
            <div class="case-studies-list-filter">
                <div class="filter-left-column">
                    <h4>Latest Case Studies</h4>
                </div>
                <div class="filter-right-column">
                    <select name="orderby" class="select2-design">
                        <option value="" selected="selected">Default sorting</option>
                        <option value="desc">Sort by latest</option>
                        <option value="asc">Sort by oldest</option>
                    </select>
                </div>
            </div>
            <div class="list-wrapper">
                <?php
        $data = new WP_Query(array(
          'post_type' => 'casesstudies',
        //   'posts_per_page' => 9,
        ));
        ?> 
                <?php while ($data->have_posts()) : $data->the_post(); ?>
                <div class="list-item">
                    <div class="case-studies-blocks">
                        <div class="case-studies-img">
                            <a href="<?php echo esc_url($link); ?>">
                                <?php echo get_the_post_thumbnail($post->ID); ?>
                            </a>
                        </div>
                        <div class="case-studies-cntnt">
                            <h4 class="case-studies-heading">
                                <a href="<?php echo esc_url($link); ?>" rel="bookmark">
                                    <?php echo get_the_title($post->ID); ?>
                                </a>
                            </h4>
                            <p class="case-studies-description"><?php echo get_the_excerpt(); ?></p>
                            <div class="read_more">
                                <!-- <a data-bs-toggle="modal" data-bs-target="#case-studies-preview" role="button">Read More</a> -->
                                <a href="#" type="button" data-bs-toggle="modal" data-id="<?php echo get_the_id(); ?>"
                                    class="caseStudiesButton">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
        endwhile;
        ?>
            </div>
        </div>
    </div>

</div>

 <!-- The Modal -->
<div class="modal case-studies-modal-design" id="case-studies-preview">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            <!-- Modal body -->
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<!-- modal end -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $(".select2-design").on("change", function() {
        var data = {
            action: 'filter_data',
        };
        data.orderby = $(this).val();
        jQuery.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'post',
            data: data,
            success: function(response) {
                console.log(response);
                jQuery('.list-wrapper').html(response);
                reRunJsEventListeners();

            }
        });                                                                                                                                                                                                                                                                     
    });
});
</script>
<script>
function reRunJsEventListeners()
{
    $(".case_study_button").on("click", function() {
        let id = $(this).attr('data-Id');
        $.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: {
                'action': 'case_study_details_page',
                'id': id
            },
            success: function(data) {
                $('#case-studies-preview').show()
                $('#case-studies-preview .modal-body').html(data)
            }
        });
    });
}
$(document).ready(function() {

    reRunJsEventListeners();
    $(".caseStudiesButton").on("click",function(){
    let id = $(this).attr('data-id');
    // console.log(id,"hello");
    $.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: {
                'action': 'case_study_details_page',
                'id': id
            },
            success: function(data) {
                $('#case-studies-preview').show()
                $('#case-studies-preview .modal-body').html(data)
            }
        });
    });

    $(".btn-close").on("click",function(){
        $("#case-studies-preview").hide();
    });

});
</script>

<?php

get_footer();
