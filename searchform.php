<?php
/**
 * Template part for displaying get_search_form()
 *
 * @package zahro
 */

// The search form specific unique ID for the input.
$uid = wp_unique_id('s-'); 

// The search form sizing (large,normal,small).
$size = isset($args['size']) && !empty($args['size'])?$args['size']:'';
?>

<form role="search" class="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">

	<label class="screen-reader-text" for="<?php echo $uid; ?>"><?php echo esc_html_x('Search for:', 'label', 'zahro'); ?></label>

	<div class="input-group bg-light border rounded position-relative overflow-hidden">

        <?php 
        switch ($size) {
            case 'large':
              $form_input = 'form-control form-control-lg';
              break;
            case 'small':
              $form_input = 'form-control form-control-sm';
              break;
            default:
              $form_input = 'form-control';
        }
        ?>
		<input type="search" class="field search-field <?php echo $form_input ; ?> bg-light border-0 rounded-0" id="<?php echo $uid; ?>" name="s" value="<?php the_search_query(); ?>" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'zahro'); ?>">
		
        <?php 
        switch ($size) {
            case 'large':
              $svg_size = 16;
              break;
            case 'small':
              $svg_size = 9;
              break;
            default:
              $svg_size = 12;
        }
        ?>
        <button class="submit search-submit btn btn-light" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="<?php echo $svg_size ; ?>" height="<?php echo $svg_size ; ?>" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
        </button>

	</div>

</form>
<?php