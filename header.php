<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<title><?php bloginfo('name'); ?> <?php wp_title( '|' ); ?></title>

		<?php do_action('rfuel_head_meta'); ?>

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

	</head>

	<body <?php body_class(); ?>>

		<?php do_action('rfuel_container_before'); ?>

		<div id="container">

			<?php do_action('rfuel_header_before'); ?>

			<header class="header" role="banner">

				<?php do_action('rfuel_header'); ?>

			</header> <!-- end header -->

			<?php do_action('rfuel_header_after'); ?>
