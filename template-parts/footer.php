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

    <div class="<?php echo karyawp_container_type('footer');?>">

        <?php
            get_template_part( 'template-parts/footer/widgets' );
            
            get_template_part( 'template-parts/footer/copyright' );
        ?>

    </div>

</footer>