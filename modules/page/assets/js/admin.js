var Url = {
    header: '',
    translite: '',
    parent_url: '',
    parent_id: 0,
    url_wrap: $('#url-url'),
    update: function () {

        if (Url.url_wrap.val() == '')
            $.get('/page/admin/create-url', {header: Url.header, parent_id: Url.parent_id})
                    .done(function (data) {
                        console.log(data);
//                    alert("Data Loaded: " + data);

                        Url.url_wrap.val(data);
                    });

    },
    changeHeader: function (el) {

        Url.header = el.val();
        Url.update();

    },
    changeParent: function (el) {

        Url.parent_id = el.val();
        Url.update();

    },

};