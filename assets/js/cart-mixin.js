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

    /**
     * Pay an invoice
     */
    $("#pay_invoice").on("click", e => {
        $button = $(e.currentTarget)
        $.ajax({
            url: $button.data('url'),
            method: 'POST',
            success: (data, status) => {
                alert('Paid Invoice Successfully!')
                location.reload();
            }
        })
    })

    /**
     * Reset an invoice
     */
    $("#reset_invoice").on("click", e => {
        $button = $(e.currentTarget)
        $.ajax({
            url: $button.data('url'),
            method: 'POST',
            success: (data, status) => {
                location.reload();
            }
        })
    })
})
