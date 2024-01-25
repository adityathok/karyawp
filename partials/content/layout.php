<?php
/**
 * Layout Content Archive
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-12 mb-4' ); ?>>

    <div class="row">

        <div class="col-md-4 col-xl-3">
            <?php
                get_template_part( 'partials/content/thumbnail','',['size' => 'large', 'ratio' => '4x3'] );
            ?>
        </div>

        <div class="col-md-8 col-xl-9 mt-2 mt-md-0">  
            <?php
                get_template_part( 'partials/content/header');
            ?>
            
            <?php
                get_template_part( 'partials/content/excerpt');
            ?>

            <?php
                get_template_part( 'partials/content/meta');
            ?>

        </div>

    </div>

</article><!-- #post-## -->