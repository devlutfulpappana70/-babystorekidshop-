// Requires jQuery

// Initialize slider:
(function ($) {
    if( $('[name="kc_min_price"]').length > 0 ){

        const min_price = $('[name="kc_min_price"]').val() || 0;
        const max_price = $('[name="kc_max_price"]').val() || 100;

        $(".noUi-handle").on("click", function () {
            $(this).width(50);
        });
        var rangeSlider = document.getElementById("slider-range");
        var rangeSlider2 = $("#slider-range");

        if (rangeSlider2.length > 0) {
            var moneyFormat = wNumb({
                decimals: 0,
                thousand: ",",
                prefix: "$"
            });
            noUiSlider.create(rangeSlider, {
                start: [min_price, max_price],
                step: 1,
                range: {
                    min: [Number(min_price)],
                    max: [Number(max_price)]
                },
                format: moneyFormat,
                connect: true
            });

            // Set visual min and max values and also update value hidden form inputs
            rangeSlider.noUiSlider.on("update", function (values, handle) {
                $(".min-value-money").html(values[0]);
                $(".max-value-money").html(values[1]);
                $(".min-value").val(moneyFormat.from(values[0]));
                $(".max-value").val(moneyFormat.from(values[1]));
            });
        }
    }

})(jQuery);
