<?php

class RfuelACF {

	private static $acf_json_path;
	private static $initiated = false;

	public static function init() {
		self::$acf_json_path = get_template_directory() . '/library/plugins/acf-fields';

		if ( ! self::$initiated ) {
			self::init_hooks();
		}
	}

	private static function init_hooks() {
		self::$initiated = true;

		if ( class_exists( 'acf' ) ) {
			acf_add_options_page();
		}

		add_filter('acf/settings/save_json', array( 'RfuelACF', 'acf_json_save_path' ) );
		add_filter('acf/settings/load_json', array( 'RfuelACF', 'acf_json_load_path' ) );
	}

	public static function acf_json_save_path( $path )
	{
		$path = self::$acf_json_path;
		return $path;
	}

	public static function acf_json_load_path( $paths )
	{
		$paths[0] = self::$acf_json_path;
		return $paths;
	}
}
