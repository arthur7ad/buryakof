/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function UpdateAll() {


    var set = $('.kv-row-checkbox:checked');
    var length = set.length;
    set.each(function (index, element) {

        var val = JSON.parse($(this).val());

        $.get("/page/admin/generate-content?id=" + val.id)
                .done(function (data) {

                    if (index === (length - 1)) {
//                        setTimeout('document.location.reload(true)', 10000);
                        document.location.reload(true);
                    }
                });


    })


//    alert(2);
}
