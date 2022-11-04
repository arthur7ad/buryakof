$(".d-readmore").dReadmore({
    beforeToggle: function ($element, expanded) {
        if (!expanded) {
            console.log("true")
        }
    },
    afterToggle: function ($element, expanded) {
        if (expanded) {
            console.log("true")
        }
    }
});