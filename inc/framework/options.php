<?php return array(

	"SEO" => array(
		array(
			'name' => 'Enable SEO Settings',
			'desc' => 'Disable this if you want to use a 3rd party SEO Plugin.',
			'id'   => 'enable_seo',
			'std'  => 'on',
			'type' => 'checkbox'
		),
		array(
			'name'    => 'Homepage Title',
			'desc'    => 'Format of page title on the homepage.',
			'id'      => 'seo_homepage_title',
			'options' => array(
				'Site Title - Site Description',
				'Site Description - Site Title',
				'Site Title'
				),
			'std'     => 'Site Title - Site Description',
			'type'    => 'select'
		),
		array(
			'name'    => 'Post and Page Title',
			'desc'    => 'Format of page title on posts and pages.',
			'id'      => 'seo_post_title',
			'options' => array(
				'Site Title - Page Title',
				'Page Title - Site Title',
				'Page Title'
				),
			'std'     => 'Page Title - Site Title',
			'type'    => 'select'
		),
		array(
			'name'    => 'Index Page Title',
			'desc'    => 'Format of page title on index pages (archives/search results).',
			'id'      => 'seo_index_title',
			'options' => array(
				'Site Title - Page Title',
				'Page Title - Site Title',
				'Page Title'
				),
			'std'     => 'Page Title - Site Title',
			'type'    => 'select'
		),
		array(
			'name' => 'Title Separator',
			'id'   => "seo_title_separator",
			'std'  => '&mdash;',
			'type' => 'text'
		),
	)

);