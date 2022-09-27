<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
		
		<!-- Google Tag Manager 
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-PWZVLZ4');</script>
		 End Google Tag Manager -->

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) 
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PWZVLZ4"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	 End Google Tag Manager (noscript) -->
		<!-- wrapper -->
	<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>

			<!-- header -->
			<header class="header clear">
				
				
				<?php if(get_field('ar_rodyti_popupa',get_option('page_on_front')) == 'taip') { ?>
<div class="popupbg">
	<div id="popupscr">
		<img src="<?php echo get_field('popupo_img', get_option('page_on_front')) ?>" alt="Black Friday ispardavimas" />
		<div class="closexxx">x</div>
	</div>
</div>
<script>
jQuery( document ).ready(function() {
	jQuery(document).on('click', '.closexxx', function(){
	  jQuery('.popupbg').css('display', 'none');
	  sessionStorage.setItem('popup','close');
	});
	 if (sessionStorage.getItem('popup') != 'close') {

		jQuery('.popupbg').css('display', 'flex');
			}
});
</script>
<?php } ?>
				
				
				<div class="wrapper">
					<div class="section">
						<!-- logo -->
						<div class="logo col-lg-auto float-left">
							<a href="<?php echo home_url(); ?>">
								<?php $logo = get_field('logo', get_option( 'page_on_front' )); if (!empty($logo)) : ?>
									<img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" />
								<?php else : ?>
									<span class="logotext"><?php bloginfo('name'); ?></span>
								<?php endif; ?>
							</a>
						</div>
						<!-- /logo -->
						 <div class="righthead col-lg-auto float-right">
						 	
						 	<div id="menu-cart"><?php echo do_shortcode("[woo_cart_but]"); ?></div>
						 	<nav class="mit-konto">
						 		<?php html5blank_nav_small(); ?>
						 	</nav>
						 	<div class="header-search-box desktopsearch">
							 	<?php get_product_search_form(); ?>
							</div>
						</div>
					</div>
					<!-- Hamburger menu-->
					<div class="hamburger-menu">
						<div id="sandwitch" class="desktop-hidden">
							<i class="fas fa-align-justify"></i>
						</div>
						<div id="menu-close">
							<p></p>
						</div>
					</div>
					<!-- nav -->
					<nav id="mainmenu" class="nav desktopmenu">
						<?php html5blank_nav(); ?>
						</nav>
				</div>
			</header>

				<script>
					jQuery(document).ready(function() {
						jQuery(document).on('click', '#sandwitch', function() {
							console.log('hallo!!!!');
							jQuery("header").addClass("active");
						});
						jQuery(document).on('click', '#menu-close', function() {
							jQuery("header").removeClass("active");
						});
						jQuery(document).on('click', '.cart-contents > .eurofont.icon-cart ', function() {
							jQuery("#menu-cart").addClass("active");
						});
						jQuery(document).on('click', '.cart-contents-count ', function() {
							jQuery("#menu-cart").addClass("active");
						});

						jQuery(document).on('click', '#closeCX', function() {
							jQuery("#menu-cart").removeClass("active");
						});
					});
				</script>
				 <script>
					jQuery(document).ready(function(){
  						jQuery(".mobile-menu-container ul > li.menu-item-has-children > a").click(function(){
  							  event.preventDefault();
    						jQuery(this).parent().toggleClass('bounce');
  							});
						});
				</script>