=== wp-oldpost ===
Tags: post, date, notice
Contributors: lstelie
Requires at least: 2.1
Tested up to: 2.3
Stable Tag: 0.2

Visitors to your site are noticed if the post is old, and are invited to use either archives or the search function.

== Description ==

This plugin is devoted to weblogs  several years old. Visitors comming through search engines can land on a post that is several years old. 
Old posts were very likely great by the time they were poublished, but can be out of date or even wrong by the time they are read several years later.
As a lot of people don't read the post date, this plug in alert them that the post is old. 
wp-oldpost is a good complement to plugins like "related post", "archives" and so on.
In its current form the plugin is very rough, no admin, fix periods (one year/more than 6 months)...

== Installation ==

1. Upload the plugin to your plugins folder: `wp-content/plugins/`
2. Activate the 'wo-oldpost' plugin from the Plugins admin panel.
3. define a CSS class named "oldpost" in your style.css file


== Frequently Asked Questions ==

= Un which cases the alert is triggered ?

In two cases :
- The post is older than one year
- The post is older than 6 months

The alert is different fort both cases

= How do I change the look of alert? =

Define a css class in your style.css file. The alert is surrounded by a div class="oldpost"
This can be something like :
.oldpost {	color: #F00; font-weight: bold; }

= Can I set another period than 1 year ?

In the very first release of the plug in : no

= Which can of posts are eveluated ?

Only posts are evaluated, not pages

= Are pages taken in account ?

No, only posts are evaluated (I might be a setting in further release)

= How can I customoze the message displayed ?

Currently in 0.2 version you can either :
- modifie the php file
- use poedit to modify the provided .po file
In later release, the message will be customized through the admin page

= Where can I get support ?

Limited support can be provided at : http://audioblog.fr/forums

