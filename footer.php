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
		/** 
		* karyawp_footer()
		* template-parts/footer
		*/
		do_action( 'karyawp_footer' );
		?>

    </div><!-- #page closing div-->

    <?php 
        wp_footer(); 
    ?>

</body>

</html>