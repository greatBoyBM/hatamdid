<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Plugin compatibility for Smush
 *
 * @since 3.17.1
 *
 * @link https://wordpress.org/plugins/wp-smushit/
 */
class ET_Builder_Plugin_Compat_Smush extends ET_Builder_Plugin_Compat_Base {
	/**
	 * Constructor
	 */
	public function __construct() {
		$this->plugin_id = $this->_get_plugin_id();
		$this->init_hooks();
	}

	/**
	 * Get the currently activated plugin id as the FREE and PRO versions are separate plugins.
	 *
	 * @since ??
	 *
	 * @return string
	 */
	protected function _get_plugin_id() {
		if ( ! function_exists( 'is_plugin_active' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$pro  = 'wp-smush-pro/wp-smush.php';
		$free = 'wp-smushit/wp-smush.php';

		return is_plugin_active( $pro ) ? $pro : $free;
	}

	/**
	 * Hook methods to WordPress
	 *
	 * Latest plugin version: 1601
	 *
	 * @return void
	 */
	public function init_hooks() {
		// Bail if there's no version found
		if ( ! $this->get_plugin_version() ) {
			return;
		}

		$enabled = array(
			// phpcs:disable WordPress.Security.NonceVerification.NoNonceVerification
			'vb'  => et_()->array_get( $_GET, 'et_fb' ),
			'bfb' => et_()->array_get( $_GET, 'et_bfb' ),
			'tb'  => et_()->array_get( $_GET, 'et_tb' ),
			// phpcs:enable
		);

		add_filter( 'wp_smush_should_skip_parse', array( $this, 'maybe_skip_parse' ), 11 );

		if ( $enabled['vb'] || $enabled['bfb'] || $enabled['tb'] ) {
			// Plugin's `enqueue` function will cause a PHP notice unless
			// early exit is forced using the following custom filter
			add_filter( 'wp_smush_enqueue', '__return_false' );

			$class = $this->get_smush_class();

			if ( ! empty( $class ) ) {
				$lazyload = call_user_func( array( $class, 'get_instance' ) )->core()->mod->lazy;

				remove_action( 'wp_enqueue_scripts', array( $lazyload, 'enqueue_assets' ) );
			}
		}
	}

	/**
	 * Disable Smush page parsing in VB.
	 *
	 * @param boolean $skip
	 *
	 * @return boolean
	 */
	public function maybe_skip_parse( $skip ) {
		if ( et_core_is_fb_enabled() ) {
			return true;
		}

		return $skip;
	}

	/**
	 * Get the base Smush class name.
	 *
	 * @since 4.0.3
	 *
	 * @return string
	 */
	public function get_smush_class() {
		$classes = array(
			'WP_Smush',
			// @since 3.3.0
			'Smush\\WP_Smush',
		);

		foreach ( $classes as $test ) {
			if ( class_exists( $test ) ) {
				return $test;
			}
		}

		return '';
	}
}

new ET_Builder_Plugin_Compat_Smush();
