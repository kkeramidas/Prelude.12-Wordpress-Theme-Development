<?php
/**
 * PRELUDE.12 Theme Functions
 *
 * This file's parent directory can be moved to the wp-content/themes directory 
 * to allow this Child theme to be activated in the Appearance - Themes section of the WP-Admin.
 *
 * Included are a set of constants that can be defined to customize aspects of Thematic's 
 * functionality, as well as a sample function that will add a home link to your menu.
 * "Uncomment" or add more to cusomize the functionality of your Child Theme.
 *
 * @package ThematicSampleChildTheme
 * @subpackage ThemeInit
 */


// Unleash the power of Thematic's dynamic classes
// 
// define('THEMATIC_COMPATIBLE_BODY_CLASS', true);
// define('THEMATIC_COMPATIBLE_POST_CLASS', true);

// Unleash the power of Thematic's comment form
//
define('THEMATIC_COMPATIBLE_COMMENT_FORM', true);

// Unleash the power of Thematic's feed link functions
//
// define('THEMATIC_COMPATIBLE_FEEDLINKS', true);


// Adds a home link to your menu
// http://codex.wordpress.org/Template_Tags/wp_page_menu
//function childtheme_menu_args($args) {
//    $args = array(
//        'show_home' => 'Home',
//        'sort_column' => 'menu_order',
//        'menu_class' => 'menu',
//        'echo' => false
//    );
//	return $args;
//}
//add_filter('wp_page_menu_args','childtheme_menu_args');

global $page;
global $post;

//Add Favicon

function childtheme_favicon() {
	$PRELUDEimagedir = get_stylesheet_directory_uri();
	$PRELUDEimagedir .= '/library/images/';?>
    <link rel="shortcut icon" href="<?php echo $PRELUDEimagedir ?>favicon.ico">
<?php }

add_action('wp_head', 'childtheme_favicon');



// Replace Blog Title with MESTC logo

function childtheme_override_blogtitle(){
		$PRELUDEimagedir = get_stylesheet_directory_uri();
		$PRELUDEimagedir .= '/library/images/';
		?>
	  	<div id="MESTC-Text"><a href="http://thesegalcenter.org" title="Martin E. Segal Theatre Center"><img
src="<?php echo $PRELUDEimagedir ?>PRELUDEMESTCText.png" height="23px" width="302px"></a></div>
	  	<div id="Prelude-logo"><a href="<?php echo home_url();?>" title="Prelude.12" rel="home"><img
src="<?php echo $PRELUDEimagedir ?>PRELUDE12HeaderLogo.png" height="43px" width="302px"></a></div>
	  	<div id="Prelude-Text"><img src="<?php echo $PRELUDEimagedir ?>PRELUDE12LogoText.png" height="43px" width="348px"></div>
	  	<div id="Prelude-Dates"><img src="<?php echo $PRELUDEimagedir ?>PRELUDE12Dates.png" height="28px" width="328px"></div> 
    <?php 
}

add_action('thematic_header','thematic_blogtitle',3);


// Assign Background image to Category Headerspace
function category_header_image(){ 
	$PRELUDEimagedir = get_stylesheet_directory_uri();
	$PRELUDEimagedir .= '/library/images/';
    if (is_page('index')){
	}
	else {
		if (in_category('about')) {
	        $headerimage = 'PRELUDEAboutHeader.png';
	    }
		elseif (in_category('artists')) {
	        $headerimage = 'PRELUDEArtistsHeader.png';
	    }
	    elseif (is_page('discussions' )) {
	        $headerimage = 'PRELUDEDiscussionsHeader.png';
	    }
	    elseif (tribe_is_event()) {
	        $headerimage = 'PRELUDEScheduleHeader.png';
	    }
	    elseif (is_page('directions' )) {
	        $headerimage = 'PRELUDEDirectionsHeader.png';
	    }
	    else {
	        $headerimage = 'PRELUDEBlogHeader.png';
	    }//end second level if
?>
	    <div id="headerimage" style="background: url('<?php echo $PRELUDEimagedir.$headerimage ?>') no-repeat">
	    </div>
    <?php 
	}
}
add_action('thematic_abovecontent','category_header_image',9);



/* IMPORTANT !
* This function registers the same custom post type as the The Events Calendar plugin
* http://wordpress.org/extend/plugins/the-events-calendar/
* This also registers WordPress' native categories and tags while associating them with the Events Calendar Plugin
*/
add_action( 'init', 'add_calendar_taxonomy', 0 );

