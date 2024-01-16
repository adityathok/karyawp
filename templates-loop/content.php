<?php
/**
 * Partial template for content in archive post
 *
 * @package zahro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<article <?php post_class('col-12 pb-3'); ?> id="post-<?php the_ID(); ?>">

    <div class="row">
        <div class="col-md-4">

            <div class="ratio ratio-4x3 bg-light">
                <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
            </div>

        </div>
        <div class="col-md">
            
            <header class="entry-header">
                <?php
                the_title(
                    sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
                    '</a></h2>'
                );
                ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                    the_excerpt();
                ?>
            </div><!-- .entry-content -->

            <?php if ('post' === get_post_type()) : ?>
                <div class="entry-meta">
                    <small><?php echo get_the_date(); ?></small>
                </div><!-- .entry-meta -->
            <?php endif; ?>

        </div>

    </div>


</article><!-- #post-## -->