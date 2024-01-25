<?php
/**
 * Layout Content Excerpt
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="entry-content">
    <?php
        echo get_the_excerpt();
    ?>
</div><!-- .entry-content -->