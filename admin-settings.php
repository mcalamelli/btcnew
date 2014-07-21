<div class="wrap">
<?php if (function_exists('screen_icon')) { screen_icon();} ?>
<h2>BTCNew</h2>
<form method="post" action="options-general.php?page=btcnew">
<input type="hidden" name="control" value="1" />
<input type="hidden" name="<?php echo BTCNEW_API_KEY_OPTION; ?>" id="<?php echo BTCNEW_API_KEY_OPTION; ?>" value="<?php echo get_option(BTCNEW_API_KEY_OPTION); ?>" />
<p class="submit">
<?php if (!get_option(BTCNEW_ENABLED_OPTION)) { ?>
<input type="submit" name="Enable" class="button-primary" value="<?php _e('Enable', 'btcnew') ?>" />
<?php } else { ?>
<input type="submit" name="Disable" class="button-primary" value="<?php _e('Disable', 'btcnew') ?>" />
<?php } ?>
<span class="setting-description"><?php _e('Enabling BTCNew can import a <em>lot</em> of comments. If you\'re moderating your comments, make sure you don\'t have any in queue (otherwise we may bury your pending comments with ours)', 'btcnew') ?></span>
</p>
</form>
<form method="post" action="options-general.php?page=btcnew">
<h3><?php _e('Basic Settings', 'btcnew') ?></h3>
<table class="form-table">
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_API_KEY_OPTION; ?>"><?php _e('API Key', 'btcnew') ?></label></th>
<td><input type="input" name="<?php echo BTCNEW_API_KEY_OPTION; ?>" id="<?php echo BTCNEW_API_KEY_OPTION; ?>" value="<?php echo get_option(BTCNEW_API_KEY_OPTION); ?>" /> <?php _e('Grab your key <a href="http://www.backtype.com/developers" target="_blank">here','btcnew'); ?></a></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_COMMENT_SORT_OPTION; ?>"><?php _e('Comments sort', 'btcnew') ?></label></th>
<td><select name="<?php echo BTCNEW_COMMENT_SORT_OPTION; ?>" id="<?php echo BTCNEW_COMMENT_SORT_OPTION; ?>">
<option value="<?php echo 'mixed'; ?>"<?php if (get_option(BTCNEW_COMMENT_SORT_OPTION) == 'mixed') { ?> selected<?php } ?>><?php _e('Mixed','btcnew'); ?></option>
<option value="<?php echo 'end'; ?>"<?php if (get_option(BTCNEW_COMMENT_SORT_OPTION) == 'end') { ?> selected<?php } ?>><?php _e('Separate','btcnew'); ?></option>
</select> <span class="setting-description"><?php _e('Mix comments by timestamp or display all BackType Connect comments at the end of the comments section.', 'btcnew') ?></span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_SUMMARY_OPTION; ?>"><?php _e('Comments summary', 'btcnew') ?></label></th>
<td><input type="checkbox" name="<?php echo BTCNEW_SUMMARY_OPTION; ?>" id="<?php echo BTCNEW_SUMMARY_OPTION; ?>"<?php if (get_option(BTCNEW_SUMMARY_OPTION) == true) { ?> checked<?php } ?> />
<span class="setting-description"><?php _e('Include a summary of BackType Connect comments.', 'btcnew') ?></span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_MORE_COMMENTS_OPTION; ?>"><?php _e('Link to more comments', 'btcnew') ?></label></th>
<td><input type="checkbox" name="<?php echo BTCNEW_MORE_COMMENTS_OPTION; ?>" id="<?php echo BTCNEW_MORE_COMMENTS_OPTION; ?>"<?php if (get_option(BTCNEW_MORE_COMMENTS_OPTION) == true) { ?> checked<?php } ?> />
<span class="setting-description"><?php _e('Include a link to view more comments by an author.', 'btcnew') ?></span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_IGNORE_OWN_BLOG_OPTION; ?>"><?php _e('Ignore comments on my own blog', 'btcnew') ?></label></th>
<td><input type="checkbox" name="<?php echo BTCNEW_IGNORE_OWN_BLOG_OPTION; ?>" id="<?php echo BTCNEW_IGNORE_OWN_BLOG_OPTION; ?>"<?php if (get_option(BTCNEW_IGNORE_OWN_BLOG_OPTION) == true) { ?> checked<?php } ?> />
<span class="setting-description"><?php _e('Do not include connected conversations from my own blog.', 'btcnew') ?></span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_IGNORE_RETWEETS_OPTION; ?>"><?php _e('Ignore retweets', 'btcnew') ?></label></th>
<td><input type="checkbox" name="<?php echo BTCNEW_IGNORE_RETWEETS_OPTION; ?>" id="<?php echo BTCNEW_IGNORE_RETWEETS_OPTION; ?>"<?php if (get_option(BTCNEW_IGNORE_RETWEETS_OPTION) == true) { ?> checked<?php } ?> />
<span class="setting-description"><?php _e('Do not include retweets with no additional comment.', 'btcnew') ?></span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_MODERATION_OPTION; ?>"><?php _e('Before showing a comment', 'btcnew') ?></label></th>
<td><input type="checkbox" name="<?php echo BTCNEW_MODERATION_OPTION; ?>" id="<?php echo BTCNEW_MODERATION_OPTION; ?>"<?php if (get_option(BTCNEW_MODERATION_OPTION) == true) { ?> checked<?php } ?> />
<span class="setting-description"><?php _e('An administrator must always approve the comment.', 'btcnew') ?></span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_AKISMET_OPTION; ?>"><?php _e('Use Akismet', 'btcnew') ?></label></th>
<td><input type="checkbox" name="<?php echo BTCNEW_AKISMET_OPTION; ?>" id="<?php echo BTCNEW_AKISMET_OPTION; ?>"<?php if (get_option(BTCNEW_AKISMET_OPTION) == true) { ?> checked<?php } ?> />
<span class="setting-description"><?php _e('Use Akismet to test for spam (you probably don\'t need this).', 'btcnew') ?></span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_DEBUG_OPTION; ?>"><?php _e('Debug', 'btcnew') ?></label></th>
<td><input type="checkbox" name="<?php echo BTCNEW_DEBUG_OPTION; ?>" id="<?php echo BTCNEW_DEBUG_OPTION; ?>"<?php if (get_option(BTCNEW_DEBUG_OPTION) == true) { ?> checked<?php } ?> />
<span class="setting-description"><?php _e('Enable to debug the plugin (via btcnew_log file).', 'btcnew') ?></span></td>
</tr>
</table>
<h3><?php _e('Comment Sources', 'btcnew') ?></h3>
<p><?php printf(__('Specify which sources you would like BTCNew to display comments for:', 'btcnew')) ?></p>
<table class="form-table">
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_SRC_BLOG_OPTION; ?>"><?php _e('Blog Comments', 'btcnew') ?></label></th>
<td><select name="<?php echo BTCNEW_SRC_BLOG_OPTION; ?>" id="<?php echo BTCNEW_SRC_BLOG_OPTION; ?>">
<option value="<?php echo BTCNEW_OPTION_ENABLED; ?>"<?php if (get_option(BTCNEW_SRC_BLOG_OPTION) == BTCNEW_OPTION_ENABLED) { ?> selected<?php } ?>><?php _e('Enabled','btcnew'); ?></option>
<option value="<?php echo BTCNEW_OPTION_DISABLED; ?>"<?php if (get_option(BTCNEW_SRC_BLOG_OPTION) == BTCNEW_OPTION_DISABLED) { ?> selected<?php } ?>><?php _e('Disabled','btcnew'); ?></option>
</select></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_SRC_TWITTER_OPTION; ?>"><?php _e('Twitter', 'btcnew') ?></label></th>
<td><select name="<?php echo BTCNEW_SRC_TWITTER_OPTION; ?>" id="<?php echo BTCNEW_SRC_TWITTER_OPTION; ?>">
<option value="<?php echo BTCNEW_OPTION_ENABLED; ?>"<?php if (get_option(BTCNEW_SRC_TWITTER_OPTION) == BTCNEW_OPTION_ENABLED) { ?> selected<?php } ?>><?php _e('Enabled','btcnew'); ?></option>
<option value="<?php echo BTCNEW_OPTION_DISABLED; ?>"<?php if (get_option(BTCNEW_SRC_TWITTER_OPTION) == BTCNEW_OPTION_DISABLED) { ?> selected<?php } ?>><?php _e('Disabled','btcnew'); ?></option>
</select></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_SRC_FRIENDFEED_OPTION; ?>"><?php _e('FriendFeed', 'btcnew') ?></label></th>
<td><select name="<?php echo BTCNEW_SRC_FRIENDFEED_OPTION; ?>" id="<?php echo BTCNEW_SRC_FRIENDFEED_OPTION; ?>">
<option value="<?php echo BTCNEW_OPTION_ENABLED; ?>"<?php if (get_option(BTCNEW_SRC_FRIENDFEED_OPTION) == BTCNEW_OPTION_ENABLED) { ?> selected<?php } ?>><?php _e('Enabled','btcnew'); ?></option>
<option value="<?php echo BTCNEW_OPTION_DISABLED; ?>"<?php if (get_option(BTCNEW_SRC_FRIENDFEED_OPTION) == BTCNEW_OPTION_DISABLED) { ?> selected<?php } ?>><?php _e('Disabled','btcnew'); ?></option>
</select></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_SRC_DIGG_OPTION; ?>"><?php _e('Digg', 'btcnew') ?></label></th>
<td><select name="<?php echo BTCNEW_SRC_DIGG_OPTION; ?>" id="<?php echo BTCNEW_SRC_DIGG_OPTION; ?>">
<option value="<?php echo BTCNEW_OPTION_ENABLED; ?>"<?php if (get_option(BTCNEW_SRC_DIGG_OPTION) == BTCNEW_OPTION_ENABLED) { ?> selected<?php } ?>><?php _e('Enabled','btcnew'); ?></option>
<option value="<?php echo BTCNEW_OPTION_DISABLED; ?>"<?php if (get_option(BTCNEW_SRC_DIGG_OPTION) == BTCNEW_OPTION_DISABLED) { ?> selected<?php } ?>><?php _e('Disabled','btcnew'); ?></option>
</select></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_SRC_REDDIT_OPTION; ?>"><?php _e('Reddit', 'btcnew') ?></label></th>
<td><select name="<?php echo BTCNEW_SRC_REDDIT_OPTION; ?>" id="<?php echo BTCNEW_SRC_REDDIT_OPTION; ?>">
<option value="<?php echo BTCNEW_OPTION_ENABLED; ?>"<?php if (get_option(BTCNEW_SRC_REDDIT_OPTION) == BTCNEW_OPTION_ENABLED) { ?> selected<?php } ?>><?php _e('Enabled','btcnew'); ?></option>
<option value="<?php echo BTCNEW_OPTION_DISABLED; ?>"<?php if (get_option(BTCNEW_SRC_REDDIT_OPTION) == BTCNEW_OPTION_DISABLED) { ?> selected<?php } ?>><?php _e('Disabled','btcnew'); ?></option>
</select></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_SRC_YC_OPTION; ?>"><?php _e('Hacker News', 'btcnew') ?></label></th>
<td><select name="<?php echo BTCNEW_SRC_YC_OPTION; ?>" id="<?php echo BTCNEW_SRC_YC_OPTION; ?>">
<option value="<?php echo BTCNEW_OPTION_ENABLED; ?>"<?php if (get_option(BTCNEW_SRC_YC_OPTION) == BTCNEW_OPTION_ENABLED) { ?> selected<?php } ?>><?php _e('Enabled','btcnew'); ?></option>
<option value="<?php echo BTCNEW_OPTION_DISABLED; ?>"<?php if (get_option(BTCNEW_SRC_YC_OPTION) == BTCNEW_OPTION_DISABLED) { ?> selected<?php } ?>><?php _e('Disabled','btcnew'); ?></option>
</select></td>
</tr>
</table>
<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes', 'btcnew') ?>" />
</p>
</form>
</div>