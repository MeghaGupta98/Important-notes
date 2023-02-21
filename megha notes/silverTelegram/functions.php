<?php
   function my_theme_enqueue_styles()
   {
   
     wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
   }
   
   add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
   
   function tn_custom_excerpt_length($length)
   {
     return 20;
   }
   add_filter('excerpt_length', 'tn_custom_excerpt_length', 999);
   
   add_action('wp_footer', 'myscript_in_footer');
   function myscript_in_footer()
   {
   ?>
<script src="/wp-includes/js/jquery/jquery.min.js?ver=3.6.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" type="text/javascript"
    charset="utf-8"></script>
<script type="text/javascript">
jQuery(".case-studies-slider").slick({
    dots: true,
    arrows: true,
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: false,
    responsive: [{
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            },
        },
    ],
});

jQuery(".side-design-slider").slick({
    dots: false,
    arrows: true,
    infinite: false,
    slidesToShow: 2,
    slidesToScroll: 1,
    centerMode: false,
    responsive: [{
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
    ],
});
jQuery(".review-design-slider").slick({
    dots: true,
    arrows: true,
    infinite: false,
    slidesToShow: 2,
    slidesToScroll: 1,
    centerMode: false,
    responsive: [{
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
    ],
});

jQuery(".work-studies-slider").slick({
    dots: true,
    arrows: true,
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: false,
    responsive: [{
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            },
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            },
        },
    ],
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<script>
var items = $(".list-wrapper .list-item");
var numItems = items.length;
var perPage = 9;

items.slice(perPage).success: (response) => {
    swal("Thank You!", "You will now get a Mail.!", "success");
    setTimeout(function() {
        window.location =
            "http://ronjinij.sg-host.com/services/startup-services-2/";
    }, 2000);
}
itemsOnPage: perPage,
    prevText: "&laquo;",
    nextText: "&raquo;",
    onPageClick: function(pageNumber) {
        var showFrom = perPage * (pageNumber - 1);
        var showTo = showFrom + perPage;
        items.hide().slice(showFrom, showTo).show();
    }
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.select2-design').select2();
});
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>


</script>


