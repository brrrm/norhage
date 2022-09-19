<?php /* Template Name: Frontpage MB Clean */ get_header(); ?>
	<main role="main" class="mainpage">
		<div id="slider-mainpage" class="section">
			<div class="wrapper">
			  <?php echo get_field('slider_id', get_option('page_on_front')); ?>
			</div>	
		</div>
		
		

			<div id="maincontent-section" class="section">
				<div class="wrapper">
					<?php  $carousel = get_field('carousel');
						if (!empty($carousel)) { ?>
							<?php foreach( $carousel as $single_carousel): ?>
								<section class="product carusel">
									<h2 class="centerh">
										<?php if(!empty($single_carousel['carousel_name'])){
											echo '<span class="green">'.$single_carousel['carousel_name'].'</span>'; } ?>
									</h2>
									<?php  $products_args = $single_carousel['products']; ?>
										<?php if (!empty($products_args)) { ?>
											<div class="">
								<div class="products">
											<?php foreach( $products_args as $one_product): ?>
												<?php 
													$args = array(
								'post_type'     => 'product',
		    					 'post_status'   => 'publish',
		    					 'p' => $one_product["product"]
							);
												?>
												<?php $tabs = new WP_Query($args);
							if (!empty($tabs)){ 
								while ($tabs->have_posts()){
									$tabs->the_post();
									$product = wc_get_product( $post->ID );
				 					wc_get_template_part( 'content', 'productfirst' );
								 wp_reset_query(); }  }  ?>
													
											<?php endforeach; ?>
										</div></div><?php } ?>
										
								</section>
							<?php endforeach; ?>
							
							<?php } ?>
							
<section class="product carusel">
<?php
$args =  array(
'posts_per_page'   => get_field('products_quantity_1', get_option( 'page_on_front' )),
'post_type'     => 'product',
'post_status'   => 'publish',
'meta_query'        => WC()->query->get_meta_query(),
'post__in'          => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
);
$tabs = new WP_Query($args);
if (!empty($tabs)){ ?>
<h2 class="centerh"><?php echo get_field('white_title_1', get_option( 'page_on_front' )); ?> 
<?php if(!empty(get_field('green_title_1', get_option( 'page_on_front' )))){echo '<span class="green">'.get_field('green_title_1', get_option( 'page_on_front' )).'</span>'; } ?></h2>
<div class="">
<div class="products">
<?php while ($tabs->have_posts()){
$tabs->the_post();
$product = wc_get_product( $post->ID ); ?>
<?php wc_get_template_part( 'content', 'productfirst' ); ?>
<?php } ?>
</div>
</div>
<?php } ?>
</section>
					<section class="product carusel">
						<?php
						$args =  array(
		'posts_per_page'   => get_field('products_quantity_2', get_option( 'page_on_front' )),
		    'post_type'     => 'product',
		    'post_status'   => 'publish'
		);
		$tabs = new WP_Query($args);
	if (!empty($tabs)){
		?>
		<div class="separatorrow"></div>
		<h2 class="centerh"><?php echo get_field('white_title_2', get_option( 'page_on_front' )); ?> <?php if(!empty(get_field('green_title_2', get_option( 'page_on_front' )))){echo '<span class="green">'.get_field('green_title_2', get_option( 'page_on_front' )).'</span>'; } ?></h2>
	<div class="">
		
	
	<div class="products">
		<?php while ($tabs->have_posts()){
			$tabs->the_post();
			$product = wc_get_product( $post->ID );
			
			?>

			<?php wc_get_template_part( 'content', 'productfirst' ); ?>

		<?php } ?>
		</div></div>
<?php } ?>
					</section>
<script>
	jQuery(document).on('ready', function() {
		var slickvar = {
			infinite : true,
			slidesToShow : 4,
			autoplay: true,
			 autoplaySpeed: 2000,
			slidesToScroll : 1,
			responsive : [{
				breakpoint : 1144,
				settings : {
					slidesToShow : 3,
					slidesToScroll : 1,
					autoplay: true,
					 autoplaySpeed: 2000,
					infinite : true
				}
			}, {
				breakpoint : 865,
				settings : {
					slidesToShow : 2,
					slidesToScroll : 1,
					autoplay: true,
					 autoplaySpeed: 2000,
					infinite : true
				}
			}, {
				breakpoint : 616,
				settings : {
					slidesToShow : 1,
					autoplay: true,
					 autoplaySpeed: 2000,
					slidesToScroll : 1,
					infinite : true
				}
			}]
		};


		jQuery('.products').slick(slickvar);



	});
</script>					
					<section class="blogposts">
						<?php
						$args = array(
						'post_type'=> 'post',
						'orderby'    => 'ID',
						'post_status' => 'publish',
						'order'    => 'DESC',
						'posts_per_page' => 2 // this will retrive all the post that is published 
						);
						$result = new WP_Query( $args );
						if ( $result-> have_posts() ) : ?>
						<?php while ( $result->have_posts() ) : $result->the_post(); ?>
						<div class="one-col-block col-lg-6">
							<div class="text-header">
							  <h2><?php the_title(); ?></h2>
							</div>
							<div class="image-content">
						  		<img src="<?php the_post_thumbnail_url() ?>" />
							</div>
							<div class="text"><?php the_excerpt()?></div>
							
						</div>
						<?php endwhile; ?>
						<?php endif; wp_reset_postdata(); ?>
					</section>																				
				</div>
			</div>

	
		

	</main>

<?php get_footer(); ?>