function add_calendar_taxonomy() {

register_post_type('tribe_events',array( // Registers Events Calendar Custom Post Type

'taxonomies' => array('category') // This registers the native WordPress taxonomies with The Events Calendar

));

}

// Add category nicenames in body and post class

/**
 * Generates semantic classes for BODY element
 *
 * @param bool $print (default: true)
 */
function childtheme_override_body_class( $print = true ) {
		global $wp_query, $current_user, $blog_id, $post, $taxonomy;
	    
	    $c = array();
	
		if ( apply_filters('thematic_show_bc_wordpress', TRUE ) ) {
	        // It's surely a WordPress blog, right?
	        $c[] = 'wordpress';
	    }
	    
	    if ( apply_filters( 'thematic_show_bc_blogid', TRUE) ) {
	    	// Applies the blog id to BODY element .. blog-id1 for WordPress < 3.0
	    	$c[] = 'blogid-' . $blog_id;
	    }
	
		if ( apply_filters( 'thematic_show_bc_datetime', TRUE) ) {
	        // Applies the time- and date-based classes (below) to BODY element
	        thematic_date_classes( time(), $c );
	    }
	
	    if ( apply_filters( 'thematic_show_bc_contenttype', TRUE ) ) {
	        // Generic semantic classes for what type of content is displayed
	        is_front_page()  ? $c[] = 'home'       : null; // For the front page, if set
	        is_home()        ? $c[] = 'blog'       : null; // For the blog posts page, if set
	        is_archive()     ? $c[] = 'archive'    : null;
	        is_date()        ? $c[] = 'date'       : null;
	        is_search()      ? $c[] = 'search'     : null;
	        is_paged()       ? $c[] = 'paged'      : null;
	        is_attachment()  ? $c[] = 'attachment' : null;
	        is_404()         ? $c[] = 'four04'     : null; // CSS does not allow a digit as first character
	    }
	
	    if ( apply_filters( 'thematic_show_bc_singular', TRUE) ) {
	        // Special classes for BODY element when a singular post
	        if ( is_singular() ) {
	            $c[] = 'singular';
	        } else {
	            $c[] = 'not-singular';
	        }
	    }
	
		// Special classes for BODY element when a single post
		if ( is_single() && apply_filters( 'thematic_show_bc_singlepost', TRUE ) ) {
			$postID = $wp_query->post->ID;
			the_post();
	
	        // Adds post slug class, prefixed by 'slug-'
	        $c[] = 'slug-' . $wp_query->post->post_name;
	
			// Adds 'single' class and class with the post ID
			$c[] = 'single postid-' . $postID;
	
			// Adds classes for the month, day, and hour when the post was published
			if ( isset( $wp_query->post->post_date ) )
				thematic_date_classes( mysql2date( 'U', $wp_query->post->post_date ), $c, 's-' );
	
			// Adds category classes for each category on single posts
			if ( $cats = get_the_category() )
				foreach ( $cats as $cat )
					$c[] = 's-category-' . $cat->slug;

			// Adds tag classes for each tag on single posts
			if ( $tags = get_the_tags() )
				foreach ( $tags as $tag )
					$c[] = 's-tag-' . $tag->slug;

			// Adds taxonomy classes for each term on single posts
			$single_post_type = get_post_type_object( get_post_type( $post->ID ) );
			
			// Check for post types without taxonomy inclusion
			if ( isset( $single_post_type->taxonomy ) ) {
			    if ( $tax = get_the_terms( $post->ID, get_post_taxonomies() ) ) {
			    	foreach ( $tax as $term )   { 
			    		// Remove tags and categories from results
			    		if  ( $term->taxonomy != 'post_tag' )	{
			    			if  ( $term->taxonomy != 'category' )   { 
			    				$c[] = 's-tax-' . $term->taxonomy;
			    				$c[] = 's-' . $term->taxonomy . '-' . $term->slug;
			    			}
			    		}
			    	}
			    }
			}
			
			// Adds MIME-specific classes for attachments
			if ( is_attachment() ) {
				$mime_type = get_post_mime_type();
				$mime_prefix = array( 'application/', 'image/', 'text/', 'audio/', 'video/', 'music/' );
					$c[] = 'attachmentid-' . $postID . ' attachment-' . str_replace( $mime_prefix, "", "$mime_type" );
			}
	
			// Adds author class for the post author
			$c[] = 's-author-' . sanitize_title_with_dashes( strtolower( get_the_author_meta( 'user_nicename', $post->post_author ) ) );
			rewind_posts();
			
			// For posts with excerpts
			if ( has_excerpt() )
				$c[] = 's-has-excerpt';
				
			// For posts with comments open or closed
			if ( comments_open() ) {
				$c[] = 's-comments-open';		
			} else {
				$c[] = 's-comments-closed';
			}
		
			// For posts with pings open or closed
			if ( pings_open() ) {
				$c[] = 's-pings-open';
			} else {
				$c[] = 's-pings-closed';
			}
		
			// For password-protected posts
			if ( $post->post_password )
				$c[] = 's-protected';
		
			// For sticky posts
			if ( is_sticky() )
			   $c[] = 's-sticky';		
			
		}
	
		// Author name classes for BODY on author archives
		elseif ( is_author() && apply_filters( 'thematic_show_bc_authorarchives', TRUE ) ) {
			$author = $wp_query->get_queried_object();
			$c[] = 'author';
			$c[] = 'author-' . $author->user_nicename;
		}
	
		// Category name classes for BODY on category archvies
		elseif ( is_category() && apply_filters( 'thematic_show_bc_categoryarchives', TRUE ) ) {
			$cat = $wp_query->get_queried_object();
			$c[] = 'category';
			$c[] = 'category-' . $cat->slug;
		}
	
		// Tag name classes for BODY on tag archives
		elseif ( is_tag() && apply_filters('thematic_show_bc_tagarchives', TRUE ) ) {
			$tags = $wp_query->get_queried_object();
			$c[] = 'tag';
			$c[] = 'tag-' . $tags->slug;
		}
		
		// Taxonomy name classes for BODY on tag archives
		
		elseif ( is_tax() && apply_filters( 'thematic_show_bc_taxonomyarchives', TRUE) ) {
			$c[] = 'taxonomy';
			$c[] = 'tax-' . $taxonomy;
			$c[] = $taxonomy . '-' . strtolower(thematic_get_term_name());
		}
	
		// Page author for BODY on 'pages'
		elseif ( is_page() && apply_filters( 'thematic_show_bc_pages', TRUE ) ) {
			$pageID = $wp_query->post->ID;
			$page_children = wp_list_pages( "child_of=$pageID&echo=0" );
			the_post();
	
	        // Adds post slug class, prefixed by 'slug-'
	        $c[] = 'slug-' . $wp_query->post->post_name;
	
			$c[] = 'page pageid-' . $pageID;
			
			$c[] = 'page-author-' . sanitize_title_with_dashes( strtolower( get_the_author_meta( 'user_nicename', $post->post_author) ) );
			
			// Checks to see if the page has children and/or is a child page; props to Adam
			if ( $page_children )
				$c[] = 'page-parent';
			if ( $wp_query->post->post_parent )
				$c[] = 'page-child parent-pageid-' . $wp_query->post->post_parent;
				
			// For pages with excerpts
			if ( has_excerpt() )
				$c[] = 'page-has-excerpt';
				
			// For pages with comments open or closed
			if ( comments_open() ) {
				$c[] = 'page-comments-open';		
			} else {
				$c[] = 'page-comments-closed';
			}
		
			// For pages with pings open or closed
			if ( pings_open() ) {
				$c[] = 'page-pings-open';
			} else {
				$c[] = 'page-pings-closed';
			}
		
			// For password-protected pages
			if ( $post->post_password )
				$c[] = 'page-protected';			
				
			// Checks to see if the page is using a template	
			if ( is_page_template() & !is_page_template('default') )
				$c[] = 'page-template page-template-' . str_replace( '.php', '-php', get_post_meta( $pageID, '_wp_page_template', true ) );
			rewind_posts();
		}
	
		// Search classes for results or no results
		elseif ( is_search() && apply_filters( 'thematic_show_bc_search', TRUE ) ) {
			the_post();
			if ( $wp_query->found_posts > 0 ) {
				$c[] = 'search-results';
			} else {
				$c[] = 'search-no-results';
			}
			rewind_posts();
		}
	
		if ( apply_filters( 'thematic_show_bc_loggedin', TRUE ) ) {
	        // For when a visitor is logged in while browsing
	        if ( $current_user->ID )
	            $c[] = 'loggedin';
	    }
	
	 // Paged classes; for page x > 1 classes of index and all post types etc.
		if ( isset( $post ) && apply_filters( 'thematic_show_bc_pagex', TRUE ) ) {
			if ( ( ( ( $page = $wp_query->get( 'paged' ) ) || ( $page = $wp_query->get('page') ) ) && $page > 1 ) ) {
				// Thanks to Prentiss Riddle, twitter.com/pzriddle, for the security fix below. 
				$page = intval( $page ); // Ensures that an integer (not some dangerous script) is passed for the variable
 					$c[] = 'paged-' . $page;
 				if ( thematic_is_custom_post_type() ) {
 							$c[] = str_replace( '_','-',$post->post_type ) . '-paged-' . $page;
 					} elseif ( is_single() && $post->post_type=="post"  ) {
				        $c[] = 'single-paged-' . $page;
					} elseif ( is_page() ) {
				        $c[] = 'page-paged-' . $page;
					} elseif ( is_category() ) {
				        $c[] = 'category-paged-' . $page;
					} elseif ( is_tag() ) {
				        $c[] = 'tag-paged-' . $page;
					} elseif ( is_tax() ) {
				        $c[] = 'taxonomy-paged-' . $page;
					} elseif ( is_date() ) {
				        $c[] = 'date-paged-' . $page;
					} elseif ( is_author() ) {
				        $c[] = 'author-paged-' . $page;
					} elseif ( is_search() ) {
				        $c[] = 'search-paged-' . $page;
 				} 
 			// Paged classes; for page x = 1	For all post types
 			} elseif ( strpos( $post->post_content, '<!--nextpage-->') )  { 
 				if ( thematic_is_custom_post_type() ) {
				    	$c[] = str_replace( '_','-',$post->post_type ) . '-paged-1';
 				    } elseif (is_page()) {
				    	$c[] = 'page-paged-1';
 				    } elseif (is_single())  {
				    	$c[] = 'single-paged-1';
				}
  			}
  		}
		
		// Special Class if part of Events Calendar
		
		if (tribe_is_event() || tribe_is_venue()){
			$c[] = 'events-calendar';
		}
		
		// Add Category to Body Classes
		
		foreach((get_the_category($post->ID)) as $category)
		    $c[] = $category->category_nicename;
	
		// Separates classes with a single space, collates classes for BODY
		$c = join( ' ', apply_filters( 'thematic_body_class',  $c ) ); // Available filter: thematic_body_class
	
		// And tada!
		return $print ? print($c) : $c;
	}


