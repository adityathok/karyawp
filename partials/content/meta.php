<?php
/**
 * Layout Content Meta
 *
 * @package karyawp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<?php if ('post' === get_post_type()) : ?>
    <div class="entry-meta mt-2">
        <small><?php echo karyawp_entry_meta(); ?></small>
    </div><!-- .entry-meta -->
<?php endif; ?>