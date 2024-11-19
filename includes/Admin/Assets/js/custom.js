(function($) {

var xhr;

$(document).ready(init);



function init() {

    $('#list-items').sortable({
        stop: function (event, ui) {
            var position = $(this).sortable('toArray');

           xhr = $.ajax({
                url : ajaxurl,
                type: 'POST',
                data: {
                  'action'  : 'update_item',
                  'position': position
                },
                beforeSend: function () {},
                success: function (response) {
                  var resp = JSON.parse(response);
                }
            });
        }
    });

    $('body').on('click','.delete-item', function(e) {
        e.preventDefault();

        if (xhr && xhr.readyState != 4) xhr.abort();

        let itemId = $(this).attr('data-id');

        $(this).parent().remove();
        
        xhr = $.ajax({
            url : ajaxurl,
            type: 'POST',
            data: {
              'action'  : 'delete_item',
              'item_id' : itemId,
            },
            beforeSend: function () {},
            success: function (response) {
              var resp = JSON.parse(response);
            }
        });
    })

}
}(jQuery));