// This generates the Calendar for the sidebar

function events_page_side_calendar () {
	$get_posts = tribe_get_events(
        array(
            'eventDisplay'=>'all',
    )
	);
?>
	<div id="calendar">
	<h1 class="sidecal-heading">Prelude.12 at a Glance</h3>
	<div class="events-sidecal-event">
	<?php

	$day = date('j');
	$showdate = false;
	$datecount = 0;

	foreach($get_posts as $eventpost) { 
		setup_postdata($eventpost);

	   	if (has_term('future-cinema','tribe_events_cat',$eventpost)) {
			$eventcal = 'future-cinema';
		}
		elseif (has_term('manifestos-2012','tribe_events_cat',$eventpost))  {
			$eventcal = 'manifestos-2012';
		}
		elseif (has_term('imitation-participation','tribe_events_cat',$eventpost))  {
			$eventcal = 'imitation-participation';
		}
		elseif (has_term('return-of-singspiel','tribe_events_cat',$eventpost)) {
			$eventcal = 'return-of-singspiel';
		}//endif
		
		$eventday = tribe_get_start_date( $eventpost->ID, false, 'j' );
		
		if ($eventday != $day){
			$day = $eventday;
			$showday = true;

		} //end if
	
		if ($datecount == 0 || $showday == true){
			$dayheader = '<h2 class="calendar-day">OCT. ';
			$dayheader .= $day;
			$dayheader .= '</h2>';
			echo $dayheader;				
		} // endif
		
		$showday = false;
		$datecount = 1;
		?>
		
        <div class="event-title"><div class="<?php echo $eventcal;?>"><a href="<?php echo get_permalink($eventpost->ID); ?>" id="post-<?php echo $eventpost->ID ?>"><?php echo get_the_title($eventpost->ID); ?></a></div></div>
<?php } //endforeach ?>

    </div>
	</div>
	<?php wp_reset_query();
}

add_action('thematic_belowmainasides', 'events_page_side_calendar', 1);