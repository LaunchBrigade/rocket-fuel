<?php

$dir_path = trailingslashit( get_template_directory() . '/library' );
require_once( $dir_path . 'class-tgm-plugin-activation.php' ); // TGM_Plugin_Activation
require_once( $dir_path . 'class-navbar-walker.php' ); // Navbar_Walker

class RFuel {

	/**
	 * Theme setup
	 */
	public function setup() {
		// Add Theme support
		add_theme_support( 'html5' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );

		// Register plugins
		add_action( 'tgmpa_register', array( $this, 'register_plugins' ) );

		// Scripts and styles
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		// Menus
		add_action( 'init', array( $this, 'register_menus' ) );

		// Widget Areas
		add_action( 'widgets_init', array( $this, 'register_sidebars' ) );
		add_action( 'wp', array( $this, 'sidebars_template_home' ) );

		// Head Actions
		add_action( "rfuel_html", array( $this, 'get_html_tag' ) );
		add_action( "rfuel_head_meta", array( $this, 'get_meta' ) );
		add_filter( 'body_class', array( $this, 'add_body_class_sidebar' ) );

		// Header Actions
		add_action( "rfuel_header", array( $this, 'get_header_nav' ) );

		// Content Actions
		add_action( "rfuel_loop_before", array( $this, 'get_archive_header' ) );
		add_action( "rfuel_loop_after", array( $this, 'get_pagination' ) );
		add_action( "rfuel_content_after", array( $this, 'get_sidebar_primary' ) );

		// Footer Actions
		add_action( "rfuel_footer", array( $this, 'get_sidebar_subsidiary' ) );
		add_action( "rfuel_footer", array( $this, 'get_footer_bottom' ) );
	}

	/**
	 * Is sidebar registered and active
	 * @param  string  $id ID name of sidebar
	 * @return boolean     True = registered and active
	 */
	private function is_active_sidebar( $id ) {
		global $wp_registered_sidebars;

		if ( array_key_exists( $id, $wp_registered_sidebars ) && is_active_sidebar( $id ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Tegister plugins with TGMPA
	 */
	public function register_plugins() {
		$plugins = array(
			array(
				'name' => 'Developer',
				'slug' => 'developer',
				'required' => false
			)
		);

		$config = array();

		tgmpa( $plugins, $config );
	}

	/**
	 * Enqueue scripts & styles
	 */
	public function enqueue_scripts() {
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		wp_enqueue_style( 'app', get_template_directory_uri().'/assets/css/app.css', false, '1.0.0', 'all' );
		wp_enqueue_script( 'foundation-modernizr', get_template_directory_uri().'/bower_components/foundation/js/vendor/modernizr.js', false, '', false );
		wp_enqueue_script( 'foundation-fastclick', get_template_directory_uri().'/bower_components/foundation/js/vendor/fastclick.js', false, '', true );
		wp_enqueue_script( 'foundation', get_template_directory_uri().'/bower_components/foundation/js/foundation.min.js', false, '', true );
		wp_enqueue_script( 'main', get_template_directory_uri().'/assets/js/main.js', array('foundation'), '1.0.0', true );
	}

	/**
	 * Register WP menus
	 */
	public function register_menus() {
		register_nav_menu( 'primary', 'Primary' );
	}

	/**
	 * Register WP widget sidebars
	 */
	public function register_sidebars() {
		// Primary
		register_sidebar(array(
			'name'          => 'Primary',
			'id'            => 'primary',
			'description'   => 'Main widget-area aside content.',
			'class'         => 'aside widgets',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		));

		// Subsidiary
		register_sidebar(array(
			'name'          => 'Subsidiary',
			'id'            => 'subsidiary',
			'description'   => 'Footer widget-area content.',
			'class'         => 'subsidiary widgets',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		));
	}

	public function sidebars_template_home() {
		if ( is_page_template( 'templates/home.php' ) ) {
			unregister_sidebar( 'primary' );
		}
	}

	public function get_html_tag() {
		get_template_part('partials/html');
	}

	public function get_meta() {
		get_template_part('partials/head', 'meta');
	}

	public function add_body_class_sidebar( $classes ) {
		if ( $this->is_active_sidebar( 'primary' ) ) {
			$classes[] = 'aside-primary';
		}

		if ( $this->is_active_sidebar( 'subsidiary' ) ) {
			$classes[] = 'aside-subsidiary';
		}

		return $classes;
	}

	public function get_header_nav() {
		get_template_part( 'partials/header', 'nav' );
	}

	public function get_archive_header() {
		if ( is_archive() ) {
			get_template_part('partials/archive', 'header');
		}
	}

	public function get_pagination() {
		if ( get_previous_posts_link() or get_next_posts_link() ) {
			get_template_part( 'partials/loop', 'pagination' );
		}
	}

	public function get_sidebar_primary() {
		if ( $this->is_active_sidebar( 'primary' ) ) {
			get_sidebar( 'primary' );
		}
	}

	public function get_sidebar_subsidiary() {
		if ( $this->is_active_sidebar( 'subsidiary' ) ) {
			get_sidebar( 'subsidiary' );
		}
	}

	public function get_footer_bottom() {
		get_template_part( 'partials/footer', 'bottom' );
	}

	/**
	 * Get content template for archive based on post-type.
	 * @global $post
	 */
	public function get_archive_content() {
		$post_type = get_post_type();
		get_template_part( 'content', $post_type );
	}

	public function get_navbar_menu() {
		$args = array(
			'theme_location' => 'primary',    // where it's located in the theme
			'container' => false,             // remove menu container
			'container_class' => '',          // class of container
			'menu' => '',                     // menu name
			'menu_class' => '',               // adding custom nav class
			'before' => '',                   // before each link <a>
			'after' => '',                    // after each link </a>
			'link_before' => '',              // before each link text
			'link_after' => '',               // after each link text
			'depth' => 3,                     // limit the depth of the nav
			'fallback_cb' => false,           // fallback function (see below)
			'walker' => new Navbar_Walker()   // walker to customize menu
		);

		wp_nav_menu($args);
	}
}
