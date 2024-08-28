$(document).ready(function () {


    fetchInitalContactListing();
    function fetchInitalContactListing() {
        const url = "/admin/contact/ajax";
        const type = "Get";
        SendAjaxRequestToServer(type, url, '', '', getInitialContactListingResponse, '', '');
        contact_listing_table_body
        function getInitialContactListingResponse(response) {
            if (response.status == 200) {
                let html = '';
                response.contacts.forEach(item => {
                    html += `
                        <tr>
                            <td class="ps-3">${item.id}</td>
                            <td class="ps-3">${item.full_name}</td>
                            <td class="ps-3">${item.phone_number}</td>
                            <td class="ps-3">${item.email_address}</td>
                            <td class="text-center">
                                <div class="form-check form-switch">
                                    <input class="form-check-input flexSwitchCheckChecked" type="checkbox" role="switch"
                                           id="flexSwitchCheckChecked${item.id}" ${item.status === 1 ? 'checked' : ''}>
                                </div>
                            </td>
                            <td class="ps-3 text-nowrap">${new Date(item.created_at).toLocaleDateString('en-US', { month: 'short', day: '2-digit' })}, ${new Date(item.created_at).toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' })}</td>
                            <td class="text-end">
                                <div class="btn-reveal-trigger position-static">
                                    <button class="btn btn-sm dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg class="svg-inline--fa fa-ellipsis" aria-hidden="true" focusable="false"
                                             data-prefix="fas" data-icon="ellipsis" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor"
                                                  d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                            </path>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" type="button" data-bs-toggle="modal"
                                           data-bs-target="#addUpdateContactModal" data-edit-contact='${JSON.stringify(item.id)}' id="handleEditAddBtn">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" type="button" data-bs-toggle="modal"
                                           data-bs-target="#confirmationModalRemove" data-remove-contact='${JSON.stringify(item)}' id="handleRemoveAdminBtn">Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `;
                });
                $('#contact_listing_table_body').html(html);
            }
        }
    }



    $('body').on('click', '#handleEditAddBtn', function () {
        const item = $(this).attr('data-edit-contact');
        console.log(item)
        alert("flakdjfk")
        $('#full_name').val(item.full_name);
        $('#phone_number').val(item.phone_number);
        $('#admin_email').val(item.email);
        $('#order_number').val(item.order_number);
        $('#company_name').val(item.company_name);
        $('#rma_number').val(item.rma_number);
        $('#comment').text(item.comment);
        $('#status').prop('checked', item.status == 1);
        $('#contact-id').val(item.id);
    });

    $('body').on('click', '#editContactNow', function () {

        const data = {
            id: $('#contact-id').val(),
            admin_name: $('#admin_name').val(),
            admin_email: $('#admin_email').val(),
            admin_status: $('#admin_status').is(':checked') ? 1 : 0,
            admin_password: $('#admin_password').val(),
            admin_confirm_password: $('#admin_confirm_password').val(),
        }
        const formData = new FormData();
        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                formData.append(key, data[key]);
            }
        }

    });


});
