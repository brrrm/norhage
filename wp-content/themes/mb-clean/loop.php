<div class="margin-016">
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 float-left">
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" class="col-lg-12 blogpostart padding-16">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

					<!-- post title -->
					<h2 class="proh left"><?php the_title(); ?>	</h2>
					<!-- /post title -->
					<!-- post thumbnail -->
					<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
						<div class="redoverlay"><img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title(); ?>" /></div>
					<?php endif; ?>
					<!-- /post thumbnail -->
					<div class="projectintro left"><?php the_excerpt()?></div>
			</a>
		</article>
		<!-- /article -->
	</div>
<?php endwhile; endif; ?>
</div>
