<?php get_header(); ?>
<!-- post thumbnail -->
<div class="inner-header-image">
	<div class="wrapper">
		<h1 class="white center"><?php the_title(); ?></h1>
	</div>
</div>
<!-- /post thumbnail -->
<div class="wrapper">
	<main role="main" class="without-sidebar">
		<!-- section -->
		<section>
			<?php get_template_part('loop'); ?>
			<?php get_template_part('pagination'); ?>
		</section>
		<!-- /section -->
	</main>
</div>
<?php get_footer(); ?>
