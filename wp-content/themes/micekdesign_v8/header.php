<!DOCTYPE html>
<html class="no-js">
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
		<meta name="description" content="Chris Micek's Portfolio">
		<meta name="author" content="Chris Micek">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	  <script type='text/javascript' src='<?php bloginfo('template_directory') ?>/assets/js/modernizr.js?'></script>
		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/responsive.css" type="text/css" media="screen" />
				
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
 		
 		<script type="text/javascript">
 		
 		  var _gaq = _gaq || [];
 		  _gaq.push(['_setAccount', 'UA-1305434-1']);
 		  _gaq.push(['_trackPageview']);
 		
 		  (function() {
 		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
 		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
 		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
 		  })();
 		
 		</script>
 		<?php wp_head();
 		$queryVar = '';
 		if(isset($_GET['v'])){
 		   $queryVar = '?v='.$_GET['v'];
 		}
 		 ?>
        
	</head>
	<body <?php body_class(); ?>>
	
	  <header>
	    <a href="<?php echo(get_bloginfo('url')). $queryVar?>" title="Home Page"><h1>Chris micek</h1>
	      <h2>UX/UI designer, front-end developer, and wordpress developer</h2></a>
	  </header>
      		
 	 