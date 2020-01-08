$( function () {

    var run = {

        'init' : function () {

            this.add_product_quantity();
            this.cash_on_delivery();
        },

        'add_product_quantity' : function () {

            var price = $("#product_price").val();

            $("#p_quantity").keyup( function () {
                
                var quantity = $(this).val();
                var text = quantity * price;
                var p_quantity = $("#product_quantity");

                if ( quantity < 1 ) {
                    $("#price_text").text( "₱" + price );
                    p_quantity.val(1);
                }

                else if ( quantity !== "" && quantity !== undefined) {
                    $("#price_text").text( "₱" + text );
                    p_quantity.val(quantity);
                }

            } );
        },

        'cash_on_delivery' : function () {
            $("#remittance_center_product").on( 'change', function () {

                var x = $(this).val();

                if ( x == 4 ) {
                    $("#reference_code_product").hide();
                    $("#date_paid_product").hide();
                    $("#s_phone_product").hide();
                    $("#sender_name_product").hide();
                    $("#button_product_2").hide();
                    $("#button_product_1").show();
                    $("#s_phone_product").hide();
                } else {
                    $("#reference_code_product").show();
                    $("#date_paid_product").show();
                    $("#s_phone_product").show();
                    $("#sender_name_product").show();
                    $("#button_product_1").hide();
                    $("#button_product_2").show();
                    $("#s_phone_product").show();
                }
            } );
        }
    };

    run.init();
} );