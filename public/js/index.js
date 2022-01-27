$(() => {
    $(document).on('click','.product-action.cart', function() {
        const data = {product_id: $(this).data('id')};

        $.ajax({
            data,
            url: `/shop/store`,
            method: 'POST',
            dataType: 'json',
            success: response => {
                if (response.status) {
                    $('nav .cart-count').html(response.cartCount)
                    $('nav .cart-total').attr('title', `Total ~ KSH.${response.cartTotal}`)
                    toast({msg: response.msg, type: `success`})
                } else {
                    toast({msg: '☹Unable to add item to cart.', type: `danger`})
                }
            },
            error: error => {
                toast({msg: '☹Unable to add item to cart.', type: `danger`})
                console.log(`Error: ${error}`)
            },
        })
    })
})