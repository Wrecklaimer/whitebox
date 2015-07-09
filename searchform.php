<?php
/*
 * Search Form
 */

$placeholder = apply_filters('whitebox_searchform_placeholder', '');
$submit_text = apply_filters('whitebox_searchform_submit_text', 'Search');
?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<span class="search-left">
		<label class="search-label screen-reader-text">Search for:</label>
		<input type="search" class="search-field" placeholder="<?php echo $placeholder; ?>" value="" name="s" />
	</span>
	<span class="search-right">
		<button type="submit" class="search-submit" ><span class="button-text"><?php echo $submit_text; ?></span></button>
	</span>
</form>
