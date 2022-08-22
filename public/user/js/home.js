// $(document).on('click', '.buy-now', function(e){
//     e.preventDefault();
//     if ($(this).hasClass('disabled')) {
//         return false;
//     }
//     $(document).find('.buy-now').addClass('disabled');

//     var parent = $(this).parents('.single-carts');
//     var cart = $(document).find('.cart-shop');
//     var src = parent.find('img').attr('src');

//     var parTop = parent.offset().top;
//     var parLeft = parent.offset().left;
//     console.log(src)
//     $('<img />', {
//         class: 'img-cart-fly',
//         src: src
//     }).appendTo('body').css({
//         'top': parTop,
//         'left': parseInt(parLeft) + parseInt(parent.width()) - 50
//     });
//     setTimeout(function(){
//         $(document).find('.img-cart-fly').css({
//             'top': cart.offset().top,
//             'left':  cart.offset().left
//         });
//         setTimeout(function(){
//             $(document).find('.img-cart-fly').remove();
//             var citem = parseInt(cart.find('.count-item').data('count')) + 1;
//             cart.find('.count-item').text('('+citem+')').data('count', citem);
//             $(document).find('.buy-now').removeClass('disabled');
//         },1000);
//     },500);
// });

function AddCart(cart_id){
    $.ajax({
        url: '/Add-Cart/'+cart_id,
        type: 'GET',
     }).done(function(response){
        RenderCart(response);
        alertify.success('Success message');
     });
}

$("#change-item-cart").on("click", ".si-close i", function(){
    $.ajax({
        url: '/Delete-Item-Cart/'+$(this).data("id"),
        type: 'GET',
     }).done(function(response){
        RenderCart(response);
        alertify.success('Delete message');
     });
});

function RenderCart(response){
    $("#change-item-cart").empty();
    $("#change-item-cart").html(response);
    $("#total-quantity-show").text(!$("#total-quantity-cart").val() ? 0 : $("#total-quantity-cart").val());
}

function DeleteListItemCart(cart_id){
    $.ajax({
        url: '/Delete-Item-List-Cart/'+cart_id,
        type: 'GET',
     }).done(function(response){
        RenderListCart(response);
        alertify.success('Delete message');
     });
}

function SaveListItemCart(cart_id){
    $.ajax({
        url: '/Save-Item-List-Cart/'+cart_id+'/'+$("#quantity-item-"+cart_id).val(),
        type: 'GET',
     }).done(function(response){
        RenderListCart(response);
        alertify.success('Update Success message');
     });
}

function RenderListCart(response){
    $("#list-carts").empty();
    $("#list-carts").html(response);
    $("#total-quantity-list-show").text(!$("#total-quantity-list-cart").val() ? 0 : $("#total-quantity-list-cart").val());
    $("#total-price-list-show").text(!$("#total-price-list-cart").val() ? 0 : $("#total-price-list-cart").val());

    var proQty = $('.pro-qty');
    proQty.prepend('<span class="slg dec qtybtn">-</span>');
    proQty.append('<span class="slg inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function(){
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
}


