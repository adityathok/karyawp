<?php
/**
 * The Footer
 *
 * @package zahro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
            <?php 
            /** 
            * zahro_close_content()
            */
            do_action( 'zahro_content_after' );
            ?>

        </div><!-- #page-content closing div-->
        
		<?php 
		/** 
		* zahro_footer()
		* templates-parts/footer
		*/
		do_action( 'zahro_footer' );
		?>

    </div><!-- #page closing div-->

    <?php 
        wp_footer(); 
    ?>

</body>

</html>