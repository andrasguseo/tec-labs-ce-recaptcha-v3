<?php
// Don't load directly
defined( 'WPINC' ) or die;

/**
 * Event Submission Form
 * The wrapper template for the event submission form.
 *
 * Override this template in your own theme by creating a file at
 * [your-theme]/tribe-events/community/modules/submit.php
 *
 * @link https://evnt.is/1ao4 Help article for Community Events & Tickets template files.
 *
 * @since    4.5
 * @since 4.8.2 Updated template link.
 *
 * @version 4.8.2
 */

$post_id = get_the_ID();

$events_label_singular = tribe_get_event_label_singular();

$recaptcha_key = tribe( 'community.main' )->getOption( 'recaptchaPublicKey', '' );

if ( tribe_is_event( $post_id ) ) {
	$button_label = sprintf( __( 'Update %s', 'tribe-events-community' ), $events_label_singular );
} else {
	$button_label = sprintf( __( 'Submit %s', 'tribe-events-community' ), $events_label_singular );
}
$button_label = apply_filters( 'tribe_community_event_edit_button_label', $button_label );

$recaptcha_theme = tribe( 'community.main' )->getOption( 'tec_labs_ce_recaptcha_v3_theme', 'light' );
?>

<div class="tribe-events-community-footer">
	<?php
	/**
	 * Allow developers to hook and add content to the beginning of this section
	 */
	do_action( 'tribe_events_community_section_before_submit' );
	?>

	<input
		type="submit"
		id="post"
		class="tribe-button submit events-community-submit g-recaptcha"
		value="<?php echo esc_attr( $button_label ); ?>"
		name="community-event"
		data-sitekey="<?php echo $recaptcha_key; ?>"
		data-callback="onSubmit"
		data-action="submit"
		data-theme="<?php echo $recaptcha_theme; ?>"
	/>

	<?php
	/**
	 * Allow developers to hook and add content to the end of this section
	 */
	do_action( 'tribe_events_community_section_after_submit' );
	?>
</div>


