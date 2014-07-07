<!doctype html>

<?php do_action('rfuel_html'); ?>

	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?></title>

		<?php do_action('rfuel_head_meta'); ?>

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

	</head>

	<body <?php body_class(); ?>>

		<?php do_action('rfuel_container_before'); ?>

		<div id="container">

			<?php do_action('rfuel_header_before'); ?>

			<header id="header" role="banner">

				<?php do_action('rfuel_header'); ?>

			</header> <!-- end header -->

			<?php do_action('rfuel_header_after'); ?>

			<main id="main">
				
				<?php do_action('rfuel_content_before'); ?>

				<div class="content">

					<?php do_action('rfuel_loop_before'); ?>