<?php

namespace AU\NotificationsEmailDisable;

echo '<div class="notifications-email-disable-wrapper">';
echo elgg_echo('notifiactions_email_disable:instructions');

echo "<br><br>";

echo elgg_view('input/plaintext', array(
	'name' => 'invalid_emails',
	'class' => 'notifications-emails-value'
));

echo elgg_view('input/submit', array(
	'value' => elgg_echo('submit'),
	'class' => 'notifications-email-disable'
));
echo '</div>';

echo elgg_view('graphics/ajax_loader', array('class' => 'notifications-email-disable-throbber'));

if (!elgg_is_xhr()) {
	elgg_require_js('notifications_email_disable/admin');
	return;
}
?>
<script>
	require(['notifications_email_disable/admin']);
</script>