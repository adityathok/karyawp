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
                get_template_part( 'partials/header/logo' );
            ?>

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

                    <div class="d-flex justify-content-lg-end flex-grow-1 pe-2">
                        <?php
                            get_template_part( 'partials/header/menu' );
                        ?>
                    </div>

                    <hr class="d-lg-none text-secondary">

                    <ul class="navbar-nav flex-row flex-wrap justify-content-between ms-lg-auto mt-4 mt-md-0">
                        <li class="nav-item d-lg-none">
                            <?php echo get_search_form(array('size' => 'normal')); ?>
                        </li>
                        <li class="nav-item d-none d-md-flex">
                            <?php
                                get_template_part( 'partials/header/search' );
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php
                                get_template_part( 'partials/header/darkmode' );
                            ?>
                        </li>
                    </ul>

                </div>

            </div>
            <!-- offcanvas-navigation -->

        </div>
        
    </nav>

</header>
