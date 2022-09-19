jQuery( document ).ready(function() {
  responsiveMain();
  
  jQuery("#mainmenu > ul > li.menu-item:not('.menu-item-has-children')").click(function () {
		window.location.href = jQuery(this).find('a').attr("href");
});
  
  jQuery(".remove").click(function () {
  	jQuery( 'main' ).css('height','auto');
		responsiveMain();
});  
  
  
});
jQuery( window ).resize(function() {
  responsiveMain();
});


function responsiveMain(){
	if(jQuery( window ).height() > jQuery('html').height()){
		 var mainheight = jQuery( window ).height() - jQuery( 'header' ).height() - jQuery( 'footer' ).height() -43;
    jQuery( 'main' ).height(mainheight);
	}else{
		 jQuery( 'main' ).css('height','auto');
	}
}
