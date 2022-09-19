/* global wc_add_to_cart_params */
jQuery( function( $ ) {

	if ( typeof wc_add_to_cart_params === 'undefined' ) {
		return false;
	}

	/**
	 * AddToCartHandler class.
	 */
	var AddToCartHandler = function() {
		this.requests   = [];
		this.addRequest = this.addRequest.bind( this );
		this.run        = this.run.bind( this );

		$( document.body )
			.on( 'click', '.add_to_cart_button', { addToCartHandler: this }, this.onAddToCart )
			.on( 'click', '.remove_from_cart_button', { addToCartHandler: this }, this.onRemoveFromCart )
			.on( 'change', 'input.qty', { addToCartHandler: this }, this.onQuantityChange )
			.on( 'added_to_cart', this.updateButton )
			.on( 'ajax_request_not_sent.adding_to_cart', this.updateButton )
			.on( 'added_to_cart removed_from_cart', { addToCartHandler: this }, this.updateFragments );
	};

	/**
	 * Add add to cart event.
	 */
	AddToCartHandler.prototype.addRequest = function( request ) {
		this.requests.push( request );

		if ( 1 === this.requests.length ) {
			this.run();
		}
	};

	/**
	 * Run add to cart events.
	 */
	AddToCartHandler.prototype.run = function() {
		var requestManager = this,
			originalCallback = requestManager.requests[0].complete;

		requestManager.requests[0].complete = function() {
			if ( typeof originalCallback === 'function' ) {
				originalCallback();
			}

			requestManager.requests.shift();

			if ( requestManager.requests.length > 0 ) {
				requestManager.run();
			}
		};

		$.ajax( this.requests[0] );
	};

	/**
	 * Handle the add to cart event.
	 */
	AddToCartHandler.prototype.onAddToCart = function( e ) {
		var $thisbutton = $( this );

		if ( $thisbutton.is( '.ajax_add_to_cart' ) ) {
			if ( ! $thisbutton.attr( 'data-product_id' ) ) {
				return true;
			}

			e.preventDefault();

			$thisbutton.removeClass( 'added' );
			$thisbutton.addClass( 'loading' );

			// Allow 3rd parties to validate and quit early.
			if ( false === $( document.body ).triggerHandler( 'should_send_ajax_request.adding_to_cart', [ $thisbutton ] ) ) { 
				$( document.body ).trigger( 'ajax_request_not_sent.adding_to_cart', [ false, false, $thisbutton ] );
				return true;
			}

			var data = {};

			// Fetch changes that are directly added by calling $thisbutton.data( key, value )
			$.each( $thisbutton.data(), function( key, value ) {
				data[ key ] = value;
			});

			// Fetch data attributes in $thisbutton. Give preference to data-attributes because they can be directly modified by javascript
			// while `.data` are jquery specific memory stores.
			$.each( $thisbutton[0].dataset, function( key, value ) {
				data[ key ] = value;
			});

			// Trigger event.
			$( document.body ).trigger( 'adding_to_cart', [ $thisbutton, data ] );

			e.data.addToCartHandler.addRequest({
				type: 'POST',
				url: wc_add_to_cart_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'add_to_cart' ),
				data: data,
				success: function( response ) {
					if ( ! response ) {
						return;
					}

					if ( response.error && response.product_url ) {
						window.location = response.product_url;
						return;
					}

					// Redirect to cart option
					if ( wc_add_to_cart_params.cart_redirect_after_add === 'yes' ) {
						window.location = wc_add_to_cart_params.cart_url;
						return;
					}
					
					
					

					// Trigger event so themes can refresh other areas.
					$( document.body ).trigger( 'added_to_cart', [ response.fragments, response.cart_hash, $thisbutton ] );
					jQuery( "#menu-cart" ).addClass('active');
				},
				dataType: 'json'
			});
		}
	};

	/**
	 * Update fragments after remove from cart event in mini-cart.
	 */
	AddToCartHandler.prototype.onRemoveFromCart = function( e ) {
		var $thisbutton = $( this ),
			$row        = $thisbutton.closest( '.woocommerce-mini-cart-item' );

		e.preventDefault();

		$row.block({
			message: null,
			overlayCSS: { background: '#fff', opacity: 0.6 }
		});

		e.data.addToCartHandler.addRequest({
			type: 'POST',
			url: wc_add_to_cart_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'remove_from_cart' ),
			data: {
				cart_item_key : $thisbutton.data( 'cart_item_key' )
			},
			success: function( response ) {
				if ( ! response || ! response.fragments ) {
					window.location = $thisbutton.attr( 'href' );
					return;
				}

				$( document.body ).trigger( 'removed_from_cart', [ response.fragments, response.cart_hash, $thisbutton ] );
			},
			error: function() {
				window.location = $thisbutton.attr( 'href' );
				return;
			},
			dataType: 'json'
		});
	};
	
	/**
	 * Update fragments qunatity change cart event in mini-cart.
	 */
	AddToCartHandler.prototype.onQuantityChange = function( e ) {
			var $thisbutton = $( this ),
			$row        = $thisbutton.closest( '.woocommerce-mini-cart-item' );

		e.preventDefault();

		$row.block({
			message: null,
			overlayCSS: { background: '#fff', opacity: 0.6 }
		});
		 var item_hash = $( this ).attr( 'name' ).replace(/cart\[([\w]+)\]\[qty\]/g, "$1");
        var item_quantity = $( this ).val();
        var currentVal = parseFloat(item_quantity);
        $.ajax({
                type: 'POST',
                url: wc_add_to_cart_params.ajax_url,
                data: {
                    action: 'qty_cart',
                    hash: item_hash,
                    quantity: currentVal
                },
                success: function(data) {
                	$row.unblock();
                	var obj = jQuery.parseJSON(data);
                	 $( '.tofreeshipping' ).html(obj.counter);
                	 $( '.cart-contents-count' ).html(obj.content_count);
                	  $( '.woocommerce-mini-cart__total.total > .woocommerce-Price-amount.amount').html(obj.total);
                    
                }
            });  
        

	};

	/**
	 * Update cart page elements after add to cart events.
	 */
	AddToCartHandler.prototype.updateButton = function( e, fragments, cart_hash, $button ) {
		$button = typeof $button === 'undefined' ? false : $button;

		if ( $button ) {
			$button.removeClass( 'loading' );
			
			if ( fragments ) {
				$button.addClass( 'added' );
			}


			$( document.body ).trigger( 'wc_cart_button_updated', [ $button ] );
		}
	};

	/**
	 * Update fragments after add to cart events.
	 */
	AddToCartHandler.prototype.updateFragments = function( e, fragments ) {
		if ( fragments ) {
			$.each( fragments, function( key ) {
				$( key )
					.addClass( 'updating' )
					.fadeTo( '400', '0.6' )
					.block({
						message: null,
						overlayCSS: {
							opacity: 0.6
						}
					});
			});

			$.each( fragments, function( key, value ) {
				$( key ).replaceWith( value );
				$( key ).stop( true ).css( 'opacity', '1' ).unblock();
			});

			$( document.body ).trigger( 'wc_fragments_loaded' );
		}
	};

	/**
	 * Init AddToCartHandler.
	 */
	new AddToCartHandler();
	
	$('form.cart').on('submit', function(e) {
				e.preventDefault();

				var form = $(this);
				var $thisbutton = $('.single_add_to_cart_button');
				var $thisbuttontest = $('.single_add_to_cart_button');
				$thisbutton.removeClass( 'added' );
				$thisbutton.addClass( 'loading' );
				
				


				var formData = new FormData(this);	
				formData.append('add-to-cart', form.find('[name=add-to-cart]').val() );

				// Ajax action.
				$.ajax({
					url: wc_add_to_cart_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'ace_add_to_cart' ),
					data: formData,
					type: 'POST',
					processData: false,
					contentType: false,
					complete: function( response ) {
						response = response.responseJSON;

						if ( ! response ) {
							return;
						}

						if ( response.error && response.product_url ) {
							window.location = response.product_url;
							return;
						}
						

						// Redirect to cart option
						if ( wc_add_to_cart_params.cart_redirect_after_add === 'yes' ) {
							window.location = wc_add_to_cart_params.cart_url;
							return;
						}
						
						
					
					if ( $thisbuttontest.is( '.rutinaprod' )) {
						window.location = my_script_vars.woo_checkout_url;
						return;
					}

						var $thisbutton = form.find('.single_add_to_cart_button'); //
//						var $thisbutton = null; // uncomment this if you don't want the 'View cart' button

						// Trigger event so themes can refresh other areas.
						$( document.body ).trigger( 'added_to_cart', [ response.fragments, response.cart_hash, $thisbutton ] );

						jQuery( "#menu-cart" ).addClass('active');
						
					}
				});
			});
			
			jQuery(document).on('click', '.plus', function(){ 
            // Get current quantity values
            var qty = jQuery( this ).closest( 'div.qselectcart' ).find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));
             if ( max && ( max <= val ) ) {
                  qty.val( max ).trigger( "change" );
               } else {
                  qty.val( val + step ).trigger( "change" );
               }
}); 
			jQuery(document).on('click', '.CUSplus', function(){ 
	
            // Get current quantity values
            var qty = jQuery( this ).closest( 'div.customQuantity' ).find( '.chustomPrice' );
            var val   = parseFloat(qty.val());
            if(isNaN(val)) {
				var val = 0;
				};
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));
             if ( max && ( max <= val ) ) {
                  qty.val( max ).trigger( "keypress" );
               } else {
                  qty.val( val + step ).trigger( "keypress" );
               }
}); 

jQuery(document).on('click', '.CUSminus', function(){ 
            // Get current quantity values
            var qty = jQuery( this ).closest( 'div.customQuantity' ).find( '.chustomPrice' );
            var val   = parseFloat(qty.val());
            if(isNaN(val)) {
				var val = 0;
				};
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));
               if ( min && ( min == val ) ) {
                  qty.val( min ).trigger( "keypress" );
                  
               } else if ( val > 0 ) {
                  qty.val( val - step ).trigger( "keypress" );
               }
}); 
jQuery(document).on('click', '.minus', function(){ 
            // Get current quantity values
            var qty = jQuery( this ).closest( 'div.qselectcart' ).find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var item_remove = jQuery( this ).closest( '.woocommerce-mini-cart-item' ).find( '.remove.remove_from_cart_button' )
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));
               if ( min && ( min >= val ) ) {
                  qty.val( min ).trigger( "change" );
                  
               } else if ( val > 1 ) {
                  qty.val( val - step ).trigger( "change" );
               } else if (val == 1){
               	item_remove.trigger( "click" );
               }
}); 
});
