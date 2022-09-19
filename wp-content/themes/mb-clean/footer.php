
			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<div class="wrapper">
				  <div class="slogan">
					<?php echo get_field('slogan', get_option('page_on_front')); ?>
				  </div>
				</div>
				<div class="wrapper">
					<div class="margin-016">
						<div class="footer-col">
						  <div class="foot-head">
							<?php echo get_field('column_1_header', get_option('page_on_front')); ?>
						  </div>
						  <div class="foot-menu">
							<?php html5blank_nav_footer();  ?>
						  </div>	
						</div>
						<div class="footer-col">
						  <div class="foot-head">
							<?php echo get_field('column_2_header', get_option('page_on_front')); ?>
						  </div>
						  <div class="foot-contacts">
							<?php echo get_field('contact_info', get_option('page_on_front')); ?>
						  </div>
						</div>
						<div class="footer-col">
						  <div class="foot-head">
							<?php echo get_field('column_3_header', get_option('page_on_front')); ?>
						  </div>
						  <div class="foot-social">
							<?php if(!empty(get_field('facebook', get_option('page_on_front')))) : ?><a href="<?php echo get_field('facebook', get_option('page_on_front')); ?>" target="_blank" rel="nofollow"><i class="fab fa-facebook-square"></i></a><?php endif; ?>
						    <?php if(!empty(get_field('instagram', get_option('page_on_front')))) : ?><a href="<?php echo get_field('instagram', get_option('page_on_front')); ?>" target="_blank" rel="nofollow"><i class="fab fa-instagram"></i></a><?php endif; ?>
						    <?php if(!empty(get_field('youtube', get_option('page_on_front')))) : ?><a href="<?php echo get_field('youtube', get_option('page_on_front')); ?>" target="_blank" rel="nofollow"><i class="fab fa-youtube-square"></i></a><?php endif; ?>
						  
						  </div>
						</div>
						<div class="footer-col">
							 <div class="foot-head">
							<?php _e( 'Betalningsmetod', 'woocommerce' ); ?>
						  </div>
						  <div class="foot-klarna">
							<a href="https://www.svea.com/no/nb/start/" target="_blank" rel="nofollow"><img src="/wp-content/themes/mb-clean/img/svea-logo.png" alt="SVEA Norhage" /></a>
							<br />
							<a href="https://www.vipps.no/" target="_blank" rel="nofollow"><img src="/wp-content/themes/mb-clean/img/vipps.png" alt="SVEA Norhage" /></a>
						  </div>
						</div>
					</div>
				</div>
			</footer>
			<!-- /footer -->

		
		<!-- /wrapper -->

		<?php wp_footer(); ?>
<script>
	
	jQuery( document ).ready(function() {
    jQuery('.slogan').html(function(){	

		var text = jQuery(this).text().split(' ');
		
		
		var newArray = text.filter(function(v){return v!==''});
		var last = newArray.pop();

		return newArray.join(" ") + (newArray.length > 0 ? ' <span class="last">'+last+'</span>' : last);   

	});
});
</script>
<script>
	jQuery(document).ready(function() {
		
		jQuery( ".mobilefilter" ).click(function() {
		  jQuery('aside.sidebar').toggleClass('active');
		});
	});
	
	jQuery(document).ajaxComplete(function( event,request, settings ) {
  		jQuery( ".bapf_button.bapf_reset" ).click(function() {
		  	jQuery('aside.sidebar').toggleClass('active');
	});
		
});
	
</script>
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/nb_NO/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="141214966375481"
  theme_color="#71bf45"
  logged_in_greeting="Hei! Hva kan vi hjelpe deg med?"
  logged_out_greeting="Hei! Hva kan vi hjelpe deg med?">
      </div>
	</body>
</html>
