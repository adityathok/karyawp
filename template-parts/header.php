<?php
/**
 * Layout Header
 *
 * @package zahro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<header id="site-header" class="site-header" role="banner">

    <nav id="navbar-main" class="navbar navbar-expand-lg bg-body-tertiary" aria-label="Main navigation">

        <div class="container">
                        
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

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
                </ul>
            </div>
        </div>
        
    </nav>

</header>