<script>
$(document).ready(function() {
    $('.caseStudiesModel').on('click', function() {
        let id = $(this).attr('data-id');
        // console.log(id);
        $.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: {
                'action': 'case_study_detail',
                'id': id
            },
            success: function(data) {
                $('#case-studies-preview').show()
                $('#case-studies-preview .modal-body').html(data)
            }
        });
    });
    $(".btn-close").on("click", function() {
        $("#case-studies-preview").hide();
    });
});
</script>
<script>
$(document).ready(function() {
    $('.read-more-link').on('click', function() {
        let id = $(this).attr('data-id');
        $.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: {
                'action': 'work_study_detail',
                'id': id,
            },
            success: function(data) {
                $('#work-studies-preview').show()
                $('#work-studies-preview .modal-dialog').html(data)
            }
        });
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script>
$(document).ready(function() {
    $("#download").on("click", function() {
        var data = {
            action: 'Donwload_worksheet',
            name: $("#name").val(),
            email: $("#email").val(),
            file: $("#file").val(),
        };
        // console.log(data);
        if (data.name == "") {
            $('#name').addClass('error');
            $('#nameError').text('Name field is required *');
        } else if (data.email == "") {
            $('#email').addClass('error');
            $('#emailError').text('Email field is required *');
            $('#nameError').text('');

        } else {

            $.ajax({
                type: "POST",
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: data,
                success: function(data) {
                    swal("Thank You!", "You will now get a Mail.!", "success");
                    setTimeout(function() {
                        window.location =
                            "http://ronjinij.sg-host.com/services/startup-services-2/";
                    }, 2000);
                }

            });
            $('#emailError').text('');
        }
    });
});
</script>



<?php
   }
   
   function CaseStudiesListing($attr)
   {
     ob_start();
   ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
<div class="center slider case-studies-slider">
    <?php
          $attr = shortcode_atts( array(
       
              'cat' => ''
          ), $attr );


       $args = array(  
          'post_type' => 'casesstudies',
          'post_status' => 'publish',
          'posts_per_page' => 8, 
          'orderby' => 'date', 
          'order' => 'ASC',
      
      );
      if($attr['cat']!='')
      {
      $args['tax_query'] = array(
          array (
              'taxonomy' => 'casestudies_categories',
              'field' => 'slug',
              'terms' => $attr['cat'],
          )
      );
      }
      $loop = new WP_Query($args);
      
      ?>
    <?php if ($loop->have_posts()) : ?>
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
    <div class="slider-inner">
        <div class="case-studies-blocks">
            <div class="case-studies-img">
                <?php echo get_the_post_thumbnail(); ?>
            </div>
            <div class="case-studies-cntnt">
                <h4 class="case-studies-heading"><?php the_title(); ?></h4>
                <p class="case-studies-description"><?php the_excerpt(); ?></p>
                <div class="read_more">
                    <a href="#" type="button" data-bs-toggle="modal" data-id="<?php echo get_the_id(); ?>"
                        class="caseStudiesModel">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    endwhile;
    ?>
    <?php
    else : ?>
    <div class="our-work case-list-work my-3 my-md-4">

        <div class="col-md-12">
            <h2>No Case Studies were found</h2>
        </div>

    </div>
    <?php endif;
    ?>
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

<?php
   $content = ob_get_clean();
   return $content;
   }
   add_shortcode('CaseStudies', 'CaseStudiesListing');  

   
   function OurBlogsListing()
   {
   ob_start();
   ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
<div class="center slider side-design-slider">
    <?php
      $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'orderby' => 'title',
        'order' => 'ASC',
      );
      $loop = new WP_Query($args);
      
      ?>
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
    <div class="slider-inner">
        <div class="blogs-blocks">
            <div class="blogs-img">
                <?php echo get_the_post_thumbnail(); ?>
            </div>
            <div class="blogs-cntnt">
                <h4 class="blogs-heading"><?php the_title(); ?></h4>
                <p class="blogs-description"><?php the_excerpt(20); ?></p>
                <div class="read_more">
                    <a href="<?php echo get_the_permalink(); ?>" class="read-more-link">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile;
      wp_reset_postdata();    ?>
</div>

<?php
   $content = ob_get_clean();
   return $content;
   }
   add_shortcode('OurBlogs', 'OurBlogsListing');


   
   
   function ReviewListing()
   {
   ob_start();
   ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
<div class="center slider review-design-slider">
    <div class="slider-inner">
        <div class="review-blocks">
            <div class="review-hdr">
                <div class="review-img">
                    <img src="/wp-content/uploads/2022/12/client-1.png">
                </div>
                <div class="review-cntnt">
                    <h4 class="review-heading">Loream Isphum</h4>
                    <h6>Verified User</h6>
                    <img src="/wp-content/uploads/2022/12/five-star.svg">
                </div>
            </div>
            <div class="review-main-cntnt">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply
                    dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the
                    printing and typesetting industry.
                </p>
            </div>
        </div>
    </div>
    <div class="slider-inner">
        <div class="review-blocks">
            <div class="review-hdr">
                <div class="review-img">
                    <img src="/wp-content/uploads/2022/12/client-2.png">
                </div>
                <div class="review-cntnt">
                    <h4 class="review-heading">Loream Isphum</h4>
                    <h6>Verified User</h6>
                    <img src="/wp-content/uploads/2022/12/five-star.svg">
                </div>
            </div>
            <div class="review-main-cntnt">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply
                    dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the
                    printing and typesetting industry.
                </p>
            </div>
        </div>
    </div>
    <div class="slider-inner">
        <div class="review-blocks">
            <div class="review-hdr">
                <div class="review-img">
                    <img src="/wp-content/uploads/2022/12/client-1.png">
                </div>
                <div class="review-cntnt">
                    <h4 class="review-heading">Loream Isphum</h4>
                    <h6>Verified User</h6>
                    <img src="/wp-content/uploads/2022/12/five-star.svg">
                </div>
            </div>
            <div class="review-main-cntnt">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply
                    dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the
                    printing and typesetting industry.
                </p>
            </div>
        </div>
    </div>
    <div class="slider-inner">
        <div class="review-blocks">
            <div class="review-hdr">
                <div class="review-img">
                    <img src="/wp-content/uploads/2022/12/client-2.png">
                </div>
                <div class="review-cntnt">
                    <h4 class="review-heading">Loream Isphum</h4>
                    <h6>Verified User</h6>
                    <img src="/wp-content/uploads/2022/12/five-star.svg">
                </div>
            </div>
            <div class="review-main-cntnt">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply
                    dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the
                    printing and typesetting industry.
                </p>
            </div>
        </div>
    </div>
</div>
<?php
   $content = ob_get_clean();
   return $content;
   }
   add_shortcode('Review', 'ReviewListing');
   

   // Worksheets
   function WorkStudiesListing()
   {
   ob_start();
   ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
<div class="center slider work-studies-slider">
    <?php
      $args = array(
        'post_type' => 'worksheets',
        'post_status' => 'publish',
        'posts_per_page' => 26,
        'orderby' => 'title',
        'order' => 'ASC',
      );
      $loop = new WP_Query($args);
      
      ?>
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
    <div class="slider-inner">
        <div class="blogs-blocks">
            <div class="blogs-img">
                <?php echo get_the_post_thumbnail(); ?>
            </div>
            <div class="blogs-cntnt">
                <h4 class="blogs-heading"><?php the_title(); ?></h4>
                <p class="blogs-description"><?php the_excerpt(); ?></p>
                <div class="read_more">
                    <a href="#" type="button" data-bs-toggle="modal" data-id="<?php echo get_the_id(); ?>"
                        class="read-more-link">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile;
      wp_reset_postdata();    ?>
</div>
<div class="modal worksheets-modal-design" id="work-studies-preview">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            <!-- Modal body -->
        </div>
    </div>
</div>
<?php
   $content = ob_get_clean();
   return $content;
   }
   add_shortcode('WorkStudies', 'WorkStudiesListing');
   
   
   // End Worksheets
   
   function CaseStudiesListingPage()
   {
   ob_start();
   ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
<div class="case-studies-list">
    <div class="case-studies-list-filter">
        <div class="filter-left-column">
            <h4>Latest Case Studies</h4>
        </div>
        <div class="filter-right-column">
            <select class="select2-design">
                <option>Sort By</option>
                <option>New</option>
                <option>Old</option>
            </select>
        </div>
    </div>
    <div class="list-wrapper">
        <div class="list-item">
            <div class="case-studies-blocks">
                <div class="case-studies-img">
                    <img src="/wp-content/uploads/2022/12/user-icon-1.png">
                </div>
                <div class="case-studies-cntnt">
                    <h4 class="case-studies-heading">Loream Isphum</h4>
                    <p class="case-studies-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</p>
                    <div class="read_more">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#case-studies-preview"
                            class="read-more-link">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-item">
            <div class="case-studies-blocks">
                <div class="case-studies-img">
                    <img src="/wp-content/uploads/2022/12/user-icon-2.png">
                </div>
                <div class="case-studies-cntnt">
                    <h4 class="case-studies-heading">Loream Isphum</h4>
                    <p class="case-studies-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</p>
                    <div class="read_more">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#case-studies-preview"
                            class="read-more-link">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-item">
            <div class="case-studies-blocks">
                <div class="case-studies-img">
                    <img src="/wp-content/uploads/2022/12/user-icon-3.png">
                </div>
                <div class="case-studies-cntnt">
                    <h4 class="case-studies-heading">Loream Isphum</h4>
                    <p class="case-studies-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</p>
                    <div class="read_more">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#case-studies-preview"
                            class="read-more-link">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-item">
            <div class="case-studies-blocks">
                <div class="case-studies-img">
                    <img src="/wp-content/uploads/2022/12/user-icon-3.png">
                </div>
                <div class="case-studies-cntnt">
                    <h4 class="case-studies-heading">Loream Isphum</h4>
                    <p class="case-studies-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</p>
                    <div class="read_more">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#case-studies-preview"
                            class="read-more-link">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-item">
            <div class="case-studies-blocks">
                <div class="case-studies-img">
                    <img src="/wp-content/uploads/2022/12/user-icon-1.png">
                </div>
                <div class="case-studies-cntnt">
                    <h4 class="case-studies-heading">Loream Isphum</h4>
                    <p class="case-studies-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</p>
                    <div class="read_more">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#case-studies-preview"
                            class="read-more-link">Read More</a>
                    </div>
                </div>downloadButton
            </div>
        </div>
        <div class="list-item">
            <div class="case-studies-blocks">
                <div class="case-studies-img">
                    <img src="/wp-content/uploads/2022/12/user-icon-2.png">
                </div>
                <div class="case-studies-cntnt">
                    <h4 class="case-studies-heading">Loream Isphum</h4>
                    <p class="case-studies-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</p>
                    <div class="read_more">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#case-studies-preview"
                            class="read-more-link">Read More</a>
                    </div>
                </div>downloadButton
            </div>
        </div>
        <div class="list-item">
            <div class="case-studies-blocks">
                <div class="case-studies-img">
                    <img src="/wp-content/uploads/2022/12/user-icon-3.png">
                </div>
                <div class="case-studies-cntnt">
                    <h4 class="case-studies-heading">Loream Isphum</h4>
                    <p class="case-studies-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</p>
                    <div class="read_more">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#case-studies-preview"
                            class="read-more-link">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-item">
            <div class="case-studies-blocks">
                <div class="case-studies-img">
                    <img src="/wp-content/uploads/2022/12/user-icon-3.png">
                </div>
                <div class="case-studies-cntnt">
                    <div class="modal-body">
                        <input type="text" name="" class="" id="" placeholder="Name">
                        <input type="email" name="" class="" id="" placeholder="Email">
                        <input type="hidden" name="" id="">
                        <input type="submit" value="submit">
                    </div>
                    <h4 class="case-studies-heading">Loream Isphum</h4>
                    <p class="case-studies-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</p>
                    <div class="read_more">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#case-studies-preview"
                            class="read-more-link">Read More</a>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <input type="text" name="" class="" id="" placeholder="Name">
                <input type="email" name="" class="" id="" placeholder="Email">
                <input type="hidden" name="" id="">
                <input type="submit" value="submit">
            </div>
        </div>
        <div class="list-item">
            <div class="case-studies-blocks">
                <div class="case-studies-img">
                    <img src="/wp-content/uploads/2022/12/user-icon-1.png">
                </div>
                <div class="case-studies-cntnt">
                    <h4 class="case-studies-heading">Loream Isphum</h4>
                    <p class="case-studies-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</p>
                    <div class="read_more">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#case-studies-preview"
                            class="read-more-link">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-item">
            <div class="case-studies-blocks">
                <div class="case-studies-img">
                    <img src="/wp-content/uploads/2022/12/user-icon-2.png">
                </div>
                <div class="case-studies-cntnt">
                    <h4 class="case-studies-heading">Loream Isphum</h4>
                    <p class="case-studies-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</p>
                    <div class="read_more">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#case-studies-preview"
                            class="read-more-link">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-item">
            <div class="case-studies-blocks">
                <div class="case-studies-img">
                    <img src="/wp-content/uploads/2022/12/user-icon-3.png">
                </div>
                <div class="case-studies-cntnt">
                    <h4 class="case-studies-heading">Loream Isphum</h4>
                    <p class="case-studies-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</p>
                    <div class="read_more">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#case-studies-preview"
                            class="read-more-link">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-item">
            <div class="case-studies-blocks">
                <div class="case-studies-img">
                    <img src="/wp-content/uploads/2022/12/user-icon-3.png">
                </div>
                <div class="case-studies-cntnt">
                    <h4 class="case-studies-heading">Loream Isphum</h4>
                    <p class="case-studies-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</p>
                    <div class="read_more">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#case-studies-preview"
                            class="read-more-link">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-item">
            <div class="case-studies-blocks">
                <div class="case-studies-img">
                    <img src="/wp-content/uploads/2022/12/user-icon-1.png">
                </div>
                <div class="case-studies-cntnt">
                    <h4 class="case-studies-heading">Loream Isphum</h4>
                    <p class="case-studies-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</p>
                    <div class="read_more">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#case-studies-preview"
                            class="read-more-link">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-item">
            <div class="case-studies-blocks">
                <div class="case-studies-img">
                    <img src="/wp-content/uploads/2022/12/user-icon-2.png">
                </div>
                <div class="case-studies-cntnt">
                    <h4 class="case-studies-heading">Loream Isphum</h4>
                    <p class="case-studies-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</p>
                    <div class="read_more">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#case-studies-preview"
                            class="read-more-link">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-item">
            <div class="case-studies-blocks">
                <div class="case-studies-img">
                    <img src="/wp-content/uploads/2022/12/user-icon-3.png">
                </div>
                <div class="case-studies-cntnt">
                    <h4 class="case-studies-heading">Loream Isphum</h4>
                    <p class="case-studies-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</p>
                    <div class="read_more">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#case-studies-preview"
                            class="read-more-link">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-item">
            <div class="case-studies-blocks">
                <div class="case-studies-img">
                    <img src="/wp-content/uploads/2022/12/user-icon-3.png">
                </div>
                <div class="case-studies-cntnt">
                    <h4 class="case-studies-heading">Loream Isphum</h4>
                    <p class="case-studies-description">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</p>
                    <div class="read_more">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#case-studies-preview"
                            class="read-more-link">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="pagination-container"></div>
</div>
<!-- The Modal -->
<div class="modal case-studies-modal-design" id="case-studies-preview">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="case-studies-blocks">
                    <div class="case-studies-img">
                        <img src="/wp-content/uploads/2022/12/user-icon-3.png">
                    </div>
                    <div class="case-studies-cntnt">
                        <h4 class="case-studies-heading">Loream Isphum</h4>
                        <p class="case-studies-description">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem
                            Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply
                            dummy text of the printing and typesetting industry.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is
                            simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text
                            of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing
                            and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem
                            Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply
                            dummy text of the printing and typesetting industry.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is
                            simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text
                            of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing
                            and typesetting industry.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
   $content = ob_get_clean();
   return $content;
   }
   add_shortcode('CaseStudiesListings', 'CaseStudiesListingPage');

