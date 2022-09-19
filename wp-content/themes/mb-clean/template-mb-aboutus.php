<?php /* Template Name: About Us MB Clean */ get_header(); ?>
<!-- post thumbnail -->
<div class="inner-header-image" <?php if (!empty(get_field('header_image', get_the_ID()))) : ?> style="background-image: url('<?php echo get_field('header_image', get_the_ID());?>');" <?php endif; ?>>
</div>
<!-- /post thumbnail -->
<main role="main" class="no-sidebar without-sidebar">
	<div class="section maincontent aboutuscontent">
		<div class="wrapper">
			<div class="about-us-content">
			  <div class="col1-image">
			  	<div class="image-about-us">
					<?php $image = get_field('image');
					$size = 'full'; 
					if( $image ) {
						echo wp_get_attachment_image( $image, $size );} ?>
				  </div>
			</div>
			<div class="col2-textarea">
			  <div class="about-us-block">
				<p class="about-us-header"><?php echo get_field('text_header',get_the_ID()); ?></p>
			  </div>
			  <div class="empty-space" style="height: 25px;">		
			  </div>
			  <div class="text">
				<?php echo get_field('about_us_text',get_the_ID()); ?>
			  </div>	
			</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
