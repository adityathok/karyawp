<?php
/**
 * Custom Meta box for themes
 *
 * @package karyawp
*/

class KaryaWP_Metabox_Page {

    public function __construct() {        
        add_action('add_meta_boxes', array($this, 'add'));
        add_action('save_post', array($this, 'save'));
    }

    /**
     * Set up and add the meta box.
     */
    public static function add()
    {
        add_meta_box(
            'karyawp_page_box_id',      // Unique ID
            'KaryaWP Layout Settings',  // Box title
            [self::class, 'html'],      // Content callback, must be of type callable
            'page',                     // Post type
            'normal',                   // Context
            'high'                      // priority
        );
    }

    /**
     * Save the meta box selections.
     *
     * @param int $post_id  The post ID.
     */
    public static function save(int $post_id)
    {
        if (array_key_exists('karyawp_navbar_overlay', $_POST)) {
            update_post_meta(
                $post_id,
                'karyawp_navbar_overlay',
                $_POST['karyawp_navbar_overlay']
            );
        }
        if (array_key_exists('karyawp_page_title', $_POST)) {
            update_post_meta(
                $post_id,
                'karyawp_page_title',
                $_POST['karyawp_page_title']
            );
        }
        if (array_key_exists('karyawp_sidebar_position', $_POST)) {
            update_post_meta(
                $post_id,
                'karyawp_sidebar_position',
                $_POST['karyawp_sidebar_position']
            );
        }
    }
    
    /**
     * Display the meta box HTML to the user.
     *
     * @param WP_Post $post   Post object.
     */
    public static function html($post)
    {
        $karyawp_navbar_overlay     = get_post_meta($post->ID, 'karyawp_navbar_overlay', true);
        $karyawp_sidebar_position   = get_post_meta($post->ID, 'karyawp_sidebar_position', true);
        ?>
        <div>
            <label for="karyawp_navbar_overlay">Navbar Overlay :</label>
            <select name="karyawp_navbar_overlay" id="karyawp_navbar_overlay" class="postbox">
                <option value="">Default</option>
                <option value="enable" <?php selected($karyawp_navbar_overlay, 'enable'); ?>>Enable</option>
                <option value="disable" <?php selected($karyawp_navbar_overlay, 'disable'); ?>>Disable</option>
            </select>
        </div>
        <div>
            <label for="karyawp_sidebar_position">Sidebar Position :</label>
            <select name="karyawp_sidebar_position" id="karyawp_sidebar_position" class="postbox">
                <option value="">Default</option>
                <option value="right" <?php selected($karyawp_sidebar_position, 'right'); ?>>right</option>
                <option value="left" <?php selected($karyawp_sidebar_position, 'left'); ?>>Left</option>
                <option value="disable" <?php selected($karyawp_sidebar_position, 'disable'); ?>>Disable</option>
            </select>
        </div>
        <?php
    }
}

new KaryaWP_Metabox_Page;