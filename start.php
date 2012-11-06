<?php

elgg_register_event_handler('init', 'system','email_disable_init');

function email_disable_init() {
  elgg_extend_view('js/admin', 'notifications_email_disable/js');
  elgg_register_widget_type('notifications_email_disable', elgg_echo("notifications_email_disable"), elgg_echo("email_disable:widget:description"), 'admin');
  elgg_register_action('notifications_email_disable', elgg_get_plugins_path() . 'notifications_email_disable/actions/disable.php', 'admin');
  
  if (elgg_is_logged_in()) {
	if (elgg_get_logged_in_user_entity()->notifications_email_disabled) {
	  // only display the message once
	  // use system message so as not to overwrite other messages
	  system_message(elgg_echo('notifications_email_disable:disabled:notice'));
	  elgg_get_logged_in_user_entity()->notifications_email_disabled = 0;
	}
  }
}