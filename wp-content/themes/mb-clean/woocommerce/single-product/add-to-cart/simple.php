<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
<?php
$value = get_field( "ar_rodyti_variantus" );
        $cuttingfee = get_field( "cutting_fee" );
        $thickness = get_field( "price_nuo_thickness_mm" );
        if( $value ) {?>


        <style>
            input[type=text] {
                width: 100%;
                margin-bottom: 25px;
                padding: 6px 15px;
                height: 42px;
                line-height: 30px;
                border: 1px solid #e9e9e9;
                outline: 0;
                font-family: inherit;
                font-size: 14px;
                background-color: transparent;
                color: #949494;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box
            }
            .price-title, .woocommerce-Price-amount {
            	font-size: 20px !important;
            }
            .price del {
            	display: none !important;
            }
        </style>

        <div id="varForm" style="margin-top:30px;clear:both;overflow:hidden;">
            <div class="row col-md-12 cusevalue">
                <label class="control-label" style="font-weight:bold;display:block;width:100%;">NO. 1</label>
                <div style="width:100%;display:block;clear:both;overflow:hidden;">
                    <div style="float:left;width:40%;">Bredde (m):</div>
                    <div style="float:left;width:55%;">
                        <input type="text" class="form-control checkas" data-var="1" data-name="width" name="var[1][width]" placeholder="0.00" />
                    </div>
                    <input type="hidden" name="var[1][thisprice]" class="thisprice" value="0">
                </div>
                <div style="width:100%;display:block;clear:both;overflow:hidden;">
                    <div style="float:left;width:40%;">Lengde (m):</div>
                    <div style="float:left;width:55%;">
                        <input type="text" class="form-control checkas" data-var="1" data-name="height" name="var[1][height]" placeholder="0.00" />
                    </div>
                </div>
                <div style="display:block;font-weight: 600;color:#393939;" class="priceLbl-1">

                </div>
            </div>
        </div>
        <script>
            function addCommas(nStr) {
                nStr += '';
                var x = nStr.split('.');
                var x1 = x[0];
                var x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                return x1 + x2;
            }
            jQuery(document).ready(function() {
            	
            	
            	jQuery("body").on('keyup keypress', ".checkas", function (e) {
jQuery(this).val(function(index, value) {
   return value.replace(',', '.');
});
});


jQuery("body").on('click', ".disabled.startselect", function (e) {
	e.preventDefault();
  alert( "Gör produktval innan du lägger till produkten i din kundvagn." );
});

jQuery(".cart").submit(function (e) {
	 var errors = 0;
    $("#varForm :input").map(function(){
         if( !$(this).val() ) {
              errors++;
        }
    });
    if(errors > 0){
        alert( "Gör produktval innan du lägger till produkten i din kundvagn." );
        return false;
    }
    
    if (width > <?php echo get_field('width_max_riba'); ?>) { alert('BS! Max bredd:<?php echo get_field('width_max_riba'); ?>'); return false; }
    if (height > <?php echo get_field('height_max_riba'); ?>) { alert('NB Max längd: <?php echo get_field('height_max_riba'); ?>'); return false; }
  
});


                var current = 0;
                var price = 0;
                var priceTotal = 0;
                var width = 0;
                var height = 0;
                var qty = 0;
                jQuery(window).load(function() {
                	jQuery(".checkas").val("");
                    jQuery(".single_add_to_cart_button").addClass("disabled");
                    jQuery(".single_add_to_cart_button:not(.wc-variation-selection-needed)").addClass("startselect");
                    current = <?php echo $product->get_price(); ?> //jQuery('.price .woocommerce-Price-amount.amount').text();
                    
                    current = parseInt(current.replace(",", ""));
                    var a = 0;
                    jQuery(".thisprice").each(function() {
                        a += parseInt(jQuery(this).val());
                    });
                    if(priceTotal > 0) {
                        jQuery('.price .woocommerce-Price-amount.amount').text(addCommas(priceTotal.toFixed(2)));
                    }
                });
                jQuery("input[type='number']").keydown(function (e) {
                    if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                        (e.keyCode >= 35 && e.keyCode <= 40)) {
                        return;
                    }
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                    if(jQuery(this).val().length >= 3) {
                        e.preventDefault();
                    }
                });
                jQuery("body").on('keyup keypress', "input[type='text']", function (e) {
                    var nmbr = jQuery(this).data('var');
                        width = parseFloat(jQuery('input[name="var[' + nmbr + '][width]"]').val());
                        height = parseFloat(jQuery('input[name="var[' + nmbr + '][height]"]').val());
                        qty = 1;
                        price = parseInt(current) * (width * height * qty) + (qty * parseFloat(<?php echo $cuttingfee; ?>));
						console.log('current:' + current + ' width:' + width + ' height:' + height + ' qty:' + qty + ' price:' + price);
                        if(!isNaN(price)){
							jQuery('input[name="var[' + nmbr + '][thisprice]"]').val(price);
						}
                        var a = 0;
                        if(width > 0 && height > 0 && qty > 0) {
                            jQuery(".single_add_to_cart_button").removeClass("disabled");
                        }
                        if (width > <?php echo get_field('width_max_riba'); ?>) { alert('BS! Max bredd:<?php echo get_field('width_max_riba'); ?>'); jQuery(".single_add_to_cart_button").addClass("disabled"); e.preventDefault(); }
                        if (height > <?php echo get_field('height_max_riba'); ?>) { alert('NB Max längd: <?php echo get_field('height_max_riba'); ?>'); jQuery(".single_add_to_cart_button").addClass("disabled"); e.preventDefault(); }
                        jQuery(".thisprice").each(function() {
                            a += parseInt(jQuery(this).val());
                        });
                        priceTotal = parseInt(a);
                        if(a == 0) { priceTotal = current; }
						if(!isNaN(priceTotal)){
                        	jQuery('.prekeIN .price .woocommerce-Price-amount.amount').text(addCommas(priceTotal.toFixed(2)));
						}else{
							jQuery('.prekeIN .price .woocommerce-Price-amount.amount').text('€ --')
						}

                });
            });


jQuery(window).on('load', function () {
	jQuery(".single_add_to_cart_button").addClass("disabled");
	jQuery(".reset_variations").trigger("click");
        });


            
        </script>
    <?php } ?>
		<?php
		do_action( 'woocommerce_before_add_to_cart_quantity' );

		woocommerce_quantity_input( array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		) );

		do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>

		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><i class="eurofont icon-cart"></i></button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
