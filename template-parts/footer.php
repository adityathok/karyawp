<?php
/**
 * Layout Footer
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<footer id="site-footer" class="site-footer py-4 py-md-5 mt-5 bg-body-tertiary" role="contentinfo">

    <div class="container">
        <div class="site-info">
                <?php
                printf('© %s <a href="%s"> %s </a>. All rights reserved.', 
                    date('Y'),
                    home_url( '/' ),
                    get_bloginfo( 'name') 
                );
                ?>
                
                <span class="sep"> | </span>

                <?php
                /* translators: 1: Theme name, 2: Theme author. */
                printf( esc_html__( 'Theme: %1$s by %2$s.', 'karyawp' ), 'karyawp', '<a href="https://github.com/adityathok/karyawp/">Adityathok</a>' );
                ?>

        </div><!-- .site-info -->
    </div>

</footer>