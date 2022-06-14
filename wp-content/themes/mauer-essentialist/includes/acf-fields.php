<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_586c3bd31162e',
	'title' => esc_html_x('Related Posts', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
	'fields' => array (
		array (
			'default_value' => 1,
			'message' => '',
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
			'key' => 'field_586c3bed902f1',
			'label' => esc_html_x('Show related posts', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'show_related_posts',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'layout' => 'vertical',
			'choices' => array (
				'auto' => esc_html_x('Auto', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
				'manual' => esc_html_x('Select manually', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			),
			'default_value' => 'auto',
			'other_choice' => 0,
			'save_other_choice' => 0,
			'allow_null' => 0,
			'return_format' => 'value',
			'key' => 'field_586c3c39902f2',
			'label' => 'Related posts mode',
			'name' => 'related_posts_mode',
			'type' => 'radio',
			'instructions' => esc_html_x('\'Auto\' automatically selects related posts based on category.
\'Select manually\' enables to select the posts manually and customize the title of the block.', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_586c3bed902f1',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'default_value' => esc_html_x('Related posts', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'maxlength' => '',
			'placeholder' => esc_html_x('Related posts', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'prepend' => '',
			'append' => '',
			'key' => 'field_586c440b902f3',
			'label' => esc_html_x('Related posts heading', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'related_posts_heading',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_586c3bed902f1',
						'operator' => '==',
						'value' => '1',
					),
					array (
						'field' => 'field_586c3c39902f2',
						'operator' => '==',
						'value' => 'manual',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'sub_fields' => array (
				array (
					'post_type' => array (
						0 => 'post',
					),
					'taxonomy' => array (
					),
					'allow_null' => 0,
					'multiple' => 0,
					'return_format' => 'object',
					'ui' => 1,
					'key' => 'field_586c4b3a370d8',
					'label' => esc_html_x('Post', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
					'name' => 'post',
					'type' => 'post_object',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
				),
			),
			'min' => 3,
			'max' => 3,
			'layout' => 'table',
			'button_label' => esc_html_x('Add Post', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'collapsed' => '',
			'key' => 'field_586c47bff2539',
			'label' => esc_html_x('Specify related posts', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'more_posts_repeater',
			'type' => 'repeater',
			'instructions' => esc_html_x('Drag the left side of a line to rearrange posts.', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_586c3bed902f1',
						'operator' => '==',
						'value' => '1',
					),
					array (
						'field' => 'field_586c3c39902f2',
						'operator' => '==',
						'value' => 'manual',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_4s7463m25481a',
	'title' => esc_html_x('Featured Image for Post Grids', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
	'fields' => array(
		array(
			'key' => 'field_8r7313d5dn521',
			'label' => '',
			'name' => 'featured_image_for_post_grids',
			'type' => 'image',
			'instructions' => esc_html_x('Useful for \'Masonry\' layout. Does not affect the \'Big Latest\' post, and the posts in \'List\' layout.', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => 'mauer-special-acf-group-side',
				'id' => '',
			),
			'return_format' => 'id',
			'preview_size' => 'mauer_thumb_3_softcropped',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_56a4d4c4b2513',
	'title' => esc_html_x('Theme Options', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
	'fields' => array (
		array (
			'default_value' => '#ad8353',
			'key' => 'field_56dda70bded52',
			'label' => esc_html_x('Accent color', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'accent_color',
			'type' => 'color_picker',
			'instructions' => esc_html_x('The demo uses #ad8353', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'multiple' => 0,
			'allow_null' => 0,
			'choices' => array (
				'text' => esc_html_x('Text logo', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
				'image' => esc_html_x('Custom image', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			),
			'default_value' => array (
				'text' => esc_html_x('Text logo', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			),
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
			'return_format' => 'value',
			'key' => 'field_56a512219f892',
			'label' => esc_html_x('Logo to use', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'logo_to_use',
			'type' => 'select',
			'instructions' => esc_html_x('Whether to use a nicely tailored text logo or a custom image.', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'disabled' => 0,
			'readonly' => 0,
		),
		array (
			'return_format' => 'array',
			'preview_size' => 'full',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
			'key' => 'field_56a51281d76f9',
			'label' => esc_html_x('Custom logo image', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'logo_image',
			'type' => 'image',
			'instructions' => esc_html_x('Upload your custom image (it\'s height should be at least 96px).', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_56a512219f892',
						'operator' => '==',
						'value' => 'image',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'key' => 'field_58aee3c6fb3a2',
			'label' => esc_html_x('Custom logo width (pixels)', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'logo_image_width',
			'type' => 'number',
			'instructions' => esc_html_x('Here you can scale your logo by controlling its width on the website. It\'s reasonable to upload an image twice as wide as the value you set here — for sharper display on pixel dense displays (e.g. Retina).
Default: 180.', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_56a512219f892',
						'operator' => '==',
						'value' => 'image',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => 'mauer-custom-logo-image-acf-field',
				'id' => '',
			),
			'default_value' => 180,
			'placeholder' => 180,
			'prepend' => '',
			'append' => '',
			'min' => 20,
			'max' => 500,
			'step' => 1,
		),
		array (
			'default_value' => 0,
			'message' => '',
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
			'key' => 'field_585c185f6035a',
			'label' => esc_html_x('Hide tagline from the header', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'hide_site_desc',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'default_value' => '',
			'maxlength' => 1,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'key' => 'field_586c26bd31042',
			'label' => esc_html_x('Favicon Fallback', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'favicon_fallback',
			'type' => 'text',
			'instructions' => esc_html_x('If no site icon set in Appearance > Customize, this letter (latin) will be displayed in site favicon. Defaults to the first letter of the site title.', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'sub_fields' => array (
				array (
					'multiple' => 0,
					'allow_null' => 0,
					'choices' => array (
						'behance' => 'Behance',
						'delicious' => 'Delicious',
						'deviantart' => 'deviantART',
						'digg' => 'Digg',
						'dribbble' => 'Dribbble',
						'facebook' => 'Facebook',
						'flickr' => 'Flickr',
						'foursquare' => 'Foursquare',
						'google-plus' => 'Google+',
						'instagram' => 'Instagram',
						'linkedin' => 'LinkedIn',
						'pinterest' => 'Pinterest',
						'reddit' => 'Reddit',
						'soundcloud' => 'SoundCloud',
						'spotify' => 'Spotify',
						'stumbleupon' => 'StumbleUpon',
						'tumblr' => 'Tumblr',
						'twitter' => 'Twitter',
						'vimeo-square' => 'Vimeo',
						'vine' => 'Vine',
						'vk' => 'VK',
						'wordpress' => 'WordPress',
						'youtube-play' => 'Youtube',
					),
					'default_value' => array (
					),
					'ui' => 0,
					'ajax' => 0,
					'placeholder' => '',
					'return_format' => 'value',
					'key' => 'field_56a4d55661756',
					'label' => esc_html_x('Icon', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
					'name' => 'icon',
					'type' => 'select',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'disabled' => 0,
					'readonly' => 0,
				),
				array (
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => 'http://...',
					'prepend' => '',
					'append' => '',
					'key' => 'field_56a4d58add740',
					'label' => esc_html_x('Url', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
					'name' => 'url',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'readonly' => 0,
					'disabled' => 0,
				),
			),
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => esc_html_x('Add', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'collapsed' => '',
			'key' => 'field_56a4d4ee88013',
			'label' => esc_html_x('Social links', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'social_links',
			'type' => 'repeater',
			'instructions' => esc_html_x('Links to social networks pages that are displayed in the header of the website.', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'layout' => 'vertical',
			'choices' => array (
				'masonry' => esc_html_x('Masonry', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
				'list' => esc_html_x('List', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
				'grid_2_cols' => esc_html_x('2-column grid', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
				'grid_3_cols' => esc_html_x('3-column grid', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			),
			'default_value' => 'grid_3_cols',
			'other_choice' => 0,
			'save_other_choice' => 0,
			'allow_null' => 0,
			'return_format' => 'value',
			'key' => 'field_56d573012a1a7',
			'label' => esc_html_x('Blog page layout', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'blog_page_layout',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
		),
		array (
			'default_value' => 1,
			'message' => '',
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
			'key' => 'field_56d76f829a6b4',
			'label' => esc_html_x('Make the first blog post big', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'big_latest',
			'type' => 'true_false',
			'instructions' => esc_html_x('Please mind that this adds an extra post to the first page of the blog. E.g., if you have 10 set in WP Admin > Settings > Reading > \'Blog pages show at most\',
there will be 11 posts shown on the first blog page if this checkbox is checked. This
helps keep the layout consistent.', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_56d573012a1a7',
						'operator' => '!=',
						'value' => 'list',
					),
				),
			),
			'wrapper' => array (
				'width' => 50,
				'class' => '',
				'id' => '',
			),
		),
		array (
			'default_value' => 1,
			'message' => esc_html_x('Enable', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
			'key' => 'field_5890efe3ef5aa',
			'label' => esc_html_x('Fallback excerpts', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'automatic_excerpts',
			'type' => 'true_false',
			'instructions' => esc_html_x('If enabled, post excerpts will be displayed on archive pages even when there are no \'read more\' blocks, or explicitly provided excerpts. For aesthetic and content-engagement purposes it\'s highly recommended to create excerpts manually.', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'default_value' => 30,
			'instructions' => esc_html_x('If left blank, defaults to 30.', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'min' => 10,
			'max' => 500,
			'step' => 1,
			'placeholder' => 30,
			'prepend' => '',
			'append' => '',
			'key' => 'field_588f5581dae55',
			'label' => esc_html_x('Fallback excerpts length (words)', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'excerpts_length',
			'type' => 'number',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5890efe3ef5aa',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'default_value' => 0,
			'message' => '',
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
			'key' => 'field_58568e322edf9',
			'label' => esc_html_x('Show Instagram feed', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'show_instagram_feed',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'default_value' => '1236657.1677ed0.a1d49e5be45046c98447636dfa3d9e34',
			'maxlength' => '',
			'placeholder' => esc_html_x('paste your access token here', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'prepend' => '',
			'append' => '',
			'key' => 'field_58593aa4ece37',
			'label' => esc_html_x('Instagram Access Token', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'instagram_access_token',
			'type' => 'text',
			'instructions' => esc_html_x('An access token provides a secure way for a website to ask Instagram to serve photos.', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist') . '<br/><br/>
<a target="_blank" href="http://mauer.co/ig"><b>' . esc_html_x('Get Token', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist') . '&rarr;</b></a><br/><br/>',
			'required' => 1,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_58568e322edf9',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'default_value' => esc_html_x('Theme by <a href="http://mauer.co">Mauer Themes</a>', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'maxlength' => '',
			'placeholder' => esc_html_x('Theme by <a href="http://mauer.co">Mauer Themes</a>', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'prepend' => '',
			'append' => '',
			'key' => 'field_56a4d6ea411ca',
			'label' => esc_html_x('Copyright text', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'copyright_text',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'default_value' => 1,
			'message' => '',
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
			'key' => 'field_56a4d85c7fd27',
			'label' => esc_html_x('Include year in the copyright', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'copyright_include_year',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'default_value' => '',
			'min' => 1000,
			'max' => 3000,
			'step' => 1,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'key' => 'field_56a4d88e99942',
			'label' => esc_html_x('Copyright year', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'copyright_year',
			'type' => 'number',
			'instructions' => esc_html_x('If you insert the current year, it will be displayed as is. If you insert a past year, it will be displayed with the current year like so: "2013–2017". If left blank, will always display the current year.', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_56a4d85c7fd27',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'default_value' => 1,
			'message' => '',
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
			'key' => 'field_94gf50sd0ff78',
			'label' => esc_html_x('Keep Jetpack Image CDN disabled (recommended)', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'keep_photon_off',
			'type' => 'true_false',
			'instructions' => esc_html_x('This forces Jetpack Photon module to be off, by overriding the setting in "Jetpack" > "Settings" > "Serve images from our servers". Photon is known to cause issues with images such as overcompressing. It\'s recommended to have this checkbox checked.', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
		array (
			'default_value' => 1,
			'message' => '',
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
			'key' => 'field_49gf50sd0ffaa',
			'label' => esc_html_x('Individual images sharing', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'name' => 'share_from_lightbox',
			'type' => 'true_false',
			'instructions' => esc_html_x('Share individual images from lightbox view.', 'from included ACF fields (includes/acf-fields.php)', 'mauer-essentialist'),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'mauer-theme-options',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'field',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;

?>