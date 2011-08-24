=== BTCNew ===
Contributors: mcalamelli
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=mcalamelli%40gmail%2ecom&lc=IT&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_LG%2egif%3aNonHosted
Tags: backtype, comments, twitter, tweets, friendfeed, digg, reddit, conversations, reactions
Requires at least: 2.7
Tested up to: 3.1
Stable tag: 0.0.5

The BTCNew Wordpress plugin lets you show related conversations (from Twitter, Digg, FriendFeed & more) inline with your own comments.

== Description ==

The BTCNew Wordpress plugin finds conversations related to your content and allows you to display the associated comments inline with your own. Existing conversations about your content taking place across the web can now be displayed right on your blog for your visitors to read and respond to. It works on top of your existing Wordpress comments, both threaded and non-threaded.

Currently, we support conversations from:

*   Twitter &ndash; tweets that link your posts
*   FriendFeed &ndash; on the entries for your posts
*   Digg &ndash; on the submissions for your posts
*   Reddit &ndash; on the submissions for your posts
*   Hacker News &ndash; on the submissions for your posts
*   Other blogs &ndash; whenever someone links one of your posts

The plugin is highly customizable. You can:

*   Specify which sources you want to include comments from
*   Add a summary to the top of your comments section, which shows the number of comments from each source
*   Specify whether you would like BackType Connect comments to be displayed at the end of the comments section, or mixed with the rest of your comments

This plugin was created using [BackType Connect](http://www.backtype.com/developers/connect).
This plugin is a fork of the old Backtype Connect Wordpress plugin, developed by Backtype.

== Installation ==

Note: It is recommended that you backup your database before installing

1. Download the plugin
1. Unzip the plugin and upload the `btcnew` directory to `/wp-content/plugins/`
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Configure the plugin through the 'Settings' &gt; 'BTCNew' menu option
1. Click the 'Enable' button to start importing comments

== Frequently Asked Questions ==

= How long does it take for comments to show up? =

The time it takes for BackType comments to show up on your posts varies &ndash; it can take anywhere from seconds to a day. It depends on the source and how old your post is, but we've designed the plugin and BackType Connect to be as timely and efficient as possible. We're constantly looking for ways to improve in future versions.

= What versions of Wordpress do you support? =

The plugin was developed on Wordpress 2.7, but it has been fully tested up to 3.0.1.

= Does the BTCNew plugin work with third party comment systems? =

Unfortunately, it doesn't. Currently, the plugin will only work with the native Wordpress comment system, and not replacements such as IntenseDebate or Disqus. With third party comment systems, this plugin will only show the Summary at the top of your comments section.

= Does the BTCNew plugin work with other plugins? =

The plugin should work well with most other plugins, as long as they aren't replacement comment systems.

= Can I moderate comments from BackType Connect? =

Yes, you can. If you want to moderate BackType comments, enable moderation on the 'Settings' &gt; 'BTCNew' page. To moderate, visit the Wordpress 'Edit Comments' page accessible via the 'Comments' menu item.

Note: You will *not* receive e-mails when BackType comments are placed in moderation, so we recommend leaving moderation off. We're hoping to address this in a future release.

= What does the Summary option do? =

The Summary option adds text before the comments on each post to summarize comment activity reported by BackType Connect. This will show the number of comments from each source whether they are enabled or not, so readers can choose to explore those conversations even if you decide not to display them alongside your own comments.

= Can your plugin filter comments with Akismet? =

If you have Akismet enabled, BTCNew can use it. Enable the option on the 'Settings' &gt; 'BTCNew' page to send BackType Comments through Akismet. However, since we pay close attention to spam on BackType, this usually isn't necessary. If you're using Akismet, make sure you monitor comments classified as Spam so you can catch any BackType comments that are misclassified.

= Why didn't BTCNew get comments for my older posts? =

BackType Connect launched in early March, 2009 so we haven't connected many conversations that took place before then. When you enable the plugin, it will retrieve comments for up to one hundred posts no older than January, 2009.

== Screenshots ==

1. This is the configuration page for BackType Connect found under 'Settings' &gt; 'BTCNew'
2. This shows the plugin active and displaying the Summary and a comment from Twitter

== Changelog ==

= 0.0.5 =
* code cleanup
* add a option to easily debug the plugin

= 0.0.4 =
* Adjustment in readme.txt to follow WP guidelines

= 0.0.3 =
* Add internalization (i18n), thanks to Davide Salerno

= 0.0.2 =
* Bugfixes: avatars, comments mixed/separated 

= 0.0.1 =
* First commit

== Upgrade notice ==

= 0.0.5 = 
Fixed an internal bug and a small typo

= 0.0.4 =
Upgrade if you want the i18n version of the plugin

== Support ==

If you're having problems using our plugin, let me know. I'm happy to help! You can contact me through [my website](http://www.mcalamelli.net).