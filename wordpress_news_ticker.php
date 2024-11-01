<?php
/*
Plugin Name: Wordpress News Ticker Plugin
Plugin URI: http://www.snilesh.com/resources/wordpress/wordpress-plugins/wordpress-news-ticker-plugin/
Description: Wordpress News Ticker plugin to display News ticker using Jquery.
Version: 1.0
Author: Snilesh
Tags: Wordpress News Ticker,News Ticker,Ticker,News
Author URI: http://www.snilesh.com
*/

/*  Copyright 2009  Snilesh.com  (email : snilesh.com@gmail.com)

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

function news_ticker_ns()
{
	$options_page=get_bloginfo('wpurl')."/wp-content/plugins/wordpress-news-ticker-plugin/wordpress_news_ticker.php";
	add_options_page('Wordpress News Ticker Settings', 'Wordpress News Ticker', 10, 'wordpress-news-ticker-plugin/options.php');
}
function catch_featured_image() {
global $post, $posts;
$gallery_path=  get_bloginfo('wpurl')."/wp-content/plugins/wordpress-news-ticker-plugin/";
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
$first_img = $matches [1] [0];
 
// no image found display default image instead
if(empty($first_img))
	{
	?>
	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
	<img src="<?php echo $gallery_path;?>timthumb.php?src=<?php echo get_option('ns-newsticker-image');?>&w=50&h=50&zc=1" alt="" />
	</a>
	<?php
	}
	else
	{
?>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
<img src="<?php echo $gallery_path;?>timthumb.php?src=<?php echo $first_img;?>&w=50&h=50&zc=1" alt="" />
</a>
<?php
	}
}
function ns_content_limit($max_char, $more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

   if (strlen($_GET['p']) > 0) {
      echo "";
      echo $content;
      echo "";
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
        echo "";
        echo $content;
        echo "...";
        echo "";
   }
   else {
      echo "";
      echo $content;
      echo "";
   }
}
add_action('admin_menu', 'news_ticker_ns');
?>