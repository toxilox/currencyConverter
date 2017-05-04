$(document).ready(function(){

    var url = "/";

    $('#truncate').click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: "POST",
            url: url + 'clear-currencies',
            success: function (data) {

                $(".currencyRow").remove();
                $(".currencyOption").remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    $('#update_currencies').click(function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({

          type: "POST",
          url: url + 'update-currencies',
          success: function (data) {
            $(".currency_row").remove();
            $.each(data, function(i, item) {
              $('.currencyConvert').append($('<option>', {
                value: item.iso_4217,
                text : item.iso_4217,
                class : item.iso_4217 + 'currencyOption'
              }));
              var $tr = $('<tr>').addClass("currency_row").append(
              $('<td>').text(item.iso_4217),
              $('<td>').text(item.name),
              $('<td>').text(item.date_created),
              $('<td>').text(item.date_modified),
              $('<td>').addClass(item.iso_4217 + "_rate").text(item.rate)
            ).appendTo('#currency_table');
            });
          },
          error: function (data) {
              console.log('Error:', data);
          }
      });
    });
});
