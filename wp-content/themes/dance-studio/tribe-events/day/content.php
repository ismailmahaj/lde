<?php
/**
 * Day View Content
 * The content template for the day view. This template is also used for
 * the response that is returned on day view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/day/content.php
 *
 * @package TribeEventsCalendar
 * 
 * @cmsmasters_package 	Dance Studio
 * @cmsmasters_version 	1.0.0
 *
 */


if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<div id="tribe-events-content" class="tribe-events-list tribe-events-day">
	
	<!-- List Header -->
    <?php do_action( 'tribe_events_before_header' ); ?>
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
		
		<!-- List Title -->
		<?php do_action( 'tribe_events_before_the_title' ); ?>
		<h2 class="tribe-events-page-title"><?php echo tribe_get_events_title() ?></h2>
		<?php do_action( 'tribe_events_after_the_title' ); ?>
		
		<!-- Header Navigation -->
		<?php do_action( 'tribe_events_before_header_nav' ); ?>
		<?php tribe_get_template_part( 'day/nav' ); ?>
		<?php do_action( 'tribe_events_after_header_nav' ); ?>
		
	</div><!-- #tribe-events-header -->
	<?php do_action( 'tribe_events_after_header' ); ?>
	
	<!-- Notices -->
	<?php tribe_the_notices() ?>
	
	<!-- Events Loop -->
	<?php if ( have_posts() ) : ?>
		<?php do_action( 'tribe_events_before_loop' ); ?>
		<?php tribe_get_template_part( 'day/loop' ) ?>
		<?php do_action( 'tribe_events_after_loop' ); ?>
	<?php endif; ?>

	<!-- List Footer -->
	<div id="tribe-events-footer">
		<?php do_action( 'tribe_events_before_footer' ); ?>
		<?php do_action( 'tribe_events_after_footer' ) ?>
	</div><!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->