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
                // TODO - Modify to have the remove button
                // TODO - Modify the total cart amount
                console.log(status, data);
            }
        })
        // console.log('clicked item', $button.data('url'), $button.data('id'))
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
                // TODO - Modify to have the remove button
                // TODO - Modify the total cart amount
                console.log(status, data);
            }
        })
        // console.log('clicked item', $button.data('url'), $button.data('id'))
    })
})
