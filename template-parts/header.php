<?php
/**
 * Layout Header
 *
 * @package karyawp
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

            <button class="navbar-toggler border-0 rounded-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavigation" aria-controls="offcanvasNavigation" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavigation" aria-labelledby="offcanvasNavigationLabel">

                <?php if ( is_admin_bar_showing() ) { ?>                    
                    <!-- offcanvas header with admin bar -->
                    <div class="offcanvas-header justify-content-end pt-5">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                <?php } else { ?>
                    <div class="offcanvas-header justify-content-end">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <div class="offcanvas-body">

                    <?php
                        get_template_part( 'template-parts/header', 'menu' );
                    ?>
                    <!-- site-navigation -->

                    <div class="d-flex justify-content-end">
                        <?php
                            get_template_part( 'template-parts/header', 'search' );
                        ?>
                        <!-- -search-form-navigation -->

                        <?php
                            get_template_part( 'template-parts/header', 'darkmode' );
                        ?>
                        <!-- -darkmode-navigation -->
                    </div>

                </div>

            </div>
            <!-- offcanvas-navigation -->

        </div>
        
    </nav>

</header>
