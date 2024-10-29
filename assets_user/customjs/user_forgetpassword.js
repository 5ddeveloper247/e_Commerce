var verifyFlag = '1';
// function loadRegisterPageData() {

//     let form = '';
//     let data = '';
//     let type = 'POST';
//     let url = '/getRegisterPageData';
//     SendAjaxRequestToServer(type, url, data, '', loadRegisterPageDataResponse, '', '#saveuser_btn');
// }
// function loadRegisterPageDataResponse(response) {

//     var data = response.data;
//     var countries = data.countries;

//     var html = '<option value="">Choose a Country</option>';
// 	if(countries.length > 0){
// 		$.each(countries, function (index, value) {
//             html += `<option value="${value.id}">${value.name}</option>`;
// 		});
// 	}
// 	$("#country").html(html);
// }
$(document).on('click', '#forgetPass_btn', function (e) {
    console.log(verifyFlag);
    if (verifyFlag == '1') {
        verifyEmail();
    } else if (verifyFlag == '2') {
        verifyOtp();
    } else if (verifyFlag == '3') {
        changePass();
    }
});
function verifyEmail() {
    var email = $("#email").val();
    let data = new FormData();
    data.append('email', email);
    let type = 'POST';
    let url = '/verifyEmailForget';
    SendAjaxRequestToServer(type, url, data, '', verifyEmailForgetResponse, '', '');
}

function verifyEmailForgetResponse(response) {

    var data = response.data;

    if (response.status == 200) {
        toastr.success(response.message, '', {
            timeOut: 3000
        });

        $("#email").prop('disabled', true);
        $("#otp_div").show();

        verifyFlag = '2';

    } else {
        if (response.status == 402) {
            error = response.message;
        } else {
            error = response.responseJSON.message;
        }
        toastr.error(error, '', {
            timeOut: 3000
        });
    }
}

function verifyOtp() {
    var email = $("#email").val();
    var otp = $("#otp").val();
    let data = new FormData();
    data.append('email', email);
    data.append('otp', otp);
    let type = 'POST';
    let url = '/verifyOtpForget';
    SendAjaxRequestToServer(type, url, data, '', verifyOtpForgetResponse, '', '');
}

function verifyOtpForgetResponse(response) {

    var data = response.data;

    if (response.status == 200) {
        toastr.success(response.message, '', {
            timeOut: 3000
        });

        $("#email").prop('disabled', true);
        $("#otp").prop('disabled', true);
        $("#pass_div").show();
        $("#password, #password_confirmation").val('');
        $("#forgetPass_btn").text('Change');

        verifyFlag = '3';

    } else {
        if (response.status == 402) {
            error = response.message;
        } else {
            error = response.responseJSON.message;
        }
        toastr.error(error, '', {
            timeOut: 3000
        });
    }
}

function changePass() {

    var email = $("#email").val();
    var otp = $("#otp").val();
    var password = $("#password").val();
    var password_confirmation = $("#password_confirmation").val();
    let data = new FormData();
    data.append('email', email);
    data.append('otp', otp);
    data.append('password', password);
    data.append('password_confirmation', password_confirmation);
    let type = 'POST';
    let url = '/changePassForget';
    SendAjaxRequestToServer(type, url, data, '', changePassForgetResponse, '', '');
}

function changePassForgetResponse(response) {

    var data = response.data;

    if (response.status == 200) {

        toastr.success(response.message, '', {
            timeOut: 3000
        });

        window.location.href = "/login";
        $("#email, #otp, #password, #password_confirmation").prop('disabled', false).val('');
        $("#email_div").show();
        $("#otp_div, #pass_div").hide();
        verifyFlag = '1';



    } else {

        if (response.status == 402) {
            error = response.message;
        } else {
            error = response.responseJSON.message;
        }
        toastr.error(error, '', {
            timeOut: 3000
        });
    }
}





$(document).ready(function () {
    // loadRegisterPageData();
});





