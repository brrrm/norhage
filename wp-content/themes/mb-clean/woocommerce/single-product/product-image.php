<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 6 );
$post_thumbnail_id = $product->get_image_id();
$attachment_ids = $product->get_gallery_image_ids();
$output = array_slice($attachment_ids, 0, 10);
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<figure class="woocommerce-product-gallery__wrapper">
			<div class="rightbigimage">
			<?php
		if ( ($product->get_gallery_image_ids()) && ($product->get_image_id())) {
			 $imagen = wp_get_attachment_image_src($post_thumbnail_id,'full'); ?>
			<a class="bigprodimage foobox" rel="gallery" href="<?php echo $imagen[0]; ?>"><img src="<?php echo $imagen[0]; ?>" /></a>
			 <?php $output = array_slice($attachment_ids, 0, 10);
				foreach ( $output as $attachment_id ) {
					$image = wp_get_attachment_image_src($attachment_id, 'full'); ?>
			 
			<a class="bigprodimage foobox" rel="gallery" href="<?php echo $image[0]; ?>"><img src="<?php echo $image[0]; ?>" /></a> 
			<?php } } else { if ((empty($product->get_gallery_image_ids())) && ($product->get_image_id())){
				$imagen = wp_get_attachment_image_src($post_thumbnail_id,'full'); ?>		
				<a class="bigprodimage foobox" rel="gallery" href="<?php echo $imagen[0]; ?>"><img src="<?php echo $imagen[0]; ?>" /></a> 	

		<?php } else { if ( ($product->get_gallery_image_ids()) && (empty($product->get_image_id()))) {
			$output = array_slice($attachment_ids, 0, 10);
				foreach ( $output as $attachment_id ) {
					$image = wp_get_attachment_image_src($attachment_id, 'full'); ?>
					<a class="bigprodimage foobox" rel="gallery" href="<?php echo $image[0]; ?>"><img src="<?php echo $image[0]; ?>" /></a> <?php
		}} else{
			$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
			$html .= '</div>';
			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
		}			
		}}
		?>
		</div>
		<div class="img-thumbnails">
		  <button class="prev-arrow"><i class="icofont-rounded-left"></i></button><div class="thumbnail-images"><?php do_action( 'woocommerce_product_thumbnails' ); ?></div><button class="next-arrow"><i class="icofont-rounded-right"></i></button>
		</div>
	</figure>
</div>
<script type="text/javascript" charset="utf-8">
jQuery(document).ready(function($){
		 jQuery('.rightbigimage').slick({
arrows: false,
    centerMode: false,
    infinite: true,
    dots:true,
    asNavFor: '.thumbnail-images',
	mobileFirst: true,
	  adaptiveHeight: false,
	  adaptiveWidth: true,
	  variableHeight: false,

	});
	jQuery('.thumbnail-images').slick({
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  asNavFor: '.rightbigimage',
	  centerMode: false,
	  focusOnSelect: true,
	  arrows: true,
	  vertical: false,
	  infinite: true,
    	loop: false,
      verticalSwiping: false,
      prevArrow: $('.prev-arrow'),
	  nextArrow: $('.next-arrow'),
	  autoplay: false,responsive : [{
				breakpoint : 1167,
				settings : {
					slidesToShow : 3,
					slidesToScroll : 1,
					autoplay: false,
					 autoplaySpeed: 2000,
					infinite : true
				}
			},
			{
				breakpoint : 1030,
				settings : {
					slidesToShow : 2,
					slidesToScroll : 1,
					autoplay: false,
					 autoplaySpeed: 2000,
					infinite : true
				}
			}, {
				breakpoint : 768,
				settings : {
					slidesToShow : 3,
					slidesToScroll : 1,
					autoplay: false,
					 autoplaySpeed: 2000,
					infinite : true
				}
			}, {
				breakpoint :530,
				settings : {
					slidesToShow : 2,
					autoplay: false,
					 autoplaySpeed: 2000,
					slidesToScroll : 1,
					infinite : true
				},
			},{
				breakpoint : 458,
				settings : {
					slidesToShow : 2,
					slidesToScroll : 1,
					autoplay: false,
					 autoplaySpeed: 2000,
					infinite : true
				}
			},]
	});
});
jQuery(document).ready(function($){
		jQuery(".bigprodimage").on('click', function(e) {
    	if (jQuery(window).width() < 760) {
	 e.preventDefault();
}
    	});
if (jQuery(window).width() < 760) {
	jQuery( ".bigprodimage " ).removeClass( "foobox " );
}
});
</script>
