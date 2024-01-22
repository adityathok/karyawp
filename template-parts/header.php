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

            <?php
                get_template_part( 'template-parts/header', 'logo' );
            ?>
            <!-- site-branding -->

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavigation" aria-controls="offcanvasNavigation" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavigation" aria-labelledby="offcanvasNavigationLabel">

                <?php if ( is_admin_bar_showing() ) { ?>
                    <div class="offcanvas-header justify-content-end pt-5">
                <?php } else { ?>
                    <div class="offcanvas-header justify-content-end">
                <?php } ?>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">

                    <?php
                        get_template_part( 'template-parts/header', 'menu' );
                    ?>
                    <!-- site-navigation -->

                    <?php
                        get_template_part( 'template-parts/header', 'search' );
                    ?>
                    <!-- -search-form-navigation -->

                    <?php
                        get_template_part( 'template-parts/header', 'darkmode' );
                    ?>
                    <!-- -search-form-navigation -->

                </div>

            </div>
            <!-- offcanvas-navigation -->

        </div>
        
    </nav>

</header>
