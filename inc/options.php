<?php return array(

	"General" => array(
		array(
			'name' => 'Header Logo',
			'desc' => 'Upload a custom logo image for the header, or specify an image url.',
			'id'   => 'header_logo',
			'type' => 'upload',
			'std'  => ''
		),
		array(
			'name' => 'Favicon',
			'desc' => 'Upload a favicon image (16&times;16px).',
			'id'   => 'favicon',
			'type' => 'upload',
			'std'  => ''
		),
		array(
			'name' => 'Show Site Description',
			'desc' => 'Displays the site description in the header.',
			'id'   => 'show_site_description',
			'type' => 'checkbox',
			'std'  => '1'
		),
		array(
			'name' => 'Copyright Text',
			'desc' => 'Replaces the footer copyright text. Leaving this blank will default to the site name.',
			'id'   => 'copyright_text',
			'type' => 'text',
			'std'  => ''
		),
		array(
			'name' => 'Copyright Link',
			'desc' => 'Replaces the footer copyright link. Leaving this blank will default to the site url.',
			'id'   => 'copyright_link',
			'type' => 'text',
			'std'  => ''
		)
	),
	"Homepage" => array(
		array(
			'name' => 'Display Recent Posts',
			'desc' => 'Shows the most recent posts on the homepage.',
			'id'   => 'show_recent_posts',
			'type' => 'checkbox',
			'std'  => '1'
		),
		array(
			'name' => 'Show Sidebar',
			'desc' => 'Shows the sidebar on the homepage.',
			'id'   => 'show_homepage_sidebar',
			'type' => 'checkbox',
			'std'  => '0'
		)
	),
	"Posts" => array(
		array(
			'name' => 'Show Thumbnails',
			'id'   => 'show_post_thumbnails',
			'type' => 'checkbox',
			'std'  => '1'
		),
		array(
			'name' => 'Display Author',
			'id'   => 'show_post_author',
			'type' => 'checkbox',
			'std'  => '1'
		),
		array(
			'name' => 'Display Date/Time',
			'desc' => '<strong>Date/Time format</strong> can be changed <a href="options-general.php" target="_blank">here</a>.',
			'id'   => 'show_post_date',
			'type' => 'checkbox',
			'std'  => '1'
		),
		array(
			'name' => 'Display Category',
			'id'   => 'show_post_category',
			'type' => 'checkbox',
			'std'  => '1'
		)
	)

);