<?php
/*
Plugin Name: WP OldPost
Version: 0.3
Plugin URI: http://audioblog.fr/wpstuff
Description: If the post is older than 1 year, an alert will be displayed before the post encouraging visitors to check if there are more recent posts on the subject.
Author: Luc Saint-Elie
Author URI: http://luc.saint-elie.com
*/

/*  Copyright 2007  Luc Saint-Elie (email : lstelie@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

$currentLocale = get_locale();
if(!empty($currentLocale)) {
	$moFile = dirname(__FILE__) . "/wp-oldpost-" . $currentLocale . ".mo";
	if(@file_exists($moFile) && is_readable($moFile)) load_textdomain('wp-oldpost', $moFile);
}
			
function oldpost_function ($text) {

	// Time variables
	//  http://php.net/date
	$current_year = date("Y");
	$current_month = date("m");
	$post_year =  get_the_time('Y');
	$post_month =  get_the_time('m');
	$post_age_in_months = ($current_month - $post_month);
	$post_max_age_in_months = 6;
	
	// CSS variables
	$opendiv		= "<div class=\"oldpost\">";
	$closediv 		= "</div>";
	
	// Page variable
	$look_for_pages = 'yes'; // other value "no" 
	
	// Text to display
	$year_notice_before 	= __('Note: this post has been published in  ', 'wp-oldpost');	
	$year_notice_after		= __('. It\'s very likely, the information contained in this post are no more valid today. Please use the search system (or browse the archives) to see if I wrote something else about this subject since this post', 'wp-oldpost');
	$month_notice_before 	= __('Note: this post is  ', 'wp-oldpost');	
	$month_notice_after1 	= __(' months old.  ', 'wp-oldpost');	
	$month_notice_after2	= __('. I publish on a regular basis. Please use the search system (or browse the archives) to see if I wrote something else about this subject since this post', 'wp-oldpost');
	
	
	
	if (!is_page() ) {
		if ( 
			($post_year < $current_year) && (($current_month - $post_month) > $post_max_age_in_months ) ){
			return 	$opendiv.
					$year_notice_before.
					$post_year.
					$year_notice_after.
					$closediv.
					$text;
		} else if ( ( $post_month < $current_month) && ($post_age_in_months > $post_max_age_in_months ) ) {
			return 	$opendiv.
					$month_notice_before.
					$post_age_in_months.
					$month_notice_after1.
					$month_notice_after2.
					$closediv.
					$text;
		} else {
	 		return $text;
	 		}
	} else {
	 return $text;
	 }

}

add_filter("the_content", "oldpost_function");