/*sorting filter */
add_action('wp_ajax_filter_data', 'filter_data'); 
  
function filter_data()
{
 $args = array(
  'post_type'      => 'casesstudies',
  'posts_per_page' => 9,
  'orderby' => 'date',
  'order'   => 'DESC',
);
$params = array(
  'post_type' =>'block_code',
  'orderby'   => array(
    'date' =>'DESC',
    'menu_order'=>'ASC',
    /*Other params*/
   )
);
if (isset($_POST['orderby']) && !empty($_POST['orderby'])) {
  if ($_POST['orderby'] == 'asc') {
    $args = array_merge($args, ['orderby' => 'date',
    'order'   => 'ASC',
      /*Other params*/
    ]);
  }
  if ($_POST['orderby'] == 'desc') {
    $args = array_merge($args, ['orderby' => 'date',
    'order'   => 'DESC',
    
     ]);
  }
  
}

$loop = new WP_Query($args);
if ($loop->have_posts()) :
  while ($loop->have_posts()) : $loop->the_post();
?>
<div class="list-item">
    <div class="case-studies-blocks">
        <div class="case-studies-img">
            <?php echo get_the_post_thumbnail(); ?>
        </div>
        <div class="case-studies-cntnt">
            <h4 class="case-studies-heading">
                <?php echo get_the_title(); ?>
            </h4>
            <p class="case-studies-description"><?php echo get_the_excerpt(); ?></p>
            <div class="read_more">
                <a href="#" type="button" data-bs-toggle="modal" data-Id="<?php echo get_the_id(); ?>"
                    class="case_study_button">Read More</a>
            </div>
        </div>
    </div>
</div>
<?php
endwhile;
else : ?>
<div class="our-work case-list-work my-3 my-md-4">
    <div class="col-md-12">
        <h2>No Data found</h2>
    </div>
</div>
<?php endif;
die;
}

   
/******************************************case_study_detail***********************************************/

