<?php
/**
 * Template part for displaying menu in header.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zahro
 */

?>

<?php
wp_nav_menu(
    array(
        'theme_location'  => 'primary',
        'container_class' => 'd-flex justify-content-md-end flex-grow-1 pe-2',
        'container_id'    => 'primary-menu',
        'menu_class'      => 'navbar-nav',
        'fallback_cb'     => '',
        'menu_id'         => 'main-menu',
        'depth'           => 2,
        'walker'          => new zahro_WP_Bootstrap_Navwalker(),
    )
);
?>