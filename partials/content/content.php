<?php
/**
 * Layout Content Archive
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

global $i;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-12 mb-4 mb-md-5'); ?>>

    <div class="border-bottom pb-4 pb-md-5">

        <?php if( $i == 1): ?>

            <div class="row align-items-md-center">

                <?php if ( has_post_thumbnail() ): ?>
                    <div class="col-md-6 col-xl-7 pb-3 pb-md-0">
                        <?php
                            echo karyawp_entry_thumbnail(['size' => 'large', 'ratio' => '16x9']);
                        ?>
                    </div>
                <?php endif; ?>

                <div class="col-md">        

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

        <?php else: ?>

            <div class="row align-items-md-center flex-md-row-reverse">

                <?php if ( has_post_thumbnail() ): ?>
                    <div class="col-md-4 col-xl-3 pb-3 pb-md-0">
                        <?php
                            echo karyawp_entry_thumbnail(['size' => 'medium', 'ratio' => '4x3']);
                        ?>
                    </div> 
                <?php endif; ?>

                <div class="col-md">
                    
                    <header class="entry-header">
                            <?php
                            the_title(
                                sprintf('<h2 class="entry-title fw-bold fs-4"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
                                '</a></h2>'
                            );
                            ?>
                        </header><!-- .entry-header -->    

                        <div class="entry-content small">
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

        <?php endif; ?>

    </div>

</article>