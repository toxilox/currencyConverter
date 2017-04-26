$(document).ready(function(){

    var url = "/";

    //send POST request to url and clear the currency table from rows
    $('#truncate').click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type: "POST",
            url: url,
            success: function (data) {
                // console.log(data);

                $(".currency_row").remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    $('#update_currencies').click(function(){

      $.ajax({
        dataType: 'json',
        url: 'https://openexchangerates.org/api/currencies.json',
        success: function (data) {
          var obj = data;
          for (var key in obj){
            console.log(key);
          }
        },
        error: function (data) {
            console.log('Error:', data);
        }
      });
    });
});
