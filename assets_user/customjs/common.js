$(document).ready(function () {
    $("#shippingAddress").change(function () {
        if ($(this).val() === "2") {
            $(".old-address").addClass("d-none");
            $(".new-shipping-address").removeClass("d-none");
        }
        // else {
        //     $('.old-address').removeClass('d-none');
        //     $('.new-shipping-address').addClass('d-none');
        // }
    });
});

$(".view-order-details").click(function () {
    $(".orders-div").addClass("d-none");
    $(".order-detail-div").removeClass("d-none");
});
$(".back-to-orders-div").on("click", function () {
    $(".orders-div").removeClass("d-none");
    $(".order-detail-div").addClass("d-none");
});

$(".view-ticket").on("click", function () {
    $(".ticket-detail").removeClass("d-none");
    $(".main-messages").addClass("d-none");
});
$(".back-to-ticket-list").on("click", function () {
    $(".ticket-detail").addClass("d-none");
    $(".main-messages").removeClass("d-none");
});
$(".list-icon").on("click", function () {
    $(".list-icon").addClass("d-none");
    $(".grid-view-products").addClass("d-none");
    $(".grid-icon").removeClass("d-none");
    $(".list-view-products").removeClass("d-none");
});
$(".grid-icon").on("click", function () {
    $(".grid-icon").addClass("d-none");
    $(".list-view-products").addClass("d-none");
    $(".list-icon").removeClass("d-none");
    $(".grid-view-products").removeClass("d-none");
});