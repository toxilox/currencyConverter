$(document).ready(function(){

  $('.currencyConvert').change(function(){
    if ( $('#currency_from').val() != "" && $('#currency_to').val() != "" ) {
      var curFrom = $('#currency_from').val();
      var curTo = $('#currency_to').val();
      var curAmount = parseFloat($('#currency_amount').val());
      var fromRate = parseFloat($('.'+curFrom+'_rate').html());
      var toRate = parseFloat($('.'+curTo+'_rate').html());

      $('#result').html(toRate / fromRate * curAmount);
    }
  });
});
