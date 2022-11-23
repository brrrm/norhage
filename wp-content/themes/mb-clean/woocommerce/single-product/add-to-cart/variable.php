<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?></p>
	<?php else : ?>
		<table class="variations" cellspacing="0">
			<tbody>
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
					<tr>
						<td class="label"><label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?></label></td>
						<td class="value">
							<?php
								wc_dropdown_variation_attribute_options( array(
									'options'   => $options,
									'attribute' => $attribute_name,
									'product'   => $product,
								) );
								echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) ) : '';
							?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php
        $value = get_field( "ar_rodyti_variantus" );
        $cuttingfee = get_field( "cutting_fee" );
        $thickness = get_field( "price_nuo_thickness_mm" );
		$additional_stuff = get_field( "additional_stuff" );
		$stuff = get_field( "stuff" );
		
		if($additional_stuff){
			?>
			
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
        </style>
			<div class="custom-woocommerce-variation-price" style="display: none;"><span class="price-title">Drivhus Pris - </span><span class="price"></span></div>
        <div id="varForm" style="clear:both;overflow:hidden;">
            <div class="row col-md-12" style="width: 75%;">
            	<?php 
            	$xas = 0;
            	foreach ($stuff as $values_new){?>
                <div style="width:100%;display:block;clear:both;overflow:hidden;">
                    <div style="float:left;width:50%;">
                    	<img src="<?php echo $values_new['nuotrauka']; ?>" />
                    </div>
                    <div class="info-block" style="float:left;width:50%;">
                    	<div class="additional-product-name">
						 	<?php echo $values_new['pavadinimas']; ?> 
						</div>
                    	<?php echo wc_price($values_new['kaina']); ?>
                    	<div class="customQuantity">
                    	<button type="button" class="CUSminus"><i class="icofont-minus"></i></button>
                        <input type="number"
                         oninput="javascript: if (this.valueAsNumber > this.max) this.valueAsNumber = this.max;"
                         class="form-control chustomPrice" data-price="<?php echo $values_new['kaina'] ?>" data-varnum="<?php echo $xas ?>" data-name="custom_field" name="varQuantity[<?php echo $xas ?>]" value="" placeholder="0" min="0" step="1" max="<?php echo $values_new['max_kiekis'] ?>"/>
                         <button type="button" class="CUSplus"><i class="icofont-plus"></i></button>
                         </div>
                    </div>
                    <input type="hidden" name="varPrice[<?php echo $xas ?>][thisprice]" class="thisprices" value="0">
                </div>
                <?php $xas++;} ?>
                
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
			
				var current = 0;
                var price = 0;
                var priceTotal = 0;
                var width = 0;
                var height = 0;
                var qty = 0;
				 jQuery("body").on('change', "select", function () {
                	jQuery(".chustomPrice").val("");
                    current = jQuery('.woocommerce-variation-price .price .woocommerce-Price-amount.amount').last().text();
                    current = parseInt(current.replace(",", ""));
                    if(current > 0){
                    	 jQuery('.custom-woocommerce-variation-price').show();
                    jQuery('.custom-woocommerce-variation-price .price').html(jQuery('.woocommerce-variation-price .price').html())
                    }
                    var a = 0;
                    jQuery(".thisprices").each(function() {
                        a += parseInt(jQuery(this).val());
                    });
                });
				     jQuery("body").on('keyup keypress', "input[type='number']", function (e) {
				     	
				    var nmbr = jQuery(this).data('varnum'); 	  
                    var custom_price = jQuery(this).data('price');
                    var custom_quantity = jQuery(this).val();
                    price = parseInt(custom_price*custom_quantity);
                    if(price >= 0){
                    	 jQuery('input[name="varPrice[' + nmbr + '][thisprice]"]').val(price);
                    }
                   
                    var a = 0;
                    jQuery(".thisprices").each(function() {
                            a += parseInt(jQuery(this).val());
                        });
                        if(isNaN(current)){
                        	current = jQuery('.woocommerce-variation-price .price .woocommerce-Price-amount.amount').last().text();
                   			 current = parseInt(current.replace(",", ""));
                        }
                        priceTotal = current + parseInt(a);
                        if(a == 0) { priceTotal = current; }
                        jQuery('.woocommerce-variation-price .price .woocommerce-Price-amount.amount').last().text(addCommas(priceTotal.toFixed(2)))
                    console.log(nmbr);
                  


                });
				
				
			</script>
			
		<?php }
		
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
                jQuery("body").on('change', "select", function () {
                	jQuery(".checkas").val("");
                    jQuery(".single_add_to_cart_button").addClass("disabled");
                    jQuery(".single_add_to_cart_button:not(.wc-variation-selection-needed)").addClass("startselect");
                    current = jQuery('.woocommerce-variation-price .price .woocommerce-Price-amount.amount').text();
                    current = parseInt(current.replace(",", ""));
                    var a = 0;
                    jQuery(".thisprice").each(function() {
                        a += parseInt(jQuery(this).val());
                    });
                    if(priceTotal > 0) {
                        jQuery('.woocommerce-variation-price .price .woocommerce-Price-amount.amount').text(addCommas(priceTotal.toFixed(2)));
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
                        price = parseInt(current * (width * height * qty) + qty * <?php echo $cuttingfee; ?>);
										 console.log(price);
                        jQuery('input[name="var[' + nmbr + '][thisprice]"]').val(price);
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
                        	jQuery('.woocommerce-variation-price .price .woocommerce-Price-amount.amount').text(addCommas(priceTotal.toFixed(2)));
						}

                });
            });


jQuery(window).on('load', function () {
	jQuery(".reset_variations").trigger("click");
        });


            
        </script>
    <?php } ?>
		<div class="single_variation_wrap">
			<?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * Hook: woocommerce_after_single_variation.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );
