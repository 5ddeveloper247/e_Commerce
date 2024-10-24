// new Raty(document.querySelector('.demo-rating'), {
//     cancelButton: false,
//     cancelClass: 'raty-cancel',
//     click: function (score, element, evt) {

//         var objectInstance = this;

//     },

// });

$('.demo-rating').raty({
    cancelButton: false,
    cancelClass: 'raty-cancel',
    click: function (score, element, evt) {
        var objectInstance = this;
    },
});
$('.demo').raty('score');
$('.demo').raty('score', number);




