<?php

class ET_Builder_Module_Fullwidth_Post_Title extends ET_Builder_Module {
	function init() {
		$this->name             = esc_html__( 'Fullwidth Post Title', 'et_builder' );
		$this->plural           = esc_html__( 'Fullwidth Post Titles', 'et_builder' );
		$this->slug             = 'et_pb_fullwidth_post_title';
		$this->vb_support       = 'on';
		$this->fullwidth        = true;
		$this->defaults         = array();
		$this->featured_image_background = true;
		$this->main_css_element = '%%order_class%%';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'elements'    => esc_html__( 'Elements', 'et_builder' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'text'       => array(
						'title'    => esc_html__( 'Text', 'et_builder' ),
						'priority' => 49,
					),
				),
			),
		);

		$this->advanced_fields = array(
			'borders'               => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element}.et_pb_featured_bg, {$this->main_css_element}",
							'border_styles' => "{$this->main_css_element}.et_pb_featured_bg, {$this->main_css_element}",
						),
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main' => ".et_pb_fullwidth_section {$this->main_css_element}.et_pb_post_title",
					'important' => 'all',
				),
			),
			'fonts'                 => array(
				'title' => array(
					'label'    => esc_html__( 'Title', 'et_builder' ),
					'use_all_caps' => true,
					'css'      => array(
						'main' => "{$this->main_css_element} .et_pb_title_container h1.entry-title, {$this->main_css_element} .et_pb_title_container h2.entry-title, {$this->main_css_element} .et_pb_title_container h3.entry-title, {$this->main_css_element} .et_pb_title_container h4.entry-title, {$this->main_css_element} .et_pb_title_container h5.entry-title, {$this->main_css_element} .et_pb_title_container h6.entry-title",
					),
					'header_level' => array(
						'default' => 'h1',
					),
				),
				'meta'   => array(
					'label'    => esc_html__( 'Meta', 'et_builder' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .et_pb_title_container .et_pb_title_meta_container, {$this->main_css_element} .et_pb_title_container .et_pb_title_meta_container a",
						'limited_main' => "{$this->main_css_element} .et_pb_title_container .et_pb_title_meta_container, {$this->main_css_element} .et_pb_title_container .et_pb_title_meta_container a, {$this->main_css_element} .et_pb_title_container .et_pb_title_meta_container span",
					),
				),
			),
			'background'            => array(
				'css' => array(
					'main' => "{$this->main_css_element}, {$this->main_css_element}.et_pb_featured_bg",
				),
			),
			'max_width'             => array(
				'css' => array(
					'module_alignment' => '.et_pb_fullwidth_section %%order_class%%.et_pb_post_title.et_pb_module',
				),
			),
			'text'                  => array(
				'options' => array(
					'text_orientation' => array(
						'default'          => 'left',
					),
				),
				'css' => array(
					'main' => implode(', ', array(
						'%%order_class%% .entry-title',
						'%%order_class%% .et_pb_title_meta_container',
					))
				)
			),
			'button'                => false,
		);

		$this->custom_css_fields = array(
			'post_title' => array(
				'label'    => esc_html__( 'Title', 'et_builder' ),
				'selector' => 'h1',
			),
			'post_meta' => array(
				'label'    => esc_html__( 'Meta', 'et_builder' ),
				'selector' => '.et_pb_title_meta_container',
			),
			'post_image' => array(
				'label'    => esc_html__( 'Featured Image', 'et_builder' ),
				'selector' => '.et_pb_title_featured_container',
			),
		);

		$this->help_videos = array(
			array(
				'id'   => esc_html( 'wb8c06U0uCU' ),
				'name' => esc_html__( 'An introduction to the Fullwidth Post Title module', 'et_builder' ),
			),
		);
	}

	function get_fields() {
		$fields = array(
			'title' => array(
				'label'             => esc_html__( 'Show Title', 'et_builder' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'configuration',
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'default_on_front'  => 'on',
				'toggle_slug'       => 'elements',
				'description'       => esc_html__( 'Here you can choose whether or not display the Post Title', 'et_builder' ),
				'mobile_options'    => true,
				'hover'             => 'tabs',
			),
			'meta' => array(
				'label'             => esc_html__( 'Show Meta', 'et_builder' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'configuration',
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'default_on_front'  => 'on',
				'affects'           => array(
					'author',
					'date',
					'categories',
					'comments',
				),
				'toggle_slug'       => 'elements',
				'description'       => esc_html__( 'Here you can choose whether or not display the Post Meta', 'et_builder' ),
				'mobile_options'    => true,
				'hover'             => 'tabs',
			),
			'author' => array(
				'label'             => esc_html__( 'Show Author', 'et_builder' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'configuration',
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'default_on_front'  => 'on',
				'depends_show_if'   => 'on',
				'toggle_slug'       => 'elements',
				'description'       => esc_html__( 'Here you can choose whether or not display the Author Name in Post Meta', 'et_builder' ),
				'mobile_options'    => true,
				'hover'             => 'tabs',
			),
			'date' => array(
				'label'             => esc_html__( 'Show Date', 'et_builder' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'configuration',
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'default_on_front'  => 'on',
				'depends_show_if'   => 'on',
				'affects'           => array(
					'date_format',
				),
				'toggle_slug'       => 'elements',
				'description'       => esc_html__( 'Here you can choose whether or not display the Date in Post Meta', 'et_builder' ),
				'mobile_options'    => true,
				'hover'             => 'tabs',
			),
			'date_format' => array(
				'label'             => esc_html__( 'Date Format', 'et_builder' ),
				'type'              => 'text',
				'option_category'   => 'configuration',
				'default_on_front'  => 'M j, Y',
				'depends_show_if'   => 'on',
				'toggle_slug'       => 'elements',
				'description'       => esc_html__( 'Here you can define the Date Format in Post Meta. Default is \'M j, Y\'', 'et_builder' ),
			),
			'categories' => array(
				'label'             => esc_html__( 'Show Post Categories', 'et_builder' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'configuration',
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'depends_show_if'   => 'on',
				'toggle_slug'       => 'elements',
				'description'       => esc_html__( 'Here you can choose whether or not display the Categories in Post Meta. Note: This option doesn\'t work with custom post types.', 'et_builder' ),
				'default_on_front'  => 'on',
				'mobile_options'    => true,
				'hover'             => 'tabs',
			),
			'comments' => array(
				'label'             => esc_html__( 'Show Comments Count', 'et_builder' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'configuration',
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'default_on_front'  => 'on',
				'depends_show_if'   => 'on',
				'toggle_slug'       => 'elements',
				'description'       => esc_html__( 'Here you can choose whether or not display the Comments Count in Post Meta.', 'et_builder' ),
				'mobile_options'    => true,
				'hover'             => 'tabs',
			),
			'featured_image' => array(
				'label'             => esc_html__( 'Show Featured Image', 'et_builder' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'configuration',
				'options'           => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'default_on_front'  => 'on',
				'affects'           => array(
					'featured_placement',
				),
				'toggle_slug'       => 'elements',
				'description'       => esc_html__( 'Here you can choose whether or not display the Featured Image', 'et_builder' ),
				'mobile_options'    => true,
				'hover'             => 'tabs',
			),
			'featured_placement' => array(
				'label'             => esc_html__( 'Featured Image Placement', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => array(
					'below'      => esc_html__( 'Below Title', 'et_builder' ),
					'above'      => esc_html__( 'Above Title', 'et_builder' ),
					'background' => esc_html__( 'Title/Meta Background Image', 'et_builder' ),
				),
				'default_on_front'  => 'below',
				'depends_show_if'   => 'on',
				'toggle_slug'       => 'elements',
				'description'       => esc_html__( 'Here you can choose where to place the Featured Image', 'et_builder' ),
			),
			'text_color' => array(
				'label'             => esc_html__( 'Text Color', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'color_option',
				'options'           => array(
					'dark'  => esc_html__( 'Dark', 'et_builder' ),
					'light' => esc_html__( 'Light', 'et_builder' ),
				),
				'default_on_front'  => 'dark',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'text',
				'hover'             => 'tabs',
				'description'       => esc_html__( 'Here you can choose the color for the Title/Meta text', 'et_builder' ),
			),
			'text_background' => array(
				'label'             => esc_html__( 'Use Text Background Color', 'et_builder' ),
				'type'              => 'yes_no_button',
				'option_category'   => 'color_option',
				'options'           => array(
					'off' => esc_html__( 'No', 'et_builder' ),
					'on'  => esc_html__( 'Yes', 'et_builder' ),
				),
				'default_on_front'  => 'off',
				'affects'           => array(
					'text_bg_color',
				),
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'text',
				'description'       => esc_html__( 'Here you can choose whether or not use the background color for the Title/Meta text', 'et_builder' ),
			),
			'text_bg_color' => array(
				'default'           => 'rgba(255,255,255,0.9)',
				'label'             => esc_html__( 'Text Background Color', 'et_builder' ),
				'description'       => esc_html__( "Pick a color to use behind the post title text. Reducing the color's opacity will allow the background image to show through while still increasing text readability.", 'et_builder' ),
				'type'              => 'color-alpha',
				'depends_show_if'   => 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'text',
				'hover'             => 'tabs',
				'mobile_options'    => true,
			),
		);

		return $fields;
	}

	public function get_transition_fields_css_props() {
		$fields = parent::get_transition_fields_css_props();

		$fields['text_color'] = array( 'color' => implode(', ', array(
			'%%order_class%% .entry-title',
			'%%order_class%% .et_pb_title_meta_container',
		)) );
		$fields['text_bg_color'] = array( 'background-color' => '%%order_class%% .et_pb_title_container' );

		return $fields;
	}

	function render( $attrs, $content = null, $render_slug ) {
		$multi_view         = et_pb_multi_view_options( $this );
		$date_format        = $this->props['date_format'];
		$featured_image     = $this->props['featured_image'];
		$featured_placement = $this->props['featured_placement'];
		$text_color         = $this->props['text_color'];
		$text_color_hover   = et_pb_hover_options()->get_value( 'text_color', $this->props );
		$text_background    = $this->props['text_background'];
		$header_level       = $this->props['title_level'];
		$text_bg_colors     = et_pb_responsive_options()->get_property_values( $this->props, 'text_bg_color' );
		$post_id            = get_the_ID();

		// display the shortcode only on singlular pages
		if ( ! is_singular() ) {
			$post_id = 0;
		}

		$output = '';
		$featured_image_output = '';
		$parallax_image_background = $this->get_parallax_image_background();

		if ( $post_id && $multi_view->has_value( 'featured_image', 'on' ) && ( 'above' === $featured_placement || 'below' === $featured_placement ) ) {
			// Largest featured image size is needed when featured image is used in "post" post type and full width layout
			$featured_image_size = 'post' === get_post_type() && 'et_full_width_page' === get_post_meta( get_the_ID(), '_et_pb_page_layout', true ) ? 'et-pb-post-main-image-fullwidth-large' : 'large';
			$featured_image_output = $multi_view->render_element( array(
				'tag'     => 'div',
				'content' => get_the_post_thumbnail( $post_id, $featured_image_size ),
				'attrs'   => array(
					'class' => 'et_pb_title_featured_container',
				),
				'visibility' => array(
					'featured_image' => 'on',
				),
				'required' => array(
					'featured_image' => 'on',
				),
			) );
		}

		if ( $multi_view->has_value( 'title', 'on' ) ) {
			if ( is_et_pb_preview() && isset( $_POST['post_title'] ) && wp_verify_nonce( $_POST['et_pb_preview_nonce'], 'et_pb_preview_nonce' ) ) {
				$post_title = esc_html( sanitize_text_field( wp_unslash( $_POST['post_title'] ) ) );
			} else {
				$post_title = esc_html( et_builder_get_current_title() );
			}

			$output .= $multi_view->render_element( array(
				'tag'     => et_pb_process_header_level( $header_level, 'h1' ),
				'content' => $post_title,
				'attrs'   => array(
					'class' => 'entry-title',
				),
				'visibility' => array(
					'title' => 'on',
				)
			) );
		}

		if ( $post_id && $multi_view->has_value( 'meta', 'on' ) ) {
			$meta_array = array();

			foreach( array( 'author', 'date', 'categories', 'comments' ) as $single_meta ) {
				if ( 'categories' === $single_meta && ! is_singular( 'post' ) ) {
					continue;
				}

				$meta_array[] = $multi_view->render_element( array(
					'content' => et_pb_postinfo_meta( array( $single_meta ), $date_format, esc_html__( '0 comments', 'et_builder' ), esc_html__( '1 comment', 'et_builder' ), '% ' . esc_html__( 'comments', 'et_builder' ) ),
					'classes' => array(
						'et_pb_title_meta_item--visible' => array(
							$single_meta => 'on',
							'meta'       => 'on',
						),
					),
					'visibility' => array(
						$single_meta => 'on',
						'meta'       => 'on',
					),
					'required' => array(
						$single_meta => 'on',
						'meta'       => 'on',
					),
				) );
			}

			$output .= $multi_view->render_element( array(
				'tag'     => 'p',
				'content' => implode( '', $meta_array ),
				'attrs'   => array(
					'class' => 'et_pb_title_meta_container',
				),
				'visibility' => array(
					'meta' => 'on',
				),
			) );
		}

		if ( 'on' === $text_background ) {
			// Text Background Color.
			et_pb_responsive_options()->generate_responsive_css( $text_bg_colors, '%%order_class%% .et_pb_title_container', 'background-color', $render_slug, '; padding: 1em 1.5em;', 'color' );

			if ( et_pb_hover_options()->is_enabled( 'text_bg_color', $this->props ) ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => '%%order_class%%:hover .et_pb_title_container',
					'declaration' => sprintf(
						'background-color: %1$s; padding: 1em 1.5em;',
						esc_html( et_pb_hover_options()->get_value( 'text_bg_color', $this->props ) )
					),
				) );
			}
		}

		$video_background  = $this->video_background();
		$background_layout = 'dark' === $text_color ? 'light' : 'dark';
		$data_background_layout = '';
		$data_background_layout_hover = '';

		if ( et_pb_hover_options()->is_enabled( 'text_color', $this->props ) && !empty( $text_color_hover ) && $text_color !== $text_color_hover ) {
			$data_background_layout = sprintf( ' data-background-layout="%1$s"', esc_attr( $text_color_hover ) );
			$data_background_layout_hover = sprintf( ' data-background-layout-hover="%1$s"', esc_attr( $text_color ) );
		}

		// Module classnames
		$this->add_classname( array(
			'et_pb_post_title',
			$this->get_text_orientation_classname(),
			"et_pb_bg_layout_{$background_layout}",
		) );

		if ( 'on' === $multi_view->get_value( 'featured_image' ) && 'background' === $featured_placement ) {
			$this->add_classname( 'et_pb_featured_bg' );
		}

		if ( 'above' === $featured_placement ) {
			$this->add_classname( 'et_pb_image_above' );
		}

		if ( 'below' === $featured_placement ) {
			$this->add_classname( 'et_pb_image_below' );
		}

		// Remove automatically added classnames
		$this->remove_classname( array(
			'et_pb_fullwidth_post_title',
		) );

		$muti_view_data_attr = $multi_view->render_attrs( array(
			'classes' => array(
				'et_pb_featured_bg' => array(
					'featured_image' => 'on',
					'featured_placement' => 'background',
				),
			),
		) );

		$output = sprintf(
			'<div%3$s class="%2$s" %8$s %9$s %10$s>
				%4$s
				%7$s
				%5$s
				<div class="et_pb_title_container">
					%1$s
				</div>
				%6$s
			</div>',
			$output,
			$this->module_classname( $render_slug ),
			$this->module_id(),
			$parallax_image_background,
			'on' === $featured_image && 'above' === $featured_placement ? $featured_image_output : '', // #5
			'on' === $featured_image && 'below' === $featured_placement ? $featured_image_output : '',
			$video_background,
			$data_background_layout,
			$data_background_layout_hover,
			et_core_esc_previously( $muti_view_data_attr ) // #10
		);

		return $output;
	}
}

new ET_Builder_Module_Fullwidth_Post_Title;
