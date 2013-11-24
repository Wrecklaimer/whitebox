<?php $template = get_post_meta($post->ID, 'post_template', true); ?>

<div id="sidebar" class="sidebar-right">

<?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar('Sidebar'); ?>

</div>