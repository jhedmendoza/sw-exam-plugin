(function($) {

var xhr;

var addItemForm = $('#add-item-form');

$(document).ready(init);


function init() {

    initializeValidation();

    $('#list-items').sortable({
        stop: function (event, ui) {

          var position = $(this).sortable('toArray');

           $.ajax({
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

    $('.btn-save').on('click', function(e) {
      e.preventDefault();

        if (xhr && xhr.readyState != 4) xhr.abort();

        let itemName = $('#item-name').val().trim();
        let itemPosition = $('#item-position').val().trim();

        if ( addItemForm.valid() == true)  {
          xhr = $.ajax({
            url : ajaxurl,
            type: 'POST',
            data: {
              'action'        : 'insert_item',
              'item_name'     : itemName,
              'item_position' : itemPosition,
            },
            beforeSend: function () {},
            success: function (response) {
              var resp = JSON.parse(response);
              if (resp.status) {
                if ( $('#addItemModal').modal('hide') ) {
                  location.reload();
                }
              }
            }
          });
        }
    })
}

function initializeValidation() {

    addItemForm.validate({
      rules: {
          item_name: {
            required: true
          },
          item_position: {
            required: true
          },
      },
      messages: {
          item_name: {required:'This is required.'},
          item_position: {required:'This is required.'},
      },
      errorPlacement: function(error, element) {
        error.appendTo(element.parent('.input-group').siblings('.err_container'));
    },

  });
}


}(jQuery));

