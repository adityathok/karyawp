<?php
/**
 * Template part for displaying menu in header.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package karyawp
 */

?>

<?php
wp_nav_menu(
    array(
        'theme_location'  => 'primary',
        'container_class' => '',
        'container_id'    => 'primary-menu',
        'menu_class'      => 'navbar-nav',
        'fallback_cb'     => '',
        'menu_id'         => 'main-menu',
        'depth'           => 2,
        'walker'          => new karyawp_WP_Bootstrap_Navwalker(),
    )
);
?>