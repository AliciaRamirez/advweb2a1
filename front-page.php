<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package advweb2a1
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
           
           <!--/////////// Home Page Content ///////////-->
            <section id="intro" class="clearfix">
                    <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
                <div class="cute-12-phone"><?php the_content(); ?></div>

                    <aside class="cute-4-tablet highlight">
                        <?php the_field('highlight_1'); ?>
                    </aside>
                    <aside class="cute-4-tablet highlight">
                        <?php the_field('highlight_2'); ?>
                    </aside>
                    <aside class="cute-4-tablet highlight">
                        <?php the_field('highlight_3'); ?>
                    </aside>
                    <?php
                    endwhile; 
                else : 
                    get_template_part( 'template-parts/content', 'none' );      
                endif; ?>
            </section>
            <!--/////////// Features Page Content ///////////-->
            
            <?php

           $featured_page = new WP_Query('name=features&post_type=page');

           if($featured_page->have_posts()) : 
              while($featured_page->have_posts()) : 
                $featured_page->the_post();
                    ?>
                <section id="features" <?php post_class( 'cute-12-phone'); ?>>
                    <h1><?php the_title() ?></h1>
                    <div class='post-content'>
                        <?php the_content() ?>
                    </div>
                </section>
                <?php
              endwhile;
           else: 
        ?>
            Oops, there are no posts.

        <?php
           endif;
        ?>
<!--/////////// Testimonials Page Content ///////////-->
<?php

           $testimonials_page = new WP_Query('name=testimonials&post_type=page');

           if($testimonials_page->have_posts()) : 
              while($testimonials_page->have_posts()) : 
                $testimonials_page->the_post();
                    ?>
                <section id="testimonials" <?php post_class( 'cute-12-phone'); ?>>
                    <h1><?php the_title() ?></h1>
                    <div class='post-content'>
                        <?php the_content() ?>
                    </div>
                </section>
                <?php
              endwhile;
           else: 
        ?>
            Oops, there are no posts.

        <?php
           endif;
        ?>
<!--/////////// Latest 3 Blog Posts ///////////-->

            <section id="news" class="cute-12-phone">
                <h1>News</h1>
                <div class="row">
            <?php

               $posts = new WP_Query("posts_per_page=3");

               if($posts->have_posts()) : 
                  while($posts->have_posts()) : 
                     $posts->the_post();
            ?>
                    <article class="cute-4-tablet">
                        <h2><?php the_title() ?></h2>
                        <p>
                            <?php the_time('F j, Y'); ?>
                        </p>
                        <div class='post-content'>
                            <?php the_content('Continue Reading &raquo;') ?>
                        </div>
                    </article>

                    <?php
                  endwhile;
               else: 
            ?>

                Oops, there are no posts.

                <?php
               endif;
                    ?>        
                </div>
            </section>
            
<!--/////////// Contact Page Content ///////////-->
<?php

           $contact_page = new WP_Query('name=contact&post_type=page');

           if($contact_page->have_posts()) : 
              while($contact_page->have_posts()) : 
                $contact_page->the_post();
                    ?>
                <section id="contact" <?php post_class( 'cute-12-phone'); ?>>
                    <h1><?php the_title() ?></h1>
                    <div class='post-content'>
                        <?php the_content() ?>
                    </div>
                    
                    <div class="cute-6-tablet">
                        <?php the_field('contact_form');?>
                    </div>
                    <div class="cute-6-tablet">
                        <?php 

                        $location = get_field('location_map');

                        if( !empty($location) ):
                        ?>
                        <div class="acf-map">
                            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                        </div>
                        <?php endif; ?>
                    </div>
                </section>
                <?php
              endwhile;
           else: 
        ?>
            Oops, there are no posts.

        <?php
           endif;
        ?>
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <?php
//get_sidebar();
get_footer();