$(document).ready(function () {
    $('#shippingAddress').change(function () {
        if ($(this).val() === '2') {
            $('.old-address').addClass('d-none');
            $('.new-shipping-address').removeClass('d-none');
        } 
        // else {
        //     $('.old-address').removeClass('d-none');
        //     $('.new-shipping-address').addClass('d-none');
        // }
    });
});

$('.view-order-details').click(function(){
    $('.orders-div').addClass("d-none");
    $('.order-detail-div').removeClass("d-none");
})
$(".back-to-orders-div").on("click", function () {
    $('.orders-div').removeClass("d-none");
    $('.order-detail-div').addClass("d-none");
});

$(".view-ticket").on("click", function () {
    $(".ticket-detail").removeClass("d-none");
    $(".main-messages").addClass("d-none");
});
$(".back-to-ticket-list").on("click", function () {
    $(".ticket-detail").addClass("d-none");
    $(".main-messages").removeClass("d-none");
});