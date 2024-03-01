<?php
/**
 * The Footer
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
            <?php 
            /** 
            * karyawp_close_content()
            */
            do_action( 'karyawp_content_after' );
            ?>

        </div><!-- #page-content closing div-->
        
		<?php 
		do_action( 'karyawp_footer_before' );
		/** 
		* karyawp_footer()
		* partials/footer
		*/
		do_action( 'karyawp_footer' );
		do_action( 'karyawp_footer_after' );
		?>

    </div><!-- #page closing div-->

    <?php 
        wp_footer(); 
    ?>

</body>

</html>