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

    <div id="primary" class="content-area cute-8-tablet">
        <main id="main" class="site-main" role="main">

            <?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>

                <?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );
            the_field('highlight_1');
            the_field('highlight_2');
            the_field('highlight_3');
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

                    <?php

  // $args = array('name' => "features");
   $featured_page = new WP_Query('name=features&post_type=page');

   if($featured_page->have_posts()) : 
      while($featured_page->have_posts()) : 
         $featured_page->the_post();
?>
                        <article id="page-<?php the_ID(); ?>" <?php post_class( 'features dark'); ?>>
                            <h1><?php the_title() ?></h1>
                            <div class='post-content'>
                                <?php the_content() ?>
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

                                <div id="news">
                                    <?php

   //$args = array('posts_per_page' => 3);
   $posts = new WP_Query("posts_per_page=3");

   if($posts->have_posts()) : 
      while($posts->have_posts()) : 
         $posts->the_post();
?>
                                        <article>
                                            <h1><?php the_title() ?></h1>
                                            <p>
                                                <?php the_time('F j, Y'); ?>
                                            </p>
                                            <div class='post-content'>
                                                <?php the_content() ?>
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
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <?php
get_sidebar();
get_footer();