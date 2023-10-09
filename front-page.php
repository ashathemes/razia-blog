<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Razia 
 */
get_header();

$slider_args = new WP_Query(
    array(
        'posts_per_page' => 1,
        'post_type' => 'post',
        'ignore_sticky_posts' => 1
    )
); ?>
<div class="col-lg-9">
<?php while($slider_args->have_posts()) : $slider_args->the_post();
$slider_post_id = get_the_ID();?>
    <div class="industry-single-slide-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="bg-image">
                        <div class="industry-single-slide" style="background-image: url(<?php if ( has_post_thumbnail () ):the_post_thumbnail_url(); else : echo esc_url (get_stylesheet_directory_uri() . '/assets/img/1.jpg' ); endif; ?>)" >
                        </div>
                     </div>
                </div>
                <div class="col-lg-8">
                    <div class="bannar-content">
                        <h2 class="static-heading">
                            <?php the_title( ); ?>
                        </h2>
                        <div class="static-des">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
 endwhile;
wp_reset_query();  ?>
</div>
<?php
get_footer();