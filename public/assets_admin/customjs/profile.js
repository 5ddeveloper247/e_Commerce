
document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('editProfileForm');

    // Validation rules
    const validateName = (name) => /^[A-Za-z]{8,15}$/.test(name);
    const validateEmail = (email) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    const validatePassword = (password) => /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,15}$/.test(password);

    const setError = (elementId, message) => {
        document.getElementById(elementId).textContent = message;
    };

    console.log(form.firstName.innerText);
    // Real-time validation
    form.firstName.addEventListener('input', function () {
        setError('firstName-error', validateName(this.value) ? '' : 'First name must be alphabetic and 8-15 characters long.');
    });

    form.lastName.addEventListener('input', function () {
        setError('lastName-error', validateName(this.value) ? '' : 'Last name must be alphabetic and 8-15 characters long.');
    });

    form.password.addEventListener('input', function () {
        setError('password-error', validatePassword(this.value) ? '' : 'Password must be 8-15 characters, include at least one uppercase letter, one lowercase letter, one number, and one special character.');
    });

    form.confirmPassword.addEventListener('input', function () {
        setError('confirmPassword-error', this.value === form.password.value ? '' : 'Passwords do not match.');
    });

    // Final validation on form submission
    form.addEventListener('submit', async function (event) {
        event.preventDefault();

        let valid = true;

        // Validate each field
        if (!validateName(form.firstName.value)) {
            setError('firstName-error', 'First name must be alphabetic and 8-15 characters long.');
            valid = false;
        }

        if (!validateName(form.lastName.value)) {
            setError('lastName-error', 'Last name must be alphabetic and 8-15 characters long.');
            valid = false;
        }

        if (form.password.value && !validatePassword(form.password.value)) {
            setError('password-error', 'Password must be 8-15 characters, include at least one uppercase letter, one lowercase letter, one number, and one special character.');
            valid = false;
        }

        if (form.password.value && form.confirmPassword.value !== form.password.value) {
            setError('confirmPassword-error', 'Passwords do not match.');
            valid = false;
        }

        if (valid) {
            try {
                const formData = new FormData(form);
                const uri = '{{ url(' / ') }}';
                const type = "POST";
                const url = '/admin/profile/update';
                SendAjaxRequestToServer(type, url, formData, '', getProfileUpdateResponse, '', 'submit_button');
                // window.location.reload();
            } catch (error) {
                if (error.response && error.response.data.errors) {
                    Object.entries(error.response.data.errors).forEach(([key, messages]) => {
                        setError(`${key}-error`, messages.join(', '));
                    });
                } else {
                    console.log(error)
                    alert('Failed to update profile.');
                }
            }
        }
    });


    function getProfileUpdateResponse(response) {
        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            });
            window.location.reload();
        } else if (response.status == 422) {
            Object.entries(response.responseJSON.errors).forEach(([key, messages]) => {
                setError(`${key}-error`, messages.join(', '));
            });
        } else if (response.status == 500) {
            toastr.error("Something went wrong", '', {
                timeOut: 3000
            });
        } else {
            toastr.error("Oops! something went wrong", '', {
                timeOut: 3000
            });
        }
    }

});





$('#enrolled-students').DataTable({
    dom: 'Bfrtip',
    pageLength: 10,
    buttons: [{
        extend: 'csv',
        text: 'Export'
    },],
    lengthMenu: [5, 10, 25, 50, 75, 100]
});

