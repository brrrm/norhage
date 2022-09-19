<?php get_header(); ?>
<div class="wrapper">
	<main role="main" class="with-sidebar">
		<!-- section -->
		<section>

			<!-- article -->
			<article id="post-404">

				<h1><?php _e( 'Sidan Hittas Inte ', 'html5blank' ); ?></h1>
				<p class="pbutton">
					<a href="<?php echo home_url(); ?>"><?php _e( 'Återvända hem?', 'html5blank' ); ?></a>
				</p>
				<p>&nbsp;</p>
			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
