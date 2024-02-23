<?php
/**
 * Layout Content Archive
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

global $post_order;

?>

<?php if( $post_order == 1): ?>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'col-12 mb-4 mb-md-5'); ?>>
        <div class="row align-items-md-center">

            <div class="col-md-6 col-xl-7">
                <?php
                    echo karyawp_entry_thumbnail(['size' => 'large', 'ratio' => '16x9']);
                ?>
            </div>
            <div class="col-md-6 col-xl-5">        

                <header class="entry-header">
                    <?php
                    the_title(
                        sprintf('<h2 class="entry-title fw-bold fs-2"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
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
    </article>

<?php else: ?>

    <?php
    $column = $post_order>3?'col-md-4':'col-md-6';    
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class( $column.' mb-4 mb-md-5'); ?>>

        <div class="mb-3">
            <?php
                echo karyawp_entry_thumbnail(['size' => 'large', 'ratio' => '16x9']);
            ?>
        </div>

        <div>  

            <header class="entry-header">
                <?php
                the_title(
                    sprintf('<h2 class="entry-title fw-bold fs-4"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
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

    </article>

<?php endif; ?>