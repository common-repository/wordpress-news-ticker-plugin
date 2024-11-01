<?php
	$nsws_bordercolor = get_option('ns-newsticker-border-color') != '' ? get_option('ns-newsticker-border-color') : "#000";
	$ns_newsticker_width = get_option('ns-newsticker-width');
	$ns_newsticker_border=get_option('ns-newsticker-border');
	$ns_total_border=get_option('ns-newsticker-border')*2;
	$ns_ns_total_width=$ns_newsticker_width-$ns_total_border;
	$ns_news_heading_color=get_option('ns-newsticker-heading');
?>
<style type="text/css">
.ns-ticker-box
{
	padding:0px;
	margin:0px;

}
#ns-ticker{
	height:210px;
	width:<?php echo $ns_ns_total_width;?>px;
	overflow:hidden;
	border:<?php echo $ns_newsticker_border;?>px solid  <?php echo $nsws_bordercolor;?>;
	padding:0px 10px 0px 10px;
}
#ns-ticker li{
	border:0; margin:0; padding:0; list-style:none;
}

	#ns-ticker li{
		height:60px;
		padding:5px;
		list-style:none;
	}
		#ns-ticker a{
			color:#000000;
			margin-bottom:
		}
		#ns-ticker .news-title,#ns-ticker .news-title a{
			font-weight:bold;
			padding:0px;
			margin:0px;
			text-transform:capitalize;
			font-size:13px;
			color:<?php echo $ns_news_heading_color;?>
		}
		#ns-ticker .news-text{
			display:block;
			font-size:11px;
			
		}
		#ns-ticker img{
			float:left;
			margin-right:14px;
			padding:4px;
			border:solid 1px <?php echo $nsws_bordercolor;?>;
		}
</style>
