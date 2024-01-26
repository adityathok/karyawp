<?php
/**
 * Template part for displaying search form in header.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package karyawp
 */

// The search specific unique ID for the modal.
$uid = wp_unique_id('searchModal'); 
?>

<button type="button" class="btn btn-link nav-link btn-searchModal" data-bs-toggle="modal" data-bs-target="#<?php echo $uid; ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
    </svg>
</button>

<?php add_action('wp_footer', function() use ($uid) { ?>

  <!-- <?php echo $uid; ?> -->
  <div class="modal fade" id="<?php echo $uid; ?>" tabindex="-1" aria-labelledby="<?php echo $uid; ?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-transparent border-0 rounded-0 pt-3 p-0">
        <div class="modal-body card rounded-0 border-0">
            <?php echo get_search_form(array('size' => 'large')); ?>
        </div>
      </div>
    </div>
  </div>

<?php }); ?>