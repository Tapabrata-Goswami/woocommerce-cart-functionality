<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<h2><?php esc_html_e( 'Cart totals', 'woocommerce' ); ?></h2>

	<table cellspacing="0" class="shop_table shop_table_responsive">

		<tr class="cart-subtotal">
			<th><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
			<td data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
				<td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

		<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

			<tr class="shipping">
				<th><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></th>
				<td data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
			</tr>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php
		if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
			$taxable_address = WC()->customer->get_taxable_address();
			$estimated_text  = '';

			if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
				/* translators: %s location. */
				$estimated_text = sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
			}

			if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
				foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
					?>
					<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<th><?php echo esc_html( $tax->label ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></th>
						<td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
					<?php
				}
			} else {
				?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></th>
					<td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
				<?php
			}
		}
		?>

		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

		<tr class="order-total">
			<th><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
			<td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
		</tr>

		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

	</table>
	

	
<!-- This Part Made By @Tapabrata Goswami -->

<!-- Banner PHP code  -->
	
<?php 
		global $woocommerce;  
		$amount = floatval( preg_replace( '#[^\d.]#', '', $woocommerce->cart->get_cart_total() ) );
		// echo $amount;
		global $cart_item, $cart_item_key;
		// $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
		// echo $product_id;
		// foreach( WC()->cart->get_cart() as $cart_item ){
		// 	$product_id = $cart_item['product_id'];
		// 	break;
		// }

		$products_ids_array = array();

		foreach( WC()->cart->get_cart() as $cart_item ){
    	$products_ids_array[] = $cart_item['product_id'];
		}

		// echo $products_ids_array[0];

		// echo $products_ids_array[1];
		// echo $product_id;
		// $product_id = 13;
		if(($products_ids_array[1] == NULL) and ($products_ids_array[0] == 3343)){ 
			// $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
			// echo $product_id;
	?>

		<div class="hide_checkout">
			<span class="hide_checkout_h">SORRY! If you need to buy this product than you need to add some extra product.</span>
		</div>
		<style>
			.hide_checkout{
				background-color: #e00d7b;
				border-radius: 8px;
				/height: 64px;/
				padding: 2px;
				width: auto;
			}

			.hide_checkout_h{
				font-size:20px;
				font-weight: 500;
				text-align: center;
				color:black;
			}

		</style>


	<?php }else{

	?>
		<div class="wc-proceed-to-checkout">
			<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
		</div>

	<?php } ?>

<!--End-->

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>



<!--Banner HTML code-->

    <div id="hpopup" class="popup">
        <button id="close">&times;</button>
        <div class="btn_box">
            <div class="btn_link">
                <a class="btn1_add" href="?add-to-cart=3343&quantity=1" >ADD TO CART</a>
            </div>
        </div>
    </div>

    
<!--Banner CSS code-->

    <style>
    
    .btn_box{
        display:inline;
    }
    .btn1_add{
        color:#ffffff;
        background-color:#E20B7B;
        padding:10px 15px;
        border:2px solid #E20B7B;
        border-radius:5px;
        position: absolute;
        margin-top: 65%;
        margin-left: -40%;
    }
    .btn1_add:hover{
        color:#ffffff;
        background-color:#B8CF57;
        border:2px solid #B8CF57;
    }
    .popup{
    background-color: #ffffff;
    background-image: url("https://babymelon.in/wp-content/uploads/2022/12/get-glowing-skin11.png");
    /width: 450px;/
    padding: 30px 40px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 30%;
    border-radius: 8px;
    width:400px;
    height:400px;
    font-family: "Poppins",sans-serif;
    display: none;
    text-align: center;
    }
    .popup button{
    display: block;
    margin: -40px -55px 10px auto;
    background-color: transparent;
    font-size: 30px;
    color: black;
    border: none;
    outline: none;
    cursor: pointer;
    }

    </style>
    

<!-- Banner JS code -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>


    $(document).ready(function(){
    	// show automatically after 1s
    	setTimeout(showModal,1000);
    	$("#close").click(function(){
    		$("#hpopup").hide()
    	})
    	function showModal(){
    		// get value from localStorage
    		var is_modal_show = sessionStorage.getItem('alreadyShow');
    		if(is_modal_show != 'alredy shown'){
    			$("#hpopup").show()
    			sessionStorage.setItem('alreadyShow','alredy shown');
    		}else{
    			console.log(is_modal_show);
    		}
    	}
    })

    </script>