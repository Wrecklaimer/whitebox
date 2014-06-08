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
		<input type="submit" class="search-submit" value="<?php echo $submit_text; ?>" />
	</span>
</form>
