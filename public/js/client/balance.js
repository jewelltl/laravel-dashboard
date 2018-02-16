$(document).ready(function(){
	$.ajax({
      url: '/braintree/token'
    }).done(function(response){
        if(typeof braintree != "undefined"){
          braintree.setup(response.data.token, 'dropin', {
            container: 'dropin-container',
            onReady: function(){
              $("#payment-button").removeClass('hidden');
            }
          });
        }
    });
    
})