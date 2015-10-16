<?php

namespace AU\NotificationsEmailDisable;

$url = elgg_get_site_url() . 'ajax/view/notifications_email_disable/acknowledge';

echo elgg_view('output/url', array(
	'text' => '#',
	'href' => $url,
	'class' => 'hidden notifications-email-disable elgg-lightbox'
));
