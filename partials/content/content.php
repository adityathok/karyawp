<?php
/**
 * Layout Content Archive
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-12 mb-4 mb-md-5' ); ?>>

    <div class="row">

        <div class="col-md-4 col-xl-3">
            <?php
                echo karyawp_entry_thumbnail(['size' => 'large', 'ratio' => '4x3']);
            ?>
        </div>

        <div class="col-md-8 col-xl-9 mt-2 mt-md-0">  

            <header class="entry-header">
                <?php
                the_title(
                    sprintf('<h2 class="entry-title fs-4"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
                    '</a></h2>'
                );
                ?>
            </header><!-- .entry-header -->            
                
            <div class="entry-content">
                <?php
                    echo get_the_excerpt();
                ?>
            </div><!-- .entry-content -->

            <?php if ('post' === get_post_type()) : ?>
                <div class="entry-meta mt-2">
                    <small><?php echo karyawp_entry_meta(); ?></small>
                </div><!-- .entry-meta -->
            <?php endif; ?>

        </div>

    </div>

</article><!-- #post-## -->