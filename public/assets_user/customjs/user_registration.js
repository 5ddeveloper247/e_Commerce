


function loadRegisterPageData() {

    let form = '';
    let data = '';
    let type = 'POST';
    let url = '/getRegisterPageData';
    SendAjaxRequestToServer(type, url, data, '', loadRegisterPageDataResponse, '', '#saveuser_btn');
}
function loadRegisterPageDataResponse(response) {

    var data = response.data;
    var countries = data.countries;
    var html = '<option value="">Choose a Country</option>';
    if (countries.length > 0) {
        $.each(countries, function (index, value) {
            html += `<option value="${value.id}">${value.name}</option>`;
        });
    }
    $("#country").html(html);
}


$(document).on('change', '#country', function (e) {
    var country_id = $("#country").val();
    let form = '';
    let data = new FormData();
    data.append('country_id', country_id);
    let type = 'POST';
    let url = '/getSpecificStates';
    SendAjaxRequestToServer(type, url, data, '', getSpecificStatesResponse, '', '');
});

function getSpecificStatesResponse(response) {

    var data = response.data;
    var states = data.states;
    var cities = data.cities;

    var html = '<option value="">Choose a State</option>';
    if (states.length > 0) {
        $.each(states, function (index, value) {
            html += `<option value="${value.id}">${value.name}</option>`;
        });
    }
    $("#state").html(html);

    var html1 = '<option value="">Choose a City</option>';
    if (cities.length > 0) {
        $.each(cities, function (index, value) {
            html1 += `<option value="${value.id}">${value.name}</option>`;
        });
    }
    $("#city").html(html1);

    $("#state").val('');
    $("#city").val('');

}
$(document).on('change', '#state', function (e) {
    var country_id = $("#country").val();
    var state_id = $("#state").val();
    let form = '';
    let data = new FormData();
    data.append('country_id', country_id);
    data.append('state_id', state_id);
    let type = 'POST';
    let url = '/getSpecificCities';
    SendAjaxRequestToServer(type, url, data, '', getSpecificCitiesResponse, '', '');
});

function getSpecificCitiesResponse(response) {

    var data = response.data;
    var cities = data.cities;

    var html = '<option value="">Choose a City</option>';
    if (cities.length > 0) {
        $.each(cities, function (index, value) {
            html += `<option value="${value.id}">${value.name}</option>`;
        });
    }
    $("#city").html(html);
}

$(document).on('click', '#signUp_submit', function (e) {
    e.preventDefault();

    //reCAPTCHA
    var token = '';
    grecaptcha.ready(function () {
        grecaptcha.execute("6LeTn3UqAAAAABmlZec57pJh5-tqpsYi2a0Mvvx4", { action: 'subscribe_newsletter' }).then(function (token) {

            $('#signUp_form').prepend('<input type="hidden" name="token" value="' + token + '">');
            token = token;

        });

    });
    let form = document.getElementById('signUp_form');
    let data = new FormData(form);
    //data.append('token', token);
    let type = 'POST';
    let url = '/addUserData';
    SendAjaxRequestToServer(type, url, data, '', addUserDataResponse, '', '#signUp_submit');
});

function addUserDataResponse(response) {

    if (response.status == 200) {
        toastr.success(response.message, '', {
            timeOut: 3000
        });

        let form = $('#signUp_form');
        form.trigger("reset");

        $('input, select, textarea').removeClass('is-invalid');

    } else {
        if (response.status == 402) {
            error = response.message;
        } else {
            error = response.responseJSON.message;
            var is_invalid = response.responseJSON.errors;

            $.each(is_invalid, function (key) {
                // Assuming 'key' corresponds to the form field name
                var inputField = $('[name="' + key + '"]');
                // Add the 'is-invalid' class to the input field's parent or any desired container
                inputField.addClass('is-invalid');
            });
        }
        toastr.error(error, '', {
            timeOut: 3000
        });
    }
}




$(document).ready(function () {
    loadRegisterPageData();
});


$('#first_name, #last_name').on('keydown', function (e) {
    var key = e.keyCode || e.which;
    var char = String.fromCharCode(key);
    var controlKeys = ['Backspace', 'Tab', 'ArrowLeft', 'ArrowRight', 'Delete'];

    // Allow control keys and non-numeric characters
    if (controlKeys.includes(e.key) || !char.match(/[0-9]/)) {
        return true;
    } else {
        e.preventDefault();
        return false;
    }
});

$('#phone, #zipcode').on('keydown', function (e) {
    var key = e.keyCode || e.which;
    var char = String.fromCharCode(key);
    var controlKeys = ['Backspace', 'Tab', 'ArrowLeft', 'ArrowRight', 'Delete', 'Enter'];

    // Allow control keys and numeric characters
    if (controlKeys.includes(e.key) || char.match(/[0-9]/)) {
        return true;
    } else {
        e.preventDefault();
        return false;
    }
});



