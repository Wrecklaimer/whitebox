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
			'name' => 'Site Description',
			'id'   => 'show_site_description',
			'type' => 'checkbox',
			'label' => 'Display the site description in the header',
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
			'name'  => 'Recent Posts',
			'id'    => 'show_recent_posts',
			'type'  => 'checkbox',
			'label' => 'Show the most recent posts on the homepage',
			'std'   => '1'
		),
		array(
			'name'  => 'Sidebar',
			'id'    => 'show_homepage_sidebar',
			'type'  => 'checkbox',
			'label' => 'Show the sidebar on the homepage',
			'std'   => '0'
		)
	),
	"Posts" => array(
		array(
			'name'  => 'Thumbnails',
			'id'    => 'show_post_thumbnails',
			'type'  => 'checkbox',
			'label' => 'Show post thumbnails',
			'std'   => '1'
		),
		array(
			'name'  => 'Post Meta',
			'id'    => 'post_meta_group',
			'type'  => 'group',
			'std'   => '',
			'items' => array(
				array(
					'name'  => 'Post Meta',
					'id'    => 'show_post_author',
					'type'  => 'checkbox',
					'label' => 'Show post author',
					'std'   => '1'
				),
				array(
					'name'  => '',
					'desc'  => '<strong>Date/Time format</strong> can be changed <a href="options-general.php" target="_blank">here</a>.',
					'id'    => 'show_post_date',
					'type'  => 'checkbox',
					'label' => 'Show post date',
					'std'   => '1'
				),
				array(
					'name'  => '',
					'id'    => 'show_post_category',
					'type'  => 'checkbox',
					'label' => 'Show post category',
					'std'   => '1'
				),
				array(
					'name'  => '',
					'id'    => 'show_post_tags',
					'type'  => 'checkbox',
					'label' => 'Show post tags',
					'std'   => '0'
				)
			)
		),
	),
		"SEO" => array(
		array(
			'name' => 'SEO Settings',
			'desc' => 'Disable this if you want to use a third-party SEO plugin.',
			'id'   => 'enable_seo',
			'type' => 'checkbox',
			'label' => 'Enable SEO',
			'std'  => '1'
		),
		array(
			'name'    => 'Homepage Title',
			'desc'    => 'Format of page title on the homepage.',
			'id'      => 'seo_homepage_title',
			'type'    => 'select',
			'options' => array(
				'Site Title - Site Description',
				'Site Description - Site Title',
				'Site Title'
			),
			'std'     => 'Site Title - Site Description'
		),
		array(
			'name'    => 'Post and Page Title',
			'desc'    => 'Format of page title on single posts and pages.',
			'id'      => 'seo_post_title',
			'type'    => 'select',
			'options' => array(
				'Site Title - Page Title',
				'Page Title - Site Title',
				'Page Title'
			),
			'std'     => 'Page Title - Site Title'
		),
		array(
			'name'    => 'Index Page Title',
			'desc'    => 'Format of page title on index pages (archives/search results).',
			'id'      => 'seo_index_title',
			'type'    => 'select',
			'options' => array(
				'Site Title - Page Title',
				'Page Title - Site Title',
				'Page Title'
			),
			'std'     => 'Page Title - Site Title'
		),
		array(
			'name' => 'Title Separator',
			'id'   => "seo_title_separator",
			'type' => 'text',
			'std'  => '&mdash;'
		),
	)

);