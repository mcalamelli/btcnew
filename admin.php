<?php

require_once ABSPATH . 'wp-includes/compat.php';

add_action('admin_menu', 'btcnew_admin_menu');

/**
 * Add BackType Connect menu pages
 */
function btcnew_admin_menu() {
	add_options_page('BTCNew', 'BTCNew', 8, 'btcnew', 'btcnew_settings_submenu');
}

/**
 * BackType Connect settings page
 *
 * @uses	btcnew_db_clear_comment_counts()
 * @uses	btcnew_db_get_own_blog_comments()
 * @uses	btcnew_db_get_retweets()
 * @uses	btcnew_db_update_filtered()
 * @uses	btcnew_db_update_ignored()
 * @uses	btcnew_disable_plugin()
 * @uses	btcnew_enable_plugin()
 * @uses	_btcnew_display_message()
 * @uses	_btcnew_url_open()
 */
function btcnew_settings_submenu() {
	if (!current_user_can('manage_options')) {
		die();
	}

	if (isset($_POST[BTCNEW_API_KEY_OPTION])) {	
		$error = false;
		$authenticated = true;
		$tries = 0;
		$processed = true;
      
      $btcnew_api_key = $_POST[BTCNEW_API_KEY_OPTION];
      if ($btcnew_api_key != get_option(BTCNEW_API_KEY_OPTION))
         update_option(BTCNEW_API_KEY_OPTION, $btcnew_api_key);
            
		if ($authenticated) {
			if ($_POST['control'] == 1) {
				require_once BTCNEW_DIR . '/install.php';
				if (get_option(BTCNEW_ENABLED_OPTION)) {
					btcnew_disable_plugin();
					_btcnew_display_message(__('BTCNew is now disabled.', 'btcnew'), 'success');
				} else {
					btcnew_enable_plugin();
					_btcnew_display_message(__('BTCNew is now enabled.', 'btcnew'),'success');
				}
			} else {
				require_once BTCNEW_DIR . '/db.php';
				$btcnew_comment_sort = (isset($_POST[BTCNEW_COMMENT_SORT_OPTION]) && in_array($_POST[BTCNEW_COMMENT_SORT_OPTION], array('mixed', 'end'))) ? $_POST[BTCNEW_COMMENT_SORT_OPTION] : 'mixed';
				$btcnew_summary = (isset($_POST[BTCNEW_SUMMARY_OPTION])) ? true : false;
				$btcnew_more_comments = (isset($_POST[BTCNEW_MORE_COMMENTS_OPTION])) ? true : false;
				$btcnew_ignore_own_blog = (isset($_POST[BTCNEW_IGNORE_OWN_BLOG_OPTION])) ? true : false;
				$btcnew_ignore_retweets = (isset($_POST[BTCNEW_IGNORE_RETWEETS_OPTION])) ? true : false;
				$btcnew_moderation = (isset($_POST[BTCNEW_MODERATION_OPTION])) ? true : false;
				$btcnew_akismet = (isset($_POST[BTCNEW_AKISMET_OPTION])) ? true : false;
				$btcnew_debug = (isset($_POST[BTCNEW_DEBUG_OPTION])) ? true : false;

				update_option(BTCNEW_COMMENT_SORT_OPTION, $btcnew_comment_sort);
				update_option(BTCNEW_SUMMARY_OPTION, $btcnew_summary);
				update_option(BTCNEW_MORE_COMMENTS_OPTION, $btcnew_more_comments);
				$clear_btc_counts = false;
				if ($btcnew_ignore_own_blog != get_option(BTCNEW_IGNORE_OWN_BLOG_OPTION)) {
					$clear_btc_counts = true;
					$btcnew_own_blog_comments = btcnew_db_get_own_blog_comments();
					btcnew_db_update_ignored($btcnew_ignore_own_blog, $btcnew_own_blog_comments);
					update_option(BTCNEW_IGNORE_OWN_BLOG_OPTION, $btcnew_ignore_own_blog);
				}
				if ($btcnew_ignore_retweets != get_option(BTCNEW_IGNORE_RETWEETS_OPTION)) {
					$clear_btc_counts = true;
					$btcnew_retweets = btcnew_db_get_retweets();
					btcnew_db_update_ignored($btcnew_ignore_retweets, $btcnew_retweets);
					update_option(BTCNEW_IGNORE_RETWEETS_OPTION, $btcnew_ignore_retweets);
				}
				update_option(BTCNEW_MODERATION_OPTION, $btcnew_moderation);
				update_option(BTCNEW_AKISMET_OPTION, $btcnew_akismet);
				update_option(BTCNEW_DEBUG_OPTION, $btcnew_debug);

				$options = array(BTCNEW_OPTION_DISABLED, BTCNEW_OPTION_ENABLED);
				$btcnew_src_blog = (isset($_POST[BTCNEW_SRC_BLOG_OPTION]) && in_array((int) $_POST[BTCNEW_SRC_BLOG_OPTION], $options)) ?
										(int) $_POST[BTCNEW_SRC_BLOG_OPTION] : BTCNEW_OPTION_DISABLED;
				$btcnew_src_digg = (isset($_POST[BTCNEW_SRC_DIGG_OPTION]) && in_array((int) $_POST[BTCNEW_SRC_DIGG_OPTION], $options)) ?
										(int) $_POST[BTCNEW_SRC_DIGG_OPTION] : BTCNEW_OPTION_DISABLED;
				$btcnew_src_reddit = (isset($_POST[BTCNEW_SRC_REDDIT_OPTION]) && in_array((int) $_POST[BTCNEW_SRC_REDDIT_OPTION], $options)) ?
										(int) $_POST[BTCNEW_SRC_REDDIT_OPTION] : BTCNEW_OPTION_DISABLED;
				$btcnew_src_friendfeed = (isset($_POST[BTCNEW_SRC_FRIENDFEED_OPTION]) && in_array((int) $_POST[BTCNEW_SRC_FRIENDFEED_OPTION], $options)) ?
										(int) $_POST[BTCNEW_SRC_FRIENDFEED_OPTION] : BTCNEW_OPTION_DISABLED;
				$btcnew_src_yc = (isset($_POST[BTCNEW_SRC_YC_OPTION]) && in_array((int) $_POST[BTCNEW_SRC_YC_OPTION], $options)) ?
										(int) $_POST[BTCNEW_SRC_YC_OPTION] : BTCNEW_OPTION_DISABLED;
				$btcnew_src_twitter = (isset($_POST[BTCNEW_SRC_TWITTER_OPTION]) && in_array((int) $_POST[BTCNEW_SRC_TWITTER_OPTION], $options)) ?
										(int) $_POST[BTCNEW_SRC_TWITTER_OPTION] : BTCNEW_OPTION_DISABLED;

				// update filters
				if ($btcnew_src_blog != get_option(BTCNEW_SRC_BLOG_OPTION)) {
					$clear_btc_counts = true;
					btcnew_db_update_filtered('btcnew_blog', $btcnew_src_blog);
					update_option(BTCNEW_SRC_BLOG_OPTION, $btcnew_src_blog);
				}
				if ($btcnew_src_digg != get_option(BTCNEW_SRC_DIGG_OPTION)) {
					$clear_btc_counts = true;
					btcnew_db_update_filtered('btcnew_digg', $btcnew_src_digg);
					update_option(BTCNEW_SRC_DIGG_OPTION, $btcnew_src_digg);
				}
				if ($btcnew_src_reddit != get_option(BTCNEW_SRC_REDDIT_OPTION)) {
					$clear_btc_counts = true;
					btcnew_db_update_filtered('btcnew_reddit', $btcnew_src_reddit);
					update_option(BTCNEW_SRC_REDDIT_OPTION, $btcnew_src_reddit);
				}
				if ($btcnew_src_friendfeed != get_option(BTCNEW_SRC_FRIENDFEED_OPTION)) {
					$clear_btc_counts = true;
					btcnew_db_update_filtered('btcnew_friendfeed', $btcnew_src_friendfeed);
					update_option(BTCNEW_SRC_FRIENDFEED_OPTION, $btcnew_src_friendfeed);
				}
				if ($btcnew_src_yc != get_option(BTCNEW_SRC_YC_OPTION)) {
					$clear_btc_counts = true;
					btcnew_db_update_filtered('btcnew_yc', $btcnew_src_yc);
					update_option(BTCNEW_SRC_YC_OPTION, $btcnew_src_yc);
				}
				if ($btcnew_src_twitter != get_option(BTCNEW_SRC_TWITTER_OPTION)) {
					$clear_btc_counts = true;
					btcnew_db_update_filtered('btcnew_twitter', $btcnew_src_twitter);
					update_option(BTCNEW_SRC_TWITTER_OPTION, $btcnew_src_twitter);
				}
				
				if ($clear_btc_counts) {
					btcnew_db_clear_comment_counts();
				}

				_btcnew_display_message(__('Settings updated.', 'btcnew'),'success');
			}
		}
		if ($error) {
			_btcnew_display_message(__($error), 'error');
		}
	}

	include(BTCNEW_DIR . '/admin-settings.php');
}
?>