add_action( 'wp_ajax_case_study_detail', 'case_study_detail' );    // If called from admin panel
add_action( 'wp_ajax_nopriv_case_study_detail', 'case_study_detail' );

function case_study_detail () {
    $postID = $_POST['id'];
    if (isset($_POST['id'])){
        $post_id = $_POST['id'];
    }else{
        $post_id = "";
    }

    global $post;
    $post = get_post($postID);

    ?>
<?php
if(get_field('pdf_link')!=NULL){

?>
<div class="case-studies-pdf-preview">
    <iframe src="<?php echo get_field('pdf_link'); ?>"></iframe>
</div>
</div>
<?php 
}
else{
    ?>
<div class="case-studies-pdf-preview">
    <h2>No Case Studies were found</h2>
</div>
</div>
<?php
}
?>
<?php
    exit;
}

/*****************************work_study_detail***********************************************/

add_action( 'wp_ajax_work_study_detail', 'work_study_detail' );    // If called from admin panel
add_action( 'wp_ajax_nopriv_work_study_detail', 'work_study_detail' );

function work_study_detail () {
    $postID = $_POST['id'];
    if (isset($_POST['id'])){
        $post_id = $_POST['id'];
    }else{
        $post_id = "";
    }

    global $post;
    $post = get_post($postID);
    ?>
<div class="modal-body border">
    <button type="button" class="btn-close" data-bs-dismiss="modal" id="close-btn"></button>
    <div class="form-design">
        <div class="form-heading">
            <h4>You’re almost there! Just submit your name, company and email and download your worksheet right away.
            </h4>
        </div>
        <div class="form-grouph input-design">
            <input type="text" name="name" id="name" placeholder="Name">
            <span class="text-danger" id="nameError"></span>
        </div>
        <div class="form-grouph input-design">
            <input type="email" name="email" id="email" placeholder="Email">
            <span class="text-danger" id="emailError"></span>
        </div>
        <div class="form-grouph input-design">
            <input type="text" id="file" name="file" value="<?php echo get_field('worksheet_file',$postID); ?>" hidden>
        </div>
        <div clascase_study_details_pagelor: #467667; font-size: 12px; border: 1px solid #467667; text-shadow: 0px -1px
            0px rgba(0, 0, 0, 0.3); font-weight: 800; } .swal-title:not(:last-child) { margin-bottom: 13px; color:
            black; } .swal-text { font-size: 16px; position: relative; float: none; line-height: normal; vertical-align:
            top; text-align: left; display: inline-block; margin: 0; padding: 0 10px; font-weight: 400; color: black;
            max-width: calc(100% - 20px); overflow-wrap: break-word; box-sizing: border-box; } .text-danger { color:
            red; font-weight: 400; } </style>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
            $('#readMoreSubmit').on('click', function(e) {
                e.preventDefault();
                var data = {
                    action: 'workstudy_form_mail',
                    name: $("#name").val(),
                    email: $("#email").val(),
                    file: $("#file").val(),
                };
                if (data.name == "") {
                    $('#name').addClass('error');
                    $('#nameError').text('Name field is required *');
                } else if (data.email == "") {
                    $('#email').addClass('error');
                    $('#emailError').text('Email field is required *');
                    $('#nameError').text('');

                } else {

                    $.ajax({
                        type: "POST",
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        data: data,
                        success: (response) => {
                            swal("Thank You!", "You will now get a Mail.!", "success");
                            setTimeout(function() {
                                window.location =
                                    "http://ronjinij.sg-host.com/services/startup-services-2/";
                            }, 2000);
                        }
                    });
                    $('#emailError').text('');
                }
            });

            $('#close-btn').on('click', function(e) {
                e.preventDefault();
                $('#work-studies-preview').hide()
            })
            </script>
            <?php
    exit;
}

