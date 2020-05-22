$(document).ready(function(){   
    /**
     * Adding a book to the cart
     */
    $(".add-to-cart").on("click", e => {
        $button = $(e.currentTarget)
        $.ajax({
            // TODO - Refactory with jsrouting bundle
            url: $button.data('url'),
            method: 'POST',
            success: (data, status) => {
                location.reload();
            }
        })
    });

    /**
     * Removing a book from the cart
     */
    $(".remove-from-cart").on("click", e => {
        $button = $(e.currentTarget)
        $.ajax({
            // TODO - Refactory with jsrouting bundle
            url: $button.data('url'),
            method: 'POST',
            success: (data, status) => {
                location.reload();
            }
        })
    })

})
