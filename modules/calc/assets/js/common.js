function GruzchikiCalc() {

    var formData = $('#gruzchik-calc').serialize();
    $.ajax({
        url: '/calc/default/gruzchik-calculate',
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,

        success: function (response) {

            var wrap = $('#gruzchik-total-price');

//            console.log(wrap);

            wrap.html(response);

            $('#gruzchikcalcform-summ').val(response);


        }
    });

}


