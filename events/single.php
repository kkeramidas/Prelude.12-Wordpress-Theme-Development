<?php
/**
* A single event.  This displays the event title, description, meta, and 
* optionally, the Google map for the event.
*
* You can customize this view by putting a replacement file of the same name (single.php) in the events/ directory of your theme.
*/

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }
?>
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
<div class="back"><a href="<?php echo tribe_get_events_link(); ?>"><?php _e('&laquo; Back to Schedule', 'tribe-events-calendar'); ?></a></div>				
<div class="entry">
<?php
	$gmt_offset = (get_option('gmt_offset') >= '0' ) ? ' +' . get_option('gmt_offset') : " " . get_option('gmt_offset');
 	$gmt_offset = str_replace( array( '.25', '.5', '.75' ), array( ':15', ':30', ':45' ), $gmt_offset );
 	if (strtotime( tribe_get_end_date(get_the_ID(), false, 'Y-m-d G:i') . $gmt_offset ) <= time() ) { ?><div class="event-passed"><?php  _e('This event has passed.', 'tribe-events-calendar') ?></div><?php } ?>
<div id="tribe-events-event-meta" itemscope itemtype="http://schema.org/Event">
	<div class="event-meta event-meta-date"><meta itemprop="Date" content="<?php echo tribe_get_start_date( null, false, 'Y-m-d-h:i:s' ); ?>"/><?php echo tribe_get_start_date(null,false,'l, F j, Y'); ?></div>
	<div class="event-meta event-meta-time-place"><?php echo tribe_get_start_date(null,true,' '); ?> -<?php echo tribe_get_end_date(null,true,' ');  ?> | <?php echo tribe_get_venue( get_the_ID() ) ?></div>						
</div>
	<?php the_content() ?>
	<?php if (function_exists('tribe_get_ticket_form') && tribe_get_ticket_form()) { tribe_get_ticket_form(); } ?>		
</div>
<div class="navlink previous"><?php tribe_previous_event_link();?></div>
<div class="navlink next"><?php tribe_next_event_link();?></div>
<div style="clear:both"></div>
