<?php

define('BTCNEW_OFFSET_OPTION', 'btcnew_offset_option');
define('BTCNEW_OFFSET_ARG', 0);

require_once ABSPATH . 'wp-includes/compat.php';

/**
 * Install BackType Connect
 *
 * @uses	btcnew_register_plugin()
 * @uses	btcnew_default_options()
 *
 * @return	bool		True if successful
 */
function btcnew_do_install() {
	/*if (btcnew_register_plugin()) {
		btcnew_default_options(true);
		return true;
	}
	return false;*/
   add_option(BTCNEW_API_KEY_OPTION, __('enter key here','btcnew'));
   btcnew_default_options(true);
   return true;
}

/**
 * Uninstall BackType Connect
 *
 * @uses	btcnew_disable_plugin()
 * @uses	btcnew_db_clear_own_blog_comments()
 * @uses	btcnew_db_clear_retweets()
 * @uses	btcnew_db_clear_all_comment_type()
 * @uses	btcnew_db_clear_comment_counts()
 * @uses	btcnew_db_clear_comment_summary()
 * @uses	btcnew_db_clear_comments()
 */
function btcnew_do_uninstall() {
	require_once BTCNEW_DIR . '/db.php';
	btcnew_disable_plugin();
	delete_option(BTCNEW_API_KEY_OPTION);
	btcnew_db_clear_comments();
	btcnew_db_clear_comment_counts();
	btcnew_db_clear_comment_summary();
	btcnew_db_clear_own_blog_comments();
	btcnew_db_clear_retweets();
	btcnew_db_clear_all_comment_type('btcnew_' . BTCNEW_SRC_BLOG);
	btcnew_db_clear_all_comment_type('btcnew_' . BTCNEW_SRC_DIGG);
	btcnew_db_clear_all_comment_type('btcnew_' . BTCNEW_SRC_REDDIT);
	btcnew_db_clear_all_comment_type('btcnew_' . BTCNEW_SRC_FRIENDFEED);
	btcnew_db_clear_all_comment_type('btcnew_' . BTCNEW_SRC_YC);
	btcnew_db_clear_all_comment_type('btcnew_' . BTCNEW_SRC_TWITTER);
	btcnew_db_clear_posts();
}

/** TODO non serve
 * Register plugin
 *
 * @uses	_btcnew_url_open()
 * @uses	_btcnew_xml_unserialize()
 *
 * @return	bool	True if successful; false otherwise
 */
function btcnew_register_plugin() {
	$processed = false;
	$params = array('identifier' => 'btc', 'url' => get_option('siteurl'));
	btcnew_log('Registering plugin: ' . BTCNEW_API_REGISTER_URL . '?' . http_build_query($params, null, '&'), 'debug');
	if (!$contents = _btcnew_url_open(BTCNEW_API_REGISTER_URL . '?' . http_build_query($params, null, '&'))) {
		return false;
	}

	$xml = _btcnew_xml_unserialize($contents['body']);
	unset($contents);
	
	if (class_exists('SimpleXMLElement')) {
		if (!empty($xml->key)) {
			add_option(BTCNEW_API_KEY_OPTION, trim($xml->key));
			$processed = true;
		}
	} else {
		if (!empty($xml['feed']['key'])) {
			add_option(BTCNEW_API_KEY_OPTION, trim($xml['feed']['key']));
			$processed = true;
		}
	}
	return $processed;
}

/**
 * Schedule BackType API Calls
 */
function btcnew_enable_plugin() {
	$hour = date('H');
	$minute = date('i') % 5;
	$current_time = mktime($hour, $minute, 0);
	wp_schedule_event($current_time, 'hourly', 'btcnew_connect', array(BTCNEW_OFFSET_ARG => $minute + 0));
	wp_schedule_event($current_time + 60 * 5, 'hourly', 'btcnew_connect', array(BTCNEW_OFFSET_ARG => $minute + 5));
	wp_schedule_event($current_time + 60 * 10, 'hourly', 'btcnew_connect', array(BTCNEW_OFFSET_ARG => $minute + 10));
	wp_schedule_event($current_time + 60 * 15, 'hourly', 'btcnew_connect', array(BTCNEW_OFFSET_ARG => $minute + 15));
	wp_schedule_event($current_time + 60 * 20, 'hourly', 'btcnew_connect', array(BTCNEW_OFFSET_ARG => $minute + 20));
	wp_schedule_event($current_time + 60 * 25, 'hourly', 'btcnew_connect', array(BTCNEW_OFFSET_ARG => $minute + 25));
	wp_schedule_event($current_time + 60 * 30, 'hourly', 'btcnew_connect', array(BTCNEW_OFFSET_ARG => $minute + 30));
	wp_schedule_event($current_time + 60 * 35, 'hourly', 'btcnew_connect', array(BTCNEW_OFFSET_ARG => $minute + 35));
	wp_schedule_event($current_time + 60 * 40, 'hourly', 'btcnew_connect', array(BTCNEW_OFFSET_ARG => $minute + 40));
	wp_schedule_event($current_time + 60 * 45, 'hourly', 'btcnew_connect', array(BTCNEW_OFFSET_ARG => $minute + 45));
	wp_schedule_event($current_time + 60 * 50, 'hourly', 'btcnew_connect', array(BTCNEW_OFFSET_ARG => $minute + 50));
	wp_schedule_event($current_time + 60 * 55, 'hourly', 'btcnew_connect', array(BTCNEW_OFFSET_ARG => $minute + 55));
	add_option(BTCNEW_OFFSET_OPTION, $minute);
	update_option(BTCNEW_ENABLED_OPTION, true);
}

