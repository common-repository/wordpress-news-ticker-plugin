<?php
include(ABSPATH . "/wp-content/plugins/wordpress-news-ticker-plugin/css/ns.newsticker.css.php");
$gallery_path=  get_bloginfo('wpurl')."/wp-content/plugins/wordpress-news-ticker-plugin/";
?>
<script type="text/javascript" src="<?php echo $gallery_path;?>js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	jQuery.noConflict();
	var first = 0;
	var speed = 700;
	var pause = 3500;
	  function removeFirst(){
			first = jQuery('ul#ns-ticker li:first').html();
			jQuery('ul#ns-ticker li:first')
			.animate({opacity: 0}, speed)
			.fadeOut('slow', function() {jQuery(this).remove();});
			addLast(first);
		}
		
		function addLast(first){
			last = '<li style="display:none">'+first+'</li>';
			jQuery('ul#ns-ticker').append(last)
			jQuery('ul#ns-ticker li:last')
			.animate({opacity: 1}, speed)
			.fadeIn('slow')
		}
	
	interval = setInterval(removeFirst, pause);
});
</script>
<div class="ns-ticker-box">
<ul id="ns-ticker">
<?php
$nsws_category_id = get_option('ns-newsticker-category');
$nsws_no_post = get_option('ns-newsticker-items');
$ns_status = get_option('newsticker-image-links');
$ns_latest_post = get_option('newsticker-latest-post');
if($ns_latest_post=='on')
{
	$nsquery='showposts='.$nsws_no_post;
}
else
{
	$nsquery='cat=' .$nsws_category_id. '&showposts='.$nsws_no_post;
}
?>
		<?php $temp_query = $wp_query; ?>
	    <?php query_posts($nsquery); ?>
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<li>
		<?php if($ns_status=='on') { 
		catch_featured_image();
		} ?>
		<h2 class="news-title"><a href="<?php the_permalink() ?>" title="Read More"><?php the_title();?></a></h2>
		<div class="news-text"><?php ns_content_limit(60,'Read More');?></div>
		</li>		 
		
	     <?php endwhile; endif; ?>
	     <?php $wp_query = $temp_query; ?>
</ul>
</div>