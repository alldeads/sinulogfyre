$( function () {

    var run = {

        'init' : function () {

            this.add_product_quantity();
            this.method_information();
        },

        'add_product_quantity' : function () {

            var price = $("#product_price").val();

            $("#p_quantity").keyup( function () {
                
                var quantity = $(this).val();
                var text = quantity * price;
                var p_quantity = $("#product_quantity");

                if ( quantity < 1 ) {
                    $("#price_text").text( "₱" + price + ".00");
                    p_quantity.val(1);
                }

                else if ( quantity !== "" && quantity !== undefined) {
                    $("#price_text").text( "₱" + text + ".00");
                    p_quantity.val(quantity);
                }

            } );
        },

        'method_information' : function () {
            $("#payment_method").on( 'change', function () {

                var x = $(this).val();

                if ( x == 1 ) {
                    $("#palawan").show();
                    $("#seven").hide();
                    $("#gcash").hide();
                } else if ( x == 3 ) {
                    $("#palawan").hide();
                    $("#seven").show();
                    $("#gcash").hide();
                } else if ( x == 4 ) {
                    $("#palawan").hide();
                    $("#seven").hide();
                    $("#gcash").show();
                }
            } );
        }
    };

    run.init();
} );