/**
 * Remove Scheduled BackType API Calls
 */
function btcnew_disable_plugin() {
	$minute = get_option(BTCNEW_OFFSET_OPTION);
	wp_clear_scheduled_hook('btcnew_connect', $minute + 0);
	wp_clear_scheduled_hook('btcnew_connect', $minute + 5);
	wp_clear_scheduled_hook('btcnew_connect', $minute + 10);
	wp_clear_scheduled_hook('btcnew_connect', $minute + 15);
	wp_clear_scheduled_hook('btcnew_connect', $minute + 20);
	wp_clear_scheduled_hook('btcnew_connect', $minute + 25);
	wp_clear_scheduled_hook('btcnew_connect', $minute + 30);
	wp_clear_scheduled_hook('btcnew_connect', $minute + 35);
	wp_clear_scheduled_hook('btcnew_connect', $minute + 40);
	wp_clear_scheduled_hook('btcnew_connect', $minute + 45);
	wp_clear_scheduled_hook('btcnew_connect', $minute + 50);
	wp_clear_scheduled_hook('btcnew_connect', $minute + 55);
	delete_option(BTCNEW_OFFSET_OPTION);
	update_option(BTCNEW_ENABLED_OPTION, false);
}

/**
 * BackType Connect default options
 *
 * @param	bool	$install	To specify use during installation
 * @return	mixed				If not on installation, array of options
 */
function btcnew_default_options($install=false) {
	if ($install) {
		if (get_option(BTCNEW_VERSION_OPTION)) {
			update_option(BTCNEW_VERSION_OPTION, BTCNEW_VERSION);
		} else {
			add_option(BTCNEW_VERSION_OPTION, BTCNEW_VERSION);
		}
		if (!get_option(BTCNEW_ENABLED_OPTION))
			add_option(BTCNEW_ENABLED_OPTION, false);
		if (!get_option(BTCNEW_COMMENT_SORT_OPTION))
			add_option(BTCNEW_COMMENT_SORT_OPTION, 'mixed');
		if (!get_option(BTCNEW_SUMMARY_OPTION))
			add_option(BTCNEW_SUMMARY_OPTION, true);
		if (!get_option(BTCNEW_MORE_COMMENTS_OPTION))
			add_option(BTCNEW_MORE_COMMENTS_OPTION, true);
		if (!get_option(BTCNEW_IGNORE_OWN_BLOG_OPTION))
			add_option(BTCNEW_IGNORE_OWN_BLOG_OPTION, true);
		if (!get_option(BTCNEW_IGNORE_RETWEETS_OPTION))
			add_option(BTCNEW_IGNORE_RETWEETS_OPTION, true);
		if (!get_option(BTCNEW_MODERATION_OPTION))
			add_option(BTCNEW_MODERATION_OPTION, (get_option('comment_moderation') == 1) ? true : false);
		if (!get_option(BTCNEW_AKISMET_OPTION))
			add_option(BTCNEW_AKISMET_OPTION, false);
		if (!get_option(BTCNEW_SRC_BLOG_OPTION))
			add_option(BTCNEW_SRC_BLOG_OPTION, 1);
		if (!get_option(BTCNEW_SRC_DIGG_OPTION))
			add_option(BTCNEW_SRC_DIGG_OPTION, 1);
		if (!get_option(BTCNEW_SRC_REDDIT_OPTION))
			add_option(BTCNEW_SRC_REDDIT_OPTION, 1);
		if (!get_option(BTCNEW_SRC_FRIENDFEED_OPTION))
			add_option(BTCNEW_SRC_FRIENDFEED_OPTION, 1);
		if (!get_option(BTCNEW_SRC_YC_OPTION))
			add_option(BTCNEW_SRC_YC_OPTION, 1);
		if (!get_option(BTCNEW_SRC_TWITTER_OPTION))
			add_option(BTCNEW_SRC_TWITTER_OPTION, 1);
		if (!get_option(BTCNEW_DEBUG_OPTION))
			add_option(BTCNEW_DEBUG_OPTION, false);
	} else {
		return array(BTCNEW_VERSION_OPTION => $btcnew_version,
			BTCNEW_ENABLED_OPTION => false,
			BTCNEW_COMMENT_SORT_OPTION => 'mixed',
			BTCNEW_SUMMARY_OPTION => true,
			BTCNEW_MORE_COMMENTS_OPTION => true,
			BTCNEW_IGNORE_OWN_BLOG_OPTION => true,
			BTCNEW_IGNORE_RETWEETS_OPTION => true,
			BTCNEW_MODERATION_OPTION => (get_option('comment_moderation') == 1) ? true : false,
			BTCNEW_AKISMET_OPTION => false,
			BTCNEW_SRC_BLOG_OPTION => 1,
			BTCNEW_SRC_DIGG_OPTION => 1,
			BTCNEW_SRC_REDDIT_OPTION => 1,
			BTCNEW_SRC_FRIENDFEED_OPTION => 1,
			BTCNEW_SRC_YC_OPTION => 1,
			BTCNEW_SRC_TWITTER_OPTION => 1,
			BTCNEW_DEBUG_OPTION => false
		);
	}
}
?>
