<?php



	include ( "NexmoMessage.php" );


	/**
	 * To send a text message.
	 *
	 */

	// Step 1: Declare new NexmoMessage.
	$nexmo_sms = new NexmoMessage('816388d8', 'Fred3847');

	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	$info = $nexmo_sms->sendText( '+254717246969', 'MySMSapi', 'Hello!' );

	// Step 3: Display an overview of the message
	echo $nexmo_sms->displayOverview($info);

	// Done!

?>