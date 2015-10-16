<?php

namespace AU\NotificationsEmailDisable;

const PLUGIN_ID = 'notifications_email_disable';

elgg_register_event_handler('init', 'system', __NAMESPACE__ . '\\init');

function init() {
	elgg_extend_view('js/admin', 'notifications_email_disable/js/admin');

	elgg_register_widget_type('notifications_email_disable', elgg_echo("notifications_email_disable"), elgg_echo("email_disable:widget:description"), array('admin'));


	elgg_register_action('notifications_email_disable', __DIR__ . '/actions/disable.php', 'admin');
	elgg_register_action('notifications_email_disable/acknowledge', __DIR__ . '/actions/acknowledge.php');

	elgg_register_plugin_hook_handler('action', 'usersettings/save', __NAMESPACE__ . '\\usersettings_save');

	elgg_register_event_handler('pagesetup', 'system', __NAMESPACE__ . '\\pagesetup');

	elgg_register_ajax_view('notifications_email_disable/acknowledge');
}

/**
 * called on usersettings save action
 * 
 * @param type $hook
 * @param type $type
 * @param type $return
 * @param type $params
 * @return type
 */
function usersettings_save($hook, $type, $return, $params) {
	$guid = get_input('guid');
	$user = get_user($guid);

	if (!$user) {
		return $return;
	}

	if ($user->notifications_email_disabled) {
		$email = get_input('email');
		if ($user->email != $email && validate_email_address($email)) {
			// email is updated to something new
			$user->notifications_email_disabled = 0;
		}
	}
}

/**
 * Pagesetup
 */
function pagesetup() {
	if (!elgg_is_logged_in()) {
		return true;
	}
	
	$user = elgg_get_logged_in_user_entity();
	if (!$user->notifications_email_disabled) {
		return true;
	}
	
	// only display the message once
	// use system message so as not to overwrite other messages
	$system_message = elgg_get_plugin_setting('system_message', PLUGIN_ID);
	$lightbox = elgg_get_plugin_setting('lightbox', PLUGIN_ID);

	// no sense using lightbox AND system message - lightbox is very in your face
	// so use lightbox if set, otherwise use system message if set
	if ($lightbox == 'yes' && elgg_get_context() != 'settings') {
		elgg_load_js('lightbox');
		elgg_load_css('lightbox');
		elgg_require_js('notifications_email_disable');
		elgg_extend_view('page/elements/foot', 'notifications_email_disable/lightbox');
	} else {
		if ($system_message != 'no') {
			system_message(elgg_echo('notifications_email_disable:disabled:notice'));

			if ($lightbox != 'yes') {
				elgg_get_logged_in_user_entity()->notifications_email_disabled = 0;
			}
		}
	}
}
