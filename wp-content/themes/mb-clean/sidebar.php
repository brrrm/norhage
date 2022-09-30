<!-- sidebar -->
<?php  if(is_active_sidebar('widget-area-1')){ ?>
<aside class="sidebar" role="complementary">
	<div class="sidebar-inner">
		<h3><?php _e('Produktfilter','mb-clean') ?></h3>
		<div class="sidebar-widget">
			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
		</div>
	</div>
	<!-- <div class="mobilefilter"><i class="icofont-search"></i></div> -->
</aside>


<!-- /sidebar -->
<?php } ?>