$(document).ready(function(){
  // This handler does the magic
  var PaymentHadler = function(){
      handleFieldEvent = function(event) {
        iconType = document.getElementsByClassName("icon-type")[0];
        iconType.className = "icon-type";
        if (event.card) iconType.className += " icon-type-" + event.card.type;
      }
     
      $.ajax({
        url: '/braintree/token'
      }).done(function(response){
          if(typeof braintree != "undefined"){
            // braintree.setup(response.data.token, 'dropin', {
            //   container: 'dropin-container'
            // });
            braintree.setup(response.data.token, "custom", {
              id: "add_card_form",
              hostedFields: {
                number: {
                  selector: "#card-number",
                  placeholder: "Card Number"
                },
                cvv: {
                  selector: "#cvv",
                  placeholder: "CVV"
                },
                expirationYear: {
                  selector: "#expiration-year",
                  placeholder: "Expiration Year"
                },
                expirationMonth: {
                  selector: "#expiration-month",
                  placeholder: "Expiration Month"
                },
                styles: { // custom styles
                  '.invalid': {
                    'color': '#D0041D'
                  }
                },
                onFieldEvent: handleFieldEvent
              },
            });
            braintree.setup(response.data.token, "custom", {
              paypal: {
                container: "paypal-container",
              },
              onPaymentMethodReceived: function (obj) {
                $("#payment_method_nonce").val(obj.nonce)
                $("#paypal_loading_btn").removeClass("d-none");
                $("#add_paypal_form").submit();
              }
            });
            
          }
      });  
  }
  
  var DraggableHandler = function(){
    if (!jQuery().sortable) {
            return;
    }

    $(".sortable-portlet").sortable({
        connectWith: ".sortable",
        items: ".sortable", 
        opacity: 0.8,
        coneHelperSize: true,
        placeholder: 'draggable-sortable-placeholder',
        forcePlaceholderSize: true,
        tolerance: "pointer",
        helper: "clone",
        tolerance: "pointer",
        forcePlaceholderSize: !0,
        helper: "clone",
        cancel: ".draggable-sortable-empty, .draggable-fullscreen", // cancel dragging if portlet is in fullscreen mode
        revert: 250, // animation in milliseconds
        update: function(b, c) {
            if (c.item.prev().hasClass("draggable-sortable-empty")) {
                c.item.prev().before(c.item);
            }                    
        },
        stop: function(){
          var main_method;
          main_method = $(".sortable-portlet div.sortable:first").data("id");

          var info = {
            main_method: main_method,
            _token: $('meta[name="csrf-token"]').attr('content')
          }

          $.ajax({
          type: "post",
            url: "/balance/set_main",
            data: info,
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');
                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
              },        
            success: function (response){
              if(response.status = 'success'){
                $("#main_method").val(main_method)
              }
            }
        })
        }


    });
  }
    
  PaymentHadler();
  DraggableHandler();
})