add_action( 'wp_ajax_workstudy_form_mail', 'workstudy_form_mail' ); 
add_action( 'wp_ajax_nopriv_workstudy_form_mail', 'workstudy_form_mail' );
function workstudy_form_mail(){
   
    $email = $_POST['email'];
    $name  = $_POST['name'];
    $message = 'Hi'." " . $name.",\r\n\n".'Thank You for filling form on the Webite.Please download attached Worksheet.'."\r\n\n".'Thanks'.",\r\n".'The Silver Telegram';
    $subject = 'Sending Work Study Content';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";
    $headers = "From: Silver Telegram <brajeshjha108@gmail.com>" . "\r\n";
    $attachments = $_POST['file'];
    $filepath =  explode( "wp-content", $attachments )[1];
    $attachments = array( WP_CONTENT_DIR . $filepath );
    $result = wp_mail($email,$subject,$message, $headers,$attachments);
    
}

function DownloadNow()
{
ob_start();
    ?>
            <div class="worksheets-modal-download">
                <div class="container">
                    <!-- Trigger the modal with a button -->
                    <button type="button" id="downloadButton" data-bs-toggle="modal"
                        data-bs-target="#downloadModal">Download Now</button>
                    <!-- Modal -->
                    <div class="modal worksheets-modal-design" id="downloadModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <!-- Modal content-->
                            <div class="modal-body border">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" id="close-btn"></button>
                                <div class="form-design">
                                    <div class="form-heading">
                                        <h4>You’re almost there! Just submit your name, company and email and download
                                            ultimate launch checklist right away.</h4>
                                    </div>
                                    <div class="form-grouph input-design">
                                        <input type="text" name="name" id="name" placeholder="Name">
                                        <span class="text-danger" id="nameError"></span>
                                    </div>
                                    <div class="form-grouph input-design">
                                        <input type="email" name="email" id="email" placeholder="Email">
                                        <span class="text-danger" id="emailError"></span>
                                    </div>
                                    <div class="form-grouph input-design">
                                        <input type="text" id="file" name="file"
                                            value="<?php echo get_field('worksheet_file',$postID); ?>" hidden>
                                    </div>
                                    <div class="form-grouph submit-design">
                                        <button name="submit" id="download" type="submit" value="Submit"
                                            disable>submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
$content = ob_get_clean();
return $content;
}
add_shortcode('Download', 'DownloadNow');

