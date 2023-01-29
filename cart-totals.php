<?php

// @see https://www.linkedin.com/in/tapabrata-goswami/

global $woocommerce;
$amount = floatval(preg_replace('#[^\d.]#', '', $woocommerce->cart->get_cart_total()));
global $cart_item, $cart_item_key;

$total_iteam =  WC()->cart->get_cart_contents_count();
$products_ids_array = array();

foreach (WC()->cart->get_cart() as $cart_item) {
    $products_ids_array[] = $cart_item['product_id'];
    $js_product_id = array($cart_item);
}

if (($products_ids_array[1] == NULL) and ($products_ids_array[0] == 3343)) {
?>

    <div class="hide_checkout">
        <span class="hide_checkout_h">SORRY! To avail this offer please add atleast one more product to the cart. <a href="https://babymelon.in/shop/" style="Color:#ffffff;"> &#128073 Shop </a></span>
    </div>
    <style>
        .hide_checkout {
            background-color: #e00d7b;
            border-radius: 8px;
            /*height: 64px;*/
            padding: 2px;
            width: auto;
        }

        .hide_checkout_h {
            font-size: 20px;
            font-weight: 500;
            text-align: center;
            color: black;
        }
    </style>


<?php } else {

?>
    <div class="wc-proceed-to-checkout">
        <?php do_action('woocommerce_proceed_to_checkout'); ?>
    </div>

<?php } ?>

<!--End-->
<?php do_action('woocommerce_after_cart_totals'); ?>
</div>

<!--Upsell Content-->

<div id="hpopup" class="popup">
    <button id="close">&times;</button>
    <div class="btn_box">
        <div class="btn_link">
            <a class="btn1_add" href="?add-to-cart=3343&quantity=1">ADD TO CART</a>
        </div>
    </div>
</div>

<style>
    .btn_box {
        display: inline;
    }

    .btn1_add {
        color: #ffffff;
        background-color: #E20B7B;
        padding: 10px 15px;
        border: 2px solid #E20B7B;
        border-radius: 5px;
        position: absolute;
        margin-top: 65%;
        margin-left: -40%;
    }

    .btn1_add:hover {
        color: #ffffff;
        background-color: #B8CF57;
        border: 2px solid #B8CF57;
    }

    .popup {
        background-color: #ffffff;
        background-image: url("https://babymelon.in/wp-content/uploads/2023/01/limited-time403.png");
        /*width: 450px;*/
        padding: 30px 40px;
        position: absolute;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 30%;
        border-radius: 8px;
        width: 400px;
        height: 400px;
        font-family: "Poppins", sans-serif;
        display: none;
        text-align: center;
    }

    .popup button {
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // show automatically after 1s
        setTimeout(showModal, 1000);
        $("#close").click(function() {
            $("#hpopup").hide()
        })

        function showModal() {
            var total_cart_iteam = "<?php echo $total_iteam ?>";
            var users = [total_cart_iteam];

            for (let i = 0; i < total_cart_iteam; i++) {
                users = <?php echo json_encode($products_ids_array); ?>;
            }
            var con = 0;
            for (let i = 0; i < total_cart_iteam; i++) {
                if (users[i] == 3343) {
                    con = 3343;
                }
            }

            var is_modal_show = sessionStorage.getItem(con);
            if (is_modal_show != 3343) {
                $("#hpopup").show()
                var total_cart_iteam = "<?php echo $total_iteam ?>";
                for (let i = 0; i < total_cart_iteam; i++) {
                    users = <?php echo json_encode($products_ids_array); ?>;
                }

                for (let i = 0; i < total_cart_iteam; i++) {
                    if (users[i] == 3343) {
                        sessionStorage.setItem(con, 3343);
                    }
                }
            } else {
                console.log(is_modal_show);
            }
        }
    })
</script>
    