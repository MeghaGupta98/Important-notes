<?php

get_header();
?>
<div>
    <h1><?php the_title(); ?></h1>
</div>
<div class="content">
    <?php the_content(); ?>
    <?php the_post_thumbnail(); ?>
</div>
<?php
$value1 = get_field('name');
$value2 = get_field('image');
$value3 = get_field('company');
// echo $value1; 
// echo $value3;
?>
<img src="<?php echo $value2['url']; ?>" width="500px" height="200px">
<p><strong>Name: </strong><?php echo $value1; ?><br>
    <strong>Company: </strong><?php echo $value3; ?>
</p>
<?php

get_footer();
?>