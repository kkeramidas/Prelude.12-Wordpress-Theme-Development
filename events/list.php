<?php
/**
* The TEC template for a list of events. This includes the Past Events and Upcoming Events views 
* as well as those same views filtered to a specific category.
*
* You can customize this view by putting a replacement file of the same name (list.php) in the events/ directory of your theme.
*/

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }

?>
<div id="tribe-events-content" class="upcoming">

	<?php if(!tribe_is_day()): // day view doesn't have a grid ?>
		<div id='tribe-events-calendar-header' class="clearfix">
		<span class='tribe-events-calendar-buttons'> 
			<a class='tribe-events-button-on' href='<?php echo tribe_get_listview_link(); ?>'><?php _e('Event List', 'tribe-events-calendar')?></a>
			<a class='tribe-events-button-off' href='<?php echo tribe_get_gridview_link(); ?>'><?php _e('Calendar', 'tribe-events-calendar')?></a>
		</span>

		</div><!--tribe-events-calendar-header-->
	<?php endif; ?>
	<div id="tribe-events-loop" class="tribe-events-events post-list clearfix">
	
	<?php if (have_posts()) : ?>
	<?php $hasPosts = true; $first = true; ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php $day = date('j');
		$showdate = false;
		$datecount = 0;
		$eventday = tribe_get_start_date( $post->ID, false, 'j' );
		
		if ($eventday != $day){
			$day = $eventday;
			$showday = true;

		} //end if
	
		if ($datecount == 0 || $showday == true){
			$dayheader = '<h2 class="calendar-day">';
			$dayheader .= tribe_get_start_date( $post->ID, false, 'l, F j, Y' );
			$dayheader .= '</h2>';
			echo $dayheader;				
		} // endif
		
		$showday = false;
		$datecount = 1;
		?>
		<?php global $more; $more = false; ?>
		<div id="post-<?php the_ID() ?>" <?php post_class('tribe-events-event clearfix') ?> itemscope itemtype="http://schema.org/Event">
			<div id="tribe-events-list-event-meta" class="event-meta event-meta-time-place">
			<?php echo tribe_get_start_date(null,true,' '); ?> -<?php echo tribe_get_end_date(null,true,' ');  ?> | <?php echo tribe_get_venue( get_the_ID() ) ?></div>
			<?php the_title('<h2 class="entry-title" itemprop="name"><a href="' . tribe_get_event_link() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></h2>'); ?>
			<?php if (has_term('future-cinema','tribe_events_cat')){
				?><div class="future-cinema-category"><a href="<?php echo site_url();?>/discussions#future-cinema">The Future of the Cinema is the Stage</a></div>
				<?php
			}
			if (has_term('manifestos-2012','tribe_events_cat')){
				?><div class="manifestos-2012-category"><a href="<?php echo site_url();?>/discussions#manifestos-2012">Manifestos 2012</a></div>
				<?php
			}
			if (has_term('imitation-participation','tribe_events_cat')){
				?><div class="imitation-participation-category"><a href="<?php echo site_url();?>/discussions#imitation-participation">Imitation of Participation</a></div>
				<?php
			}
			if (has_term('return-of-singspiel','tribe_events_cat')){
				?><div class="return-of-singspiel-category"><a href="<?php echo site_url();?>/discussions#return-of-singspiel">The Return of the Singspiel</a></div>
				<?php
			}?>
			<div class="entry-content tribe-events-event-entry" itemprop="description">
				<?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) {?>
	 		        <?php the_post_thumbnail(); ?>
	        	<?php } ?>
				<?php if (has_excerpt ()): ?>
					<?php the_excerpt(); ?>
				<?php endif; ?>
			</div> <!-- End tribe-events-event-entry -->
		</div> <!-- End post -->
	<?php endwhile;// posts ?>
	<?php else :?>
		<?php 
			$tribe_ecp = TribeEvents::instance();
			if ( is_tax( $tribe_ecp->get_event_taxonomy() ) ) {
				$cat = get_term_by( 'slug', get_query_var('term'), $tribe_ecp->get_event_taxonomy() );
				if( tribe_is_upcoming() ) {
					$is_cat_message = sprintf(__(' listed under %s. Check out past events for this category or view the full calendar.','tribe-events-calendar'),$cat->name);
				} else if( tribe_is_past() ) {
					$is_cat_message = sprintf(__(' listed under %s. Check out upcoming events for this category or view the full calendar.','tribe-events-calendar'),$cat->name);
				}
			}
		?>
		<?php if(tribe_is_day()): ?>
			<?php printf( __('No events scheduled for <strong>%s</strong>. Please try another day.', 'tribe-events-calendar'), date_i18n('F d, Y', strtotime(get_query_var('eventDate')))); ?>
		<?php endif; ?>

		<?php if(tribe_is_upcoming()){ ?>
			<?php _e('No upcoming events', 'tribe-events-calendar');
			echo !empty($is_cat_message) ? $is_cat_message : ".";?>

		<?php }elseif(tribe_is_past()){ ?>
			<?php _e('No previous events' , 'tribe-events-calendar');
			echo !empty($is_cat_message) ? $is_cat_message : ".";?>
		<?php } ?>
		
	<?php endif; ?>


	</div><!-- #tribe-events-loop -->
	<div id="tribe-events-nav-below" class="tribe-events-nav clearfix">

		<div class="tribe-events-nav-previous"><?php 
		// Display Previous Page Navigation
		if( tribe_is_upcoming() && get_previous_posts_link() ) : ?>
			<?php previous_posts_link( '<span>'.__('&laquo; Previous Events', 'tribe-events-calendar').'</span>' ); ?>
		<?php elseif( tribe_is_upcoming() && !get_previous_posts_link( ) ) : ?>
			<a href='<?php echo tribe_get_past_link(); ?>'><span><?php _e('&laquo; Previous Events', 'tribe-events-calendar' ); ?></span></a>
		<?php elseif( tribe_is_past() && get_next_posts_link( ) ) : ?>
			<?php next_posts_link( '<span>'.__('&laquo; Previous Events', 'tribe-events-calendar').'</span>' ); ?>
		<?php endif; ?>
		</div>

		<div class="tribe-events-nav-next"><?php
		// Display Next Page Navigation
		if( tribe_is_upcoming() && get_next_posts_link( ) ) : ?>
			<?php next_posts_link( '<span>'.__('Next Events &raquo;', 'tribe-events-calendar').'</span>' ); ?>
		<?php elseif( tribe_is_past() && get_previous_posts_link( ) ) : ?>
			<?php previous_posts_link( '<span>'.__('Next Events &raquo;', 'tribe-events-calendar').'</span>' ); // a little confusing but in 'past view' to see newer events you want the previous page ?>
		<?php elseif( tribe_is_past() && !get_previous_posts_link( ) ) : ?>
			<a href='<?php echo tribe_get_upcoming_link(); ?>'><span><?php _e('Next Events &raquo;', 'tribe-events-calendar'); ?></span></a>
		<?php endif; ?>
		</div>

	</div>
	<?php if ( !empty($hasPosts) && function_exists('tribe_get_ical_link') ): ?>
		<a title="<?php esc_attr_e('iCal Import', 'tribe-events-calendar') ?>" class="ical" href="<?php echo tribe_get_ical_link(); ?>"><?php _e('iCal Import', 'tribe-events-calendar') ?></a>
	<?php endif; ?>
</div>
