<!DOCTYPE html>
<html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
 <!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 

 	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>
			<?php if(is_home() || is_front_page()){
			bloginfo('description');
			echo(" | ");
			bloginfo('name');
		}else{
			 wp_title(' | ', true, 'right'); ?> <?php bloginfo('name');
		}?>
		</title>
		<meta name="city"  content="Minneapolis">     
		<meta name="state"  content="MN">     
		<meta name="geo.placename"  content="Minneapolis, MN">     
		<meta name="geo.region"  content="US-MN">
		<meta name="description" content="">
		<meta name="author" content="">
  		<meta name="viewport" content="width=device-width, initial-scale=1.0">
   		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/assets/css/mobile.css" media="only screen and  (max-width: 479px)">
		<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/assets/css/print.css" media="print">
 		
		<!-- Favicon and Apple Touch Icon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">
		<link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
		
		
		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
 		<?php wp_head(); ?>
        
	</head>
	<body <?php body_class(); ?>>
    	 <header>
 			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
 		<p><?php bloginfo('description'); ?></p>
 		
 		
 	 