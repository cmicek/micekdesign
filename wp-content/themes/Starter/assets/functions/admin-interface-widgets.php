<?php 


add_action('wp_dashboard_setup', 'ad_add_dashboard_widgets');

//Adds the custom dashboard widgets
function ad_add_dashboard_widgets(){
	wp_add_dashboard_widget('dashboard_right_now', 'Right Now', 'ad_right_now_widget');	   
 	wp_add_dashboard_widget('dashboard_help', 'Help', 'ad_dashboard_widget');
}

/* ============================================================================
Simple Example Widget to show us how its done
==============================================================================*/

function ad_dashboard_widget() {	 
 	echo "<p>Check out <a target='_blank' href='".  get_bloginfo('template_url') . "/Help/index.html'>the Help File</a>.</p> ";
}


/* ============================================================================
Customizes the Wordpress Right Now Widget to hide certain elements
==============================================================================*/
function ad_right_now_widget()
  	{
 		global $wp_registered_sidebars;
 	
 		$num_posts = wp_count_posts( 'post' );
 		$num_pages = wp_count_posts( 'page' );
 			$num_cats  = wp_count_terms('category');
 			$num_tags = wp_count_terms('post_tag');
 			$num_comm = wp_count_comments( );
 	
 		echo "\n\t".'<div class="table table_content">';
 		echo "\n\t".'<p class="sub">' . __('Content') . '</p>'."\n\t".'<table>';
 		echo "\n\t".'<tr class="first">';
 	
 		// Posts
 		$num = number_format_i18n( $num_posts->publish );
 		$text = _n( 'Post', 'Posts', intval($num_posts->publish) );
 		if ( current_user_can( 'edit_posts' ) ) {
 			$num = "<a href='edit.php'>$num</a>";
 			$text = "<a href='edit.php'>$text</a>";
 		}
 		echo '<td class="first b b-posts">' . $num . '</td>';
 		echo '<td class="t posts">' . $text . '</td>';
 	
 		echo '</tr><tr>';
 		  	
 		// Pages
 		$num = number_format_i18n( $num_pages->publish );
 		$text = _n( 'Page', 'Pages', $num_pages->publish );
 		if ( current_user_can( 'edit_pages' ) ) {
 			$num = "<a href='edit.php?post_type=page'>$num</a>";
 			$text = "<a href='edit.php?post_type=page'>$text</a>";
 		}
 		echo '<td class="first b b_pages">' . $num . '</td>';
 		echo '<td class="t pages">' . $text . '</td>';
 	
 		echo '</tr>';
 	
 		/* Categories
 		$num = number_format_i18n( $num_cats );
 		$text = _n( 'Category', 'Categories', $num_cats );
 		if ( current_user_can( 'manage_categories' ) ) {
 			$num = "<a href='edit-tags.php?taxonomy=category'>$num</a>";
 			$text = "<a href='edit-tags.php?taxonomy=category'>$text</a>";
 		}
 		echo '<tr>';
 		echo '<td class="first b b-cats">' . $num . '</td>';
 		echo '<td class="t cats">' . $text . '</td>';
  		echo '</tr>';
 		*/
 		/* Tags
 		$num = number_format_i18n( $num_tags );
 		$text = _n( 'Tag', 'Tags', $num_tags );
 		if ( current_user_can( 'manage_categories' ) ) {
 			$num = "<a href='edit-tags.php'>$num</a>";
 			$text = "<a href='edit-tags.php'>$text</a>";
 		}
 		echo('<tr>');
 		echo '<td class="first b b-tags">' . $num . '</td>';
 		echo '<td class="t tags">' . $text . '</td>';
  		echo "</tr>";
 		*/
 		
 		do_action('right_now_content_table_end');
 		echo "\n\t</table>\n\t</div>";
 	
 		/*
 		echo "\n\t".'<div class="table table_discussion">';
 		echo "\n\t".'<p class="sub">' . __('Discussion') . '</p>'."\n\t".'<table>';
 		echo "\n\t".'<tr class="first">';
 	
 		// Total Comments
 		$num = '<span class="total-count">' . number_format_i18n($num_comm->total_comments) . '</span>';
 		$text = _n( 'Comment', 'Comments', $num_comm->total_comments );
 		if ( current_user_can( 'moderate_comments' ) ) {
 			$num = '<a href="edit-comments.php">' . $num . '</a>';
 			$text = '<a href="edit-comments.php">' . $text . '</a>';
 		}
 		echo '<td class="b b-comments">' . $num . '</td>';
 		echo '<td class="last t comments">' . $text . '</td>';
 	
 		echo '</tr><tr>';
 	
 		// Approved Comments
 		$num = '<span class="approved-count">' . number_format_i18n($num_comm->approved) . '</span>';
 		$text = _nx( 'Approved', 'Approved', $num_comm->approved, 'Right Now' );
 		if ( current_user_can( 'moderate_comments' ) ) {
 			$num = "<a href='edit-comments.php?comment_status=approved'>$num</a>";
 			$text = "<a class='approved' href='edit-comments.php?comment_status=approved'>$text</a>";
 		}
 		echo '<td class="b b_approved">' . $num . '</td>';
 		echo '<td class="last t">' . $text . '</td>';
 	
 		echo "</tr>\n\t<tr>";
 	
 		// Pending Comments
 		$num = '<span class="pending-count">' . number_format_i18n($num_comm->moderated) . '</span>';
 		$text = _n( 'Pending', 'Pending', $num_comm->moderated );
 		if ( current_user_can( 'moderate_comments' ) ) {
 			$num = "<a href='edit-comments.php?comment_status=moderated'>$num</a>";
 			$text = "<a class='waiting' href='edit-comments.php?comment_status=moderated'>$text</a>";
 		}
 		echo '<td class="b b-waiting">' . $num . '</td>';
 		echo '<td class="last t">' . $text . '</td>';
 	
 		echo "</tr>\n\t<tr>";
 	
 		// Spam Comments
 		$num = number_format_i18n($num_comm->spam);
 		$text = _nx( 'Spam', 'Spam', $num_comm->spam, 'comment' );
 		if ( current_user_can( 'moderate_comments' ) ) {
 			$num = "<a href='edit-comments.php?comment_status=spam'><span class='spam-count'>$num</span></a>";
 			$text = "<a class='spam' href='edit-comments.php?comment_status=spam'>$text</a>";
 		}
 		echo '<td class="b b-spam">' . $num . '</td>';
 		echo '<td class="last t">' . $text . '</td>';
 	
 		echo "</tr>";
 		do_action('right_now_table_end');
 		do_action('right_now_discussion_table_end');
 		echo "\n\t</table>\n\t</div>";
 		*/
 		echo "\n\t".'<div class="versions">';
 		$ct = current_theme_info();
 	
 		echo "\n\t<p>";
 		if ( !empty($wp_registered_sidebars) ) {
 			$sidebars_widgets = wp_get_sidebars_widgets();
 			$num_widgets = 0;
 			foreach ( (array) $sidebars_widgets as $k => $v ) {
 				if ( 'wp_inactive_widgets' == $k )
 					continue;
 				if ( is_array($v) )
 					$num_widgets = $num_widgets + count($v);
 			}
 			$num = number_format_i18n( $num_widgets );
 	
 			$switch_themes = $ct->title;
 			if ( current_user_can( 'switch_themes') ) {
 				echo '<a href="themes.php" class="button rbutton">' . __('Change Theme') . '</a>';
 				$switch_themes = '<a href="themes.php">' . $switch_themes . '</a>';
 			}
 			if ( current_user_can( 'edit_theme_options' ) ) {
 				printf(_n('Theme <span class="b">%1$s</span> with <span class="b"><a href="widgets.php">%2$s Widget</a></span>', 'Theme <span class="b">%1$s</span> with <span class="b"><a href="widgets.php">%2$s Widgets</a></span>', $num_widgets), $switch_themes, $num);
 			} else {
 				printf(_n('Theme <span class="b">%1$s</span> with <span class="b">%2$s Widget</span>', 'Theme <span class="b">%1$s</span> with <span class="b">%2$s Widgets</span>', $num_widgets), $switch_themes, $num);
 			}
 		} else {
 			if ( current_user_can( 'switch_themes' ) ) {
 				echo '<a href="themes.php" class="button rbutton">' . __('Change Theme') . '</a>';
 				printf( __('Theme <span class="b"><a href="themes.php">%1$s</a></span>'), $ct->title );
 			} else {
 				printf( __('Theme <span class="b">%1$s</span>'), $ct->title );
 			}
 		}
 		echo '</p>';
 	
 		update_right_now_message();
 	
 		echo "\n\t".'<br class="clear" /></div>';
 		do_action( 'rightnow_end' );
 		do_action( 'activity_box_end' );
 	}		 
?>