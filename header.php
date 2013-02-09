<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
  
	<div class="container">
		<div class="masthead">
			<h3 class="muted"><?php bloginfo( 'name' ); ?></h3>
			<div class="navbar">
				<div class="navbar-inner topper">
					<?php
						$args =  array(
								'theme_location'	=> 'header-nav',
								'container'			=> 'nav',
								'container_class'	=> 'container menu-{menu slug}-container', 
								'menu_class'		=> 'nav', 
								'echo'				=> true,
								'depth'				=> 1
						);
						// TODO: WTF isn't the ul getting the .nav class here...
						wp_nav_menu( $args );
					?>
				</div>
			</div><!-- /.navbar -->
		</div>
		
		<?php if ( is_front_page() ) { ?>
			<!-- Jumbotron -->
			<div class="jumbotron">
				<h1>Marketing stuff!</h1>
				<p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
				<a class="btn btn-large btn-success" href="#">Get started today</a>
			</div>

		<?php } ?>

		
		<hr>