/****************************mailing****************************************************************/
add_action( 'wp_ajax_Donwload_worksheet', 'Donwload_worksheet' ); 
add_action( 'wp_ajax_nopriv_Donwload_worksheet', 'Donwload_worksheet' );
function Donwload_worksheet(){
   
    $email = $_POST['email'];
    $name  = $_POST['name'];
    $message = 'Hi'." " . $name.",\r\n\n".'Thank You for filling form on the Webite.Please download attached Worksheet.'."\r\n\n".'Thanks'.",\r\n".'The Silver Telegram';
    $subject = 'Sending Work Study Content';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";
    $headers = "From: Silver Telegram <brajeshjha108@gmail.com>" . "\r\n";
    $attachments = array( WP_CONTENT_DIR . '/uploads/2023/01/TSTs-Ultimate-Launch-Checklist-1.pdf' );
    $result = wp_mail($email,$subject,$message, $headers,$attachments);
    
}
//-------------------------------case study template page function---------------------//

add_action( 'wp_ajax_case_study_details_page', 'case_study_details_page' );    // If called from admin panel
add_action( 'wp_ajax_nopriv_case_study_details_page', 'case_study_details_page' );
function case_study_details_page(){
    $postID = $_POST['id'];
    if (isset($_POST['id'])){
        $post_id = $_POST['id'];
    }else{
        $post_id = "";
    }

    global $post;
    $post = get_post($postID);

    ?>
                <?php
if(get_field('pdf_link')!=NULL){
?>
                <div class="case-studies-pdf-preview">
                    <iframe src="<?php echo get_field('pdf_link'); ?>"></iframe>
                </div>
            </div>
            <?php 
}
else{
    ?>
            <div class="case-studies-pdf-preview">
                <h2>No Case Studies were found</h2>
            </div>
            <?php
}
?>
            <?php
 exit;
}