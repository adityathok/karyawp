<?php
/**
 * Template part for displaying logo in header.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package karyawp
 */

?>

<?php if ( ! has_custom_logo() ) { ?>

    <?php if ( is_front_page() && is_home() ) : ?>

        <h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

    <?php else : ?>

        <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

    <?php endif; ?>

<?php
} else {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    echo '<a class="navbar-brand" rel="home" href="' . esc_url( home_url( '/' ) ) . '">';
        echo wp_get_attachment_image( $custom_logo_id, array('700', '600'), "", array( "class" => "img-responsive" ) );
    echo '</a>';
}
?>