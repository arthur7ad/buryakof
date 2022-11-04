$('.calc-slider').on('afterChange', function (event, slick, direction) {
    console.log(direction);

    Calc.setCar();
    // left
});