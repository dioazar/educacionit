$(document).ready(function(){
/*
    var inBasket = 0;

    $(".draggable").draggable({
                                containment:'document',
                                cursor:'move',
                                stop:stopDrag,
                                start:startDrag,
                                helper:'clone'
    });

    $("#basket > .elements").droppable({
                            drop: function( event, ui ) {
                                inBasket=1;
                            }
    });

    function startDrag(ev,ui){

        inBasket=0;

    }
*/
  
    $('.product .icon a').on('click',function(e){

        e.preventDefault();
        addToBasket($(this).parent().parent());
        
    });

    function updateTotal(total){

        var curTotal=   parseFloat($('#basket .total .num').text());
        total = isNaN(total) ? 0 : total;
        $('#basket .total .num').text(total + curTotal);

        
    }

    function getBasketItemAmount(elm){

        return parseInt($(elm).find('.amount').text().trim());

    }
    
    function getBasketItemPrice(elm){

        return parseFloat($(elm).find('.price').text().trim());

    }
    
    function addToBasket(elm){
        
        if(!$('#basket .elements').find('.product').length){

            $('#basket .elements').empty();

        }

        var elm         =   '#'+$(elm).attr('id');
        var prId        =   $(elm).attr('data-product');
        var basId       =   'basket_item_'+$(elm).attr('id');
        var price       =   getBasketItemPrice(elm);
        var name        =   $(elm).find('.name').text().trim();

        updateTotal(price);

        if($('#'+basId).length){

            var amountElm   =   $('#'+basId).find('.amount');
            $(amountElm).text(parseInt(amountElm.text())+1);
            return;

        }

        addFormInput(prId);

        $('#basket .elements').append(itemHtml(basId,name,1));

        bindRemoveEvent(prId,basId);

    }
    
    function addFormInput(prId){

        var input = '<input id="item_'+prId+'" type="hidden" name="products[]" value="'+prId+'" />';
        
        return $('#basket .items').append(input);
        
    }
    
    function removeFormInput(prId){

        return $('#basket .items').find('#item_'+prId).remove();

    }
    
    function itemHtml(basId,name,amount){
        
        var item = '<div id="'+basId+'" class="product">';
        item += '<div class="name">'+name+'</div>';
        item += '<div class="amount">'+amount+'</div>';
        item += '<div class="remove">x</div>';
        item += '</div>';        
        
        return item;

    }
    
    function bindRemoveEvent(prId,basId){

        var elm = $('#'+basId);

        $(elm).find('.remove').on('click',function(e){

            removeFormInput(prId);
            var amount = parseInt($(elm).find('.amount').text().trim());
            updateTotal((getBasketItemPrice('#product_'+prId)*amount)*-1);
            $(this).parent().remove();

        });

    }
    
    function stopDrag(ev,ui){

        if(!inBasket){

            return;

        }

        addToBasket($.parseHTML($(ui.helper[0]).html()));

    }

    
});