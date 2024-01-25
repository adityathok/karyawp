<?php
/**
 * Layout Content Thumbnail
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

global $post;

// size thumbnail for post
$size   = isset( $args['size'] ) ? $args['size'] : 'medium';

//ratio bootstrap 5
$ratio      = isset( $args['ratio'] ) ? $args['ratio'] : '';
$ratio_def  = ['1x1', '4x3', '16x9', '21x9'];
$is_ratio    = in_array( $ratio, $ratio_def );
?>

<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_url( get_the_title() ); ?>">

    <?php if( $is_ratio ): ?>
        <div class="ratio ratio-4x3 bg-light">
    <?php endif; ?>

        <?php echo get_the_post_thumbnail( $post->ID, $size, array( 'class' => 'img-fluid' ) ); ?>

    <?php if( $is_ratio ): ?>
        </div>
    <?php endif; ?>

</a>