<div class="wrap">
<?php if (function_exists('screen_icon')) { screen_icon();} ?>
<h2>BTCNew</h2>
<form method="post" action="options-general.php?page=btcnew">
<input type="hidden" name="control" value="1" />
<input type="hidden" name="<?php echo BTCNEW_API_KEY_OPTION; ?>" id="<?php echo BTCNEW_API_KEY_OPTION; ?>" value="<?php echo get_option(BTCNEW_API_KEY_OPTION); ?>" />
<p class="submit">
<?php if (!get_option(BTCNEW_ENABLED_OPTION)) { ?>
<input type="submit" name="Enable" class="button-primary" value="<?php _e('Enable') ?>" />
<?php } else { ?>
<input type="submit" name="Disable" class="button-primary" value="<?php _e('Disable') ?>" />
<?php } ?>
<span class="setting-description"><?php _e('Enabling BTCNew can import a <em>lot</em> of comments. If you\'re moderating your comments, make sure you don\'t have any in queue (otherwise we may bury your pending comments with ours)') ?></span>
</p>
</form>
<form method="post" action="options-general.php?page=btcnew">
<h3><?php _e('Basic Settings') ?></h3>
<table class="form-table">
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_API_KEY_OPTION; ?>"><?php _e('API Key') ?></label></th>
<td><input type="input" name="<?php echo BTCNEW_API_KEY_OPTION; ?>" id="<?php echo BTCNEW_API_KEY_OPTION; ?>" value="<?php echo get_option(BTCNEW_API_KEY_OPTION); ?>" /> Grab your key <a href="http://www.backtype.com/developers" target="_blank">here</a></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_COMMENT_SORT_OPTION; ?>"><?php _e('Comments sort') ?></label></th>
<td><select name="<?php echo BTCNEW_COMMENT_SORT_OPTION; ?>" id="<?php echo BTCNEW_COMMENT_SORT_OPTION; ?>">
<option value="<?php echo 'mixed'; ?>"<?php if (get_option(BTCNEW_COMMENT_SORT_OPTION) == 'mixed') { ?> selected<?php } ?>>Mixed</option>
<option value="<?php echo 'end'; ?>"<?php if (get_option(BTCNEW_COMMENT_SORT_OPTION) == 'end') { ?> selected<?php } ?>>Separate</option>
</select> <span class="setting-description"><?php _e('Mix comments by timestamp or display all BackType Connect comments at the end of the comments section.') ?></span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_SUMMARY_OPTION; ?>"><?php _e('Comments summary') ?></label></th>
<td><input type="checkbox" name="<?php echo BTCNEW_SUMMARY_OPTION; ?>" id="<?php echo BTCNEW_SUMMARY_OPTION; ?>"<?php if (get_option(BTCNEW_SUMMARY_OPTION) == true) { ?> checked<?php } ?> />
<span class="setting-description"><?php _e('Include a summary of BackType Connect comments.') ?></span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_MORE_COMMENTS_OPTION; ?>"><?php _e('Link to more comments') ?></label></th>
<td><input type="checkbox" name="<?php echo BTCNEW_MORE_COMMENTS_OPTION; ?>" id="<?php echo BTCNEW_MORE_COMMENTS_OPTION; ?>"<?php if (get_option(BTCNEW_MORE_COMMENTS_OPTION) == true) { ?> checked<?php } ?> />
<span class="setting-description"><?php _e('Include a link to view more comments by an author.') ?></span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_IGNORE_OWN_BLOG_OPTION; ?>"><?php _e('Ignore comments on my own blog') ?></label></th>
<td><input type="checkbox" name="<?php echo BTCNEW_IGNORE_OWN_BLOG_OPTION; ?>" id="<?php echo BTCNEW_IGNORE_OWN_BLOG_OPTION; ?>"<?php if (get_option(BTCNEW_IGNORE_OWN_BLOG_OPTION) == true) { ?> checked<?php } ?> />
<span class="setting-description"><?php _e('Do not include connected conversations from my own blog.') ?></span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_IGNORE_RETWEETS_OPTION; ?>"><?php _e('Ignore retweets') ?></label></th>
<td><input type="checkbox" name="<?php echo BTCNEW_IGNORE_RETWEETS_OPTION; ?>" id="<?php echo BTCNEW_IGNORE_RETWEETS_OPTION; ?>"<?php if (get_option(BTCNEW_IGNORE_RETWEETS_OPTION) == true) { ?> checked<?php } ?> />
<span class="setting-description"><?php _e('Do not include retweets with no additional comment.') ?></span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_MODERATION_OPTION; ?>"><?php _e('Before showing a comment') ?></label></th>
<td><input type="checkbox" name="<?php echo BTCNEW_MODERATION_OPTION; ?>" id="<?php echo BTCNEW_MODERATION_OPTION; ?>"<?php if (get_option(BTCNEW_MODERATION_OPTION) == true) { ?> checked<?php } ?> />
<span class="setting-description"><?php _e('An administrator must always approve the comment.') ?></span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_AKISMET_OPTION; ?>"><?php _e('Use Akismet') ?></label></th>
<td><input type="checkbox" name="<?php echo BTCNEW_AKISMET_OPTION; ?>" id="<?php echo BTCNEW_AKISMET_OPTION; ?>"<?php if (get_option(BTCNEW_AKISMET_OPTION) == true) { ?> checked<?php } ?> />
<span class="setting-description"><?php _e('Use Akismet to test for spam (you probably don\'t need this).') ?></span></td>
</tr>
</table>
<h3><?php _e('Comment Sources') ?></h3>
<p><?php printf(__('Specify which sources you would like BTCNew to display comments for:')) ?></p>
<table class="form-table">
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_SRC_BLOG_OPTION; ?>"><?php _e('Blog Comments') ?></label></th>
<td><select name="<?php echo BTCNEW_SRC_BLOG_OPTION; ?>" id="<?php echo BTCNEW_SRC_BLOG_OPTION; ?>">
<option value="<?php echo BTCNEW_OPTION_ENABLED; ?>"<?php if (get_option(BTCNEW_SRC_BLOG_OPTION) == BTCNEW_OPTION_ENABLED) { ?> selected<?php } ?>>Enabled</option>
<option value="<?php echo BTCNEW_OPTION_DISABLED; ?>"<?php if (get_option(BTCNEW_SRC_BLOG_OPTION) == BTCNEW_OPTION_DISABLED) { ?> selected<?php } ?>>Disabled</option>
</select></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_SRC_TWITTER_OPTION; ?>"><?php _e('Twitter') ?></label></th>
<td><select name="<?php echo BTCNEW_SRC_TWITTER_OPTION; ?>" id="<?php echo BTCNEW_SRC_TWITTER_OPTION; ?>">
<option value="<?php echo BTCNEW_OPTION_ENABLED; ?>"<?php if (get_option(BTCNEW_SRC_TWITTER_OPTION) == BTCNEW_OPTION_ENABLED) { ?> selected<?php } ?>>Enabled</option>
<option value="<?php echo BTCNEW_OPTION_DISABLED; ?>"<?php if (get_option(BTCNEW_SRC_TWITTER_OPTION) == BTCNEW_OPTION_DISABLED) { ?> selected<?php } ?>>Disabled</option>
</select></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_SRC_FRIENDFEED_OPTION; ?>"><?php _e('FriendFeed') ?></label></th>
<td><select name="<?php echo BTCNEW_SRC_FRIENDFEED_OPTION; ?>" id="<?php echo BTCNEW_SRC_FRIENDFEED_OPTION; ?>">
<option value="<?php echo BTCNEW_OPTION_ENABLED; ?>"<?php if (get_option(BTCNEW_SRC_FRIENDFEED_OPTION) == BTCNEW_OPTION_ENABLED) { ?> selected<?php } ?>>Enabled</option>
<option value="<?php echo BTCNEW_OPTION_DISABLED; ?>"<?php if (get_option(BTCNEW_SRC_FRIENDFEED_OPTION) == BTCNEW_OPTION_DISABLED) { ?> selected<?php } ?>>Disabled</option>
</select></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_SRC_DIGG_OPTION; ?>"><?php _e('Digg') ?></label></th>
<td><select name="<?php echo BTCNEW_SRC_DIGG_OPTION; ?>" id="<?php echo BTCNEW_SRC_DIGG_OPTION; ?>">
<option value="<?php echo BTCNEW_OPTION_ENABLED; ?>"<?php if (get_option(BTCNEW_SRC_DIGG_OPTION) == BTCNEW_OPTION_ENABLED) { ?> selected<?php } ?>>Enabled</option>
<option value="<?php echo BTCNEW_OPTION_DISABLED; ?>"<?php if (get_option(BTCNEW_SRC_DIGG_OPTION) == BTCNEW_OPTION_DISABLED) { ?> selected<?php } ?>>Disabled</option>
</select></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_SRC_REDDIT_OPTION; ?>"><?php _e('Reddit') ?></label></th>
<td><select name="<?php echo BTCNEW_SRC_REDDIT_OPTION; ?>" id="<?php echo BTCNEW_SRC_REDDIT_OPTION; ?>">
<option value="<?php echo BTCNEW_OPTION_ENABLED; ?>"<?php if (get_option(BTCNEW_SRC_REDDIT_OPTION) == BTCNEW_OPTION_ENABLED) { ?> selected<?php } ?>>Enabled</option>
<option value="<?php echo BTCNEW_OPTION_DISABLED; ?>"<?php if (get_option(BTCNEW_SRC_REDDIT_OPTION) == BTCNEW_OPTION_DISABLED) { ?> selected<?php } ?>>Disabled</option>
</select></td>
</tr>
<tr valign="top">
<th scope="row"><label for="<?php echo BTCNEW_SRC_YC_OPTION; ?>"><?php _e('Hacker News') ?></label></th>
<td><select name="<?php echo BTCNEW_SRC_YC_OPTION; ?>" id="<?php echo BTCNEW_SRC_YC_OPTION; ?>">
<option value="<?php echo BTCNEW_OPTION_ENABLED; ?>"<?php if (get_option(BTCNEW_SRC_YC_OPTION) == BTCNEW_OPTION_ENABLED) { ?> selected<?php } ?>>Enabled</option>
<option value="<?php echo BTCNEW_OPTION_DISABLED; ?>"<?php if (get_option(BTCNEW_SRC_YC_OPTION) == BTCNEW_OPTION_DISABLED) { ?> selected<?php } ?>>Disabled</option>
</select></td>
</tr>
</table>
<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</form>
</div>