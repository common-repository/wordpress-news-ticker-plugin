  <div class="wrap">
	<h2>Wordpress News Ticker Settings</h2>
	<p>Use the fields below to customize your News Ticker width, Ticker colors,and to select the category. <br/>Visit the <a href="http://www.snilesh.com/resources/wordpress/wordpress-plugins/" title="Wordpress News Ticker Plugin">Wordpress News Ticker Plugin</a> website for more information.</p>
	
    <div style="margin-left:0px;">
    <form method="post" action="options.php"><?php wp_nonce_field('update-options');?>
		<fieldset name="general_options" class="options">

        News Ticker Width in Pixels:<br />
		<div style="margin:0;padding:0;">
        <input name="ns-newsticker-width" id="ns-newsticker-width" size="25" value="<?php echo get_option('ns-newsticker-width'); ?>"></input>
        </div><br />
    	News Ticker Box Border in Pixels:<br />
		<div style="margin:0;padding:0;">
        <input name="ns-newsticker-border" id="ns-newsticker-border" size="25" value="<?php echo get_option('ns-newsticker-border'); ?>"></input> 
        </div><br />
		News Ticker Border Color <span class="style1">(use #hex or specify color name)</span><br/>
		<div style="margin:0;padding:0;">
        <input name="ns-newsticker-border-color" id="ns-newsticker-border-color" size="25" value="<?php echo get_option('ns-newsticker-border-color'); ?>"></input>   
        </div><br /> 
		News Ticker Heading Color <span class="style1">(use #hex or specify color name)</span><br/>
		<div style="margin:0;padding:0;">
        <input name="ns-newsticker-heading" id="ns-newsticker-heading" size="25" value="<?php echo get_option('ns-newsticker-heading'); ?>"></input>   
        </div><br /> 

		
		<u><strong>News Ticker Category Selection</strong></u> - Select a blog category:<br />
        <div style="padding-top: 10px"></div><div>
        <table width="688" border="1" cellpadding="0">
			<tr>
			<td>
			<div style="margin:0;padding:0;">
			<?php $checked1 = get_option('newsticker-latest-post') ? "checked" : ""; ?>
        <input type="checkbox" name="newsticker-latest-post" id="newsticker-latest-post" <?php print $checked1 ?>> 
        Check here if you want to show Latest Post Instead Of from Specific category.<br />
        </div>
			</td>
			</tr>

  			<tr>
    			<td>
                    <div style="padding-top: 7px"></div><div>
                	Category Name:<br />
        			<select name="ns-newsticker-category" id="ns-newsticker-category">
					<?php
					$category_ids = get_all_category_ids();
					foreach($category_ids as $cat_id) {
						$catname=get_cat_name($cat_id);
					    echo '<option value="'.$cat_id.'">'.$catname.'</option>';
					}
					?>
					
					</select> 
                </td>																
    			<td>
                   &nbsp;
                </td>
  			</tr>
  			<tr>
    			<td>
                    <div style="padding-top: 5px"></div><div>
                	Number of Items to Display:<br />
        			<input name="ns-newsticker-items" id="ns-newsticker-items" size="25" value="<?php echo get_option('ns-newsticker-items'); ?>"></input> 
                </td>
    			<td>&nbsp;
                	
                </td>
  			</tr>
		</table>
        
        <p><strong>Image Settings</strong><br />
        For the Image part First Image from the Post will be automatically resized and displayed for each post.If you Dont have any image in your post then you can set the default Image<br />
		<?php $checked2 = get_option('newsticker-image-links') ? "checked" : ""; ?>
		<div style="margin:0;padding:0;">
        <input type="checkbox" name="newsticker-image-links" id="newsticker-image-links" <?php print $checked2 ?>> 
        Check here if you want to show image.<br />
        </div>
		<br/>
		<input name="ns-newsticker-image" id="ns-newsticker-image" size="125" value="<?php if(get_option('ns-newsticker-image')){echo get_option('ns-newsticker-image');}else {echo get_bloginfo('url').'/wp-content/plugins/wordpress-news-ticker-plugin/images/default.jpg';} ?>"></input> 
        <br/>
		<br/>
		
        <strong>Wordpress News Ticker Insert Code</strong><br />
        If not already included, add the following code anywhere within your theme files where you want the Wordpress Content Slide to be displayed:<br />
		
        <blockquote>&lt;&#63;php include &#40;ABSPATH &#46; '/wp-content/plugins/wordpress-news-ticker-plugin/news_ticker.php'&#41;&#59; &#63;&#62;</blockquote>

		    
             
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="ns-newsticker-width,ns-newsticker-category,ns-newsticker-items,ns-newsticker-border-color,ns-newsticker-border,ns-newsticker-image,ns-newsticker-heading,newsticker-image-links,newsticker-latest-post" />

		</fieldset>
		<p class="submit"><input type="submit" name="Submit" value="<?php _e('Update Options') ?>" /></p>
        <p><em>Wordpress NewsTicker Plugin v1.0 by <a href="http://www.snilesh.com" title="snilesh.com">snilesh</a></em></p>
	</form>      
</div>
