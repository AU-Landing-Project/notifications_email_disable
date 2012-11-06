<?php

$english = array(
	'email_disable' => "Email Disable",
	'notifications_email_disable' => "Disable Email Widget",
	'email_disable:widget:description' => "Disable email notifications for users with invalid addresses",
	'notifiactions_email_disable:instructions' => "Enter email addresses one per line and click submit.  Email notifications will be turned off for these users.  The users will be notified of the change on their next login, and a site message will be sent (if possible)",
	'notifications_email_disable:empty' => "You haven't entered any emails",
	'notifications_email_disable:disabled:notice' => "Your email notifications have been disabled as the email address on your account appears invalid.  Please update your email address on your settings page.  Once a valid address is entered you can re-enable email notifications.",
	'notifications_email_disable:invalid:emails' => "Some emails entered were not found in the system.  They have been left in the widget.  All emails that were found have had notifications disabled.",
	'notifications_email_disable:generic:error' => "An unknown error has occurred, notifications have not been disabled.",
	'notifications_email_disable:action:success' => "All affected users were found and email notifications disabled.",
	'notifications_email_disable:subject' => "Email notifications have been disabled",
);
					
add_translation("en",$english);
