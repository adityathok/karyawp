<?php
/**
 * Layout Header
 *
 * @package zahro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if (!function_exists('zahro_navbar')) {
    add_action('zahro_header', 'zahro_navbar', 20);
    function zahro_navbar()
    {        
    ?>

    <header id="wrapper-navbar">
        
        <nav id="main-nav" class="navbar navbar-expand-lg" aria-label="Main navigation">

            <div class="flex-wrap flex-lg-nowrap">
                <!-- Your site title as branding in the menu -->
                <?php if ( ! has_custom_logo() ) { ?>

                    <?php if ( is_front_page() && is_home() ) : ?>

                        <h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

                    <?php else : ?>

                        <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

                    <?php endif; ?>

                <?php
                } else {
                    the_custom_logo();
                }
                ?>
                <!-- end custom logo -->
                
            </div>
        </nav>

    </header>

    <?php
    }
}