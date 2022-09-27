(function ($) {
	$( document ).ready(function() {
		$('#mainmenu').each( function (element) {
			console.log('yo bro');
    		init_expander(this);
  		});
	});

	function init_expander(el){
		$(el).find('li.menu-item-has-children').each(function(){

			console.log('waaa');
			let btn = $('<button>').text('open');
			btn.click(function(e){
				$(this).parent('li').toggleClass('open');
			});
			$(this).find('> a').after(btn);
		});
	};

})(jQuery);