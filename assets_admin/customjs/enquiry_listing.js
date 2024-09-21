
$(document).ready(function () {
    initialLoad();
    function initialLoad() {
        fetchInquiriesData();
    }
    function displayInquiriesActive() {
        var htmlInquiryActive = '';
        inquiries[0].forEach(inquiry => {
            if (inquiry.status == '1') {
                htmlInquiryActive += `
                 <div class="list-item view-ticket inquiryDetailBtn" data-inquiryid="${inquiry?.id}">
                                    <input type="checkbox" class="form-check-input me-3">
                                    <span class="star">★</span>
                                    <div class="list-item-content">
                                       ${inquiry?.title}
                                    </div>
                                    <div class="timestamp">
                                    ${formatDate(inquiry?.created_at)}
                            </div>
                 </div>
                `
            }
        })
        $('.inquiry-list-container').html(htmlInquiryActive);
    }

    function displayInquiriesInActive() {
        var htmlInquiryInActive = '';
        inquiries[0].forEach(inquiry => {
            if (inquiry.status == '0') {
                htmlInquiryInActive += `
                 <div class="list-item view-ticket inquiryDetailBtn" data-inquiryid="${inquiry?.id}">
                                    <input type="checkbox" class="form-check-input me-3">
                                    <span class="star">★</span>
                                    <div class="list-item-content">
                                       ${inquiry?.title}
                                    </div>
                                    <div class="timestamp">
                                       ${formatDate(inquiry?.created_at)}
                            </div>
                 </div>
                `
            }
        })

        $('.inquiry-list-container').html(htmlInquiryInActive);

    }

    var inquiries = [];
    function fetchInquiriesData() {
        const url = '/admin/inquiries/listing';
        const type = 'Post';
        const data = new FormData();
        SendAjaxRequestToServer(type, url, data, '', handleInquiriesDataResponse, '', '#refreshInquiriesBtn');
    }

    function handleInquiriesDataResponse(response) {
        if (response.status == 200) {
            inquiries = [];
            inquiries.push(response.inquiries);
            $('#enquiryCount').text(`(${inquiries[0].length})`)
            displayInquiriesInActive();
            displayInquiriesActive();
        }
        else {

        }
    }

    $('body').on('click', '.enquiryActiveList', function () {
        displayInquiriesActive();
    })


    $('body').on('click', '.enquiryInActiveList', function () {
        displayInquiriesInActive();
    })

    $('body').on('click', '.inquiryDetailBtn', function () {
        const inquiryid = $(this).attr('data-inquiryid');

        fetchInuiryById(inquiryid);
    });




    function fetchInuiryById(Id) {
        const url = '/admin/inquiries/listing';
        const type = 'Post';
        const data = new FormData();
        data.append('inquiryid', Id);
        SendAjaxRequestToServer(type, url, data, '', handleInquiriesById, '', '#refreshInquiriesBtn');
    }


    function handleInquiriesById(response) {
        let inquiryDetailHtml = '';
        let Messagehtml = '';

        if (response.status === 200 && response?.inquiry) {
            try {
                $('.main-messages').addClass('d-none');
                $('#inquiry-detail-view').removeClass('d-none');

                let inquiry = response.inquiry;
                let inquiryMessages = inquiry.enquiry_message || [];
                const title = inquiry.title || 'No Title';

                inquiryMessages.forEach(message => {
                    let attachmentsHtml = '';
                    const sourceUsername = message?.source?.username || 'Unknown';
                    const sourceFromUsername = message?.source_from?.username || 'Unknown';
                    const messageContent = message?.message || 'No Message Content';
                    const messageDate = message?.created_at || 'Unknown Date';
                    const messageAttachments = message.enquiry_attachments || [];

                    messageAttachments.forEach(attachment => {
                        if (attachment?.filepath) {
                            attachmentsHtml += `
                            <div class="image-item-land file_section" style="width: 80px; height: 80px; margin: 20px;">
                                <img src="${base_url + '/storage/' + attachment?.filepath}" style="height: 100%; width: auto;">
                            </div>`;
                        }
                    });

                    Messagehtml += `
                        <div class="d-flex align-items-start justify-content-between profile-area mt-2">
                            <div class="d-flex mail-profile-detail">
                                <img src="${base_url + '/storage/common/person.png'}" alt="">
                                <div class="ms-2">
                                    <h6>Source: ${sourceUsername}</h6>
                                    <h6>Source From: ${sourceFromUsername}</h6>
                                    <p><small>${messageDate}</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p><b>${title}</b></p>
                        </div>
                        <p class="pt-2">${messageContent}</p>
                        <br>
                        <div class="white attachment-container d-flex mx-2" id="attachment-container">
                            ${attachmentsHtml}
                        </div>
                    `;
                });

                inquiryDetailHtml = `
                    <div class="d-flex align-items-center mb-4">
                        <div class="back-to-ticket-list" style="cursor:pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 512 512">
                                <path fill="#000"
                                    d="M48 256c0 114.87 93.13 208 208 208s208-93.13 208-208S370.87 48 256 48S48 141.13 48 256m212.65-91.36a16 16 0 0 1 .09 22.63L208.42 240H342a16 16 0 0 1 0 32H208.42l52.32 52.73A16 16 0 1 1 238 347.27l-79.39-80a16 16 0 0 1 0-22.54l79.39-80a16 16 0 0 1 22.65-.09" />
                            </svg>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4"></div>
                    <div class="col-md-9 col-sm-8">
                        <div class="mail-structure">
                            ${Messagehtml}
                        </div>
                        <hr>
                        <h5 class="my-2 required-asterisk">Reply</h5>
                        <div class="form_blk">
                            <textarea name="" id="inquiryTextBox" fieldType="alphanumeric" maxlength="255" class="text_box p-3 rounded"
                                placeholder="eg: Details about your dealership brand & service"></textarea>
                        </div>
                        <div class="attachments mt-3">
                            <div class="d-flex align-items-center mb-2">
                                <h5 class="mb-0">Attachments</h5>
                                <svg style="cursor:pointer" class="advance-plus-icon ms-3"
                                    xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                                    viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M188 184a16 16 0 1 1 16-16a16 16 0 0 1-16 16m36-68h-44a12 12 0 0 0 0 24h40v56H36v-56h40a12 12 0 0 0 0-24H32a20 20 0 0 0-20 20v64a20 20 0 0 0 20 20h192a20 20 0 0 0 20-20v-64a20 20 0 0 0-20-20M88.49 80.49L116 53v75a12 12 0 0 0 24 0V53l27.51 27.52a12 12 0 1 0 17-17l-48-48a12 12 0 0 0-17 0l-48 48a12 12 0 1 0 17 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div class="white image-container-selected d-flex mx-2" id="image-container" data-page-name="products">
                            </div>
                            <hr>
                            <div class="col-xs-12 p-0 mb-5">
                                <div onclick="document.getElementById('file-input1').click();" class="input-group position-relative border border-primary rounded shadow-sm overflow-hidden d-flex align-items-center justify-content-center"
                                    style="height: 50px; cursor: pointer;">
                                    <input type="file" id="file-input1" class="form-control d-none" name="product_images" accept="image/*" single aria-describedby="file-input-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-upload text-primary cursor-pointer" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H1v4a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-4h-4a.5.5 0 0 1 0-1h4.5a.5.5 0 0 1 .5.5V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V9.9z" />
                                        <path d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V13.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 0 1-.708-.708l3-3z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-success my-4 px-md-5" id="enquirySendBtn" data-enquiryid="${inquiry?.id}">Send</a>
                        </div>
                    </div>
                `;
                $('#inquiry-detail-view').html(inquiryDetailHtml);
            } catch (error) {
                console.error('Error processing inquiry details:', error);
                $('#inquiry-detail-view').html('<p>Error loading inquiry details. Please try again later.</p>');
            }
        } else {
            console.error('Failed to retrieve inquiry details:', response);
            $('#inquiry-detail-view').html('<p>Failed to load inquiry details. Please try again later.</p>');
        }
    }


    $('body').on('click', '.back-to-ticket-list', function () {
        $('.main-messages').removeClass('d-none');
        $('#inquiry-detail-view').addClass('d-none');
    });
    // ---------------------------------file handling -----------------------------
    var selectedFiles = [];
    // Handle file input change
    $('body').on('change', '#file-input1', function (event) {
        console.log("change in file upload");
        const files = event.target.files;
        const existing = $('.uploaded_files');
        var allfileslength = existing.length + files.length + selectedFiles.length;
        if (allfileslength > 7) {
            toastr.error('You can upload a maximum of 7 images.');
            // Reset the input to allow reselecting the same file again
            event.target.value = ''; // This clears the selected file
            return;
        }

        // Validate and add selected files to selectedFiles array
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (!file.type.startsWith('image/')) {
                toastr.error('Please select only image files.');
                continue;
            }
            selectedFiles.push(file);
        }

        // Update the display
        displaySelectedFiles();
        // Reset the input to allow reselecting the same file again
        event.target.value = ''; // This clears the selected file
    });
    // Function to display selected files
    function displaySelectedFiles() {
        var imageContainerselected = $('.image-container-selected');
        imageContainerselected.empty(); // Clear previous images

        selectedFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                var image_html = `
                    <div class="image-item-land file_section" style="width: 80px; height: 80px; margin: 20px;">
                        <img src="${e.target.result}" style="height: 100%; width: auto;">
                        <span class="cancel-icon text-danger removeAttachment" data-id="${index}" style="cursor: pointer;">×</span>
                    </div>`;
                imageContainerselected.append(image_html);
            }
            reader.readAsDataURL(file);
        });
    }

    // Event delegation for removing files
    $('body').on('click', '.removeAttachment', function () {
        const index = $(this).data('id');
        selectedFiles.splice(index, 1); // Remove the file from the array
        displaySelectedFiles(); // Refresh display
    });
    // ---------------------------------file handling -----------------------------
    // ---------------------------------file handling add enquiry -----------------------------
    var addSelectedFiles = [];
    // Handle file input change
    $('body').on('change', '#file-input2', function (event) {
        console.log("change in file upload");
        const addFiles = event.target.files;
        const existing = $('.uploaded_files');
        var allfileslength = existing.length + addFiles.length + addSelectedFiles.length;
        if (allfileslength > 7) {
            toastr.error('You can upload a maximum of 7 images.');
            // Reset the input to allow reselecting the same file again
            event.target.value = ''; // This clears the selected file
            return;
        }

        // Validate and add selected files to selectedFiles array
        for (let i = 0; i < addFiles.length; i++) {
            const file = addFiles[i];
            if (!file.type.startsWith('image/')) {
                toastr.error('Please select only image files.');
                continue;
            }
            addSelectedFiles.push(file);
        }

        // Update the display
        displayAddSelectedFiles();
        // Reset the input to allow reselecting the same file again
        event.target.value = ''; // This clears the selected file
    });

    // Function to display selected files
    function displayAddSelectedFiles() {
        var imageContainerselected = $('.add-image-container');
        imageContainerselected.empty(); // Clear previous images

        addSelectedFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                var image_html = `
                    <div class="image-item-land file_section" style="width: 80px; height: 80px; margin: 20px;">
                        <img src="${e.target.result}" style="height: 100%; width: auto;">
                        <span class="cancel-icon text-danger removeAddAttachment" data-id="${index}" style="cursor: pointer;">×</span>
                    </div>`;
                imageContainerselected.append(image_html);
            }
            reader.readAsDataURL(file);
        });
    }

    // Event delegation for removing files
    $('body').on('click', '.removeAddAttachment', function () {
        const index = $(this).data('id');
        addSelectedFiles.splice(index, 1); // Remove the file from the array
        displayAddSelectedFiles(); // Refresh display
    });

    // ---------------------------------file handling add enquiry-----------------------------

    $('body').on('click', '#enquirySendBtn', function () {
        const inquiryId = $(this).attr('data-enquiryid');
        const enquiryMessage = $('#inquiryTextBox').val();
        saveEnquiryMessage(inquiryId, enquiryMessage);
    })

    function saveEnquiryMessage(inquiryid, inquirymessage) {
        const type = "Post";
        const url = "/admin/enquiry/message/create";
        const formData = new FormData();
        formData.append('inquiryid', inquiryid);
        formData.append('inquirymessage', inquirymessage);
        // Append each file individually
        selectedFiles.forEach((file, index) => {
            formData.append(`files[]`, file); // `files[]` will create an array of files
        });
        SendAjaxRequestToServer(type, url, formData, '', saveEnquiryMessageResponse, '', '#enquirySendBtn');

    }

    function saveEnquiryMessageResponse(response) {
        if (response.status == 200) {
            const inquiryId = response.enquiryMessage.enquiry_id;
            console.log(inquiryId);
            $('#inquiryTextBox').val('');
            removeSelectedFiles()
            if (inquiryId) {
                fetchInuiryById(inquiryId)
            }
            else {
                const inquiryId = $('#enquirySendBtn').attr('data-enquiryid');
                fetchInuiryById(inquiryId)
            }

            toastr.success(response.message, '', {
                timeOut: 3000
            });
        }
        else {
            toastr.error(response.message, '', {
                timeOut: 3000
            });
        }
    }

    function removeSelectedFiles() {
        selectedFiles = [];
        var imageContainerselected = $('.image-container-selected');
        imageContainerselected.empty();
    }

    //add enquiry
    $('#addEnquiryBtn').on('click', function () {
        const form = document.getElementById('enquiryAddModalForm');
        const formData = new FormData(form);
        addSelectedFiles.forEach((file, index) => {
            formData.append(`files[]`, file); // `files[]` will create an array of files
        });
        const url = '/inquiries/add';
        const type = 'Post';
        SendAjaxRequestToServer(type, url, formData, '', handleAddEnquiryResponse, '', '#addEnquiryBtn');
    })

    function handleAddEnquiryResponse(response) {
        if (response.status == 200) {
            const recentEnquiry = response.enquiry;
            initialLoad();
            fetchInuiryById(recentEnquiry.id);
            addSelectedFiles = [];
            displayAddSelectedFiles();
            $('#enquiryAddModalForm').hide();
            $('.main-messages').show();
            const form = document.getElementById('enquiryAddModalForm');
            form.reset();
        }
        else {
            // Error Handling
            let errorMessage = 'An error occurred. Please try again.';
            if (response.status === 402) {
                // Handle specific error status
                errorMessage = response.message;
            } else if (response.status == 422) {
                // Validation errors

                errorMessage = response.responseJSON.message || 'Validation failed.';
                const validationErrors = response.responseJSON.errors || {};

                // Log the response for debugging


                // Highlight the invalid fields
                $.each(validationErrors, function (key, error) {
                    const inputField = $('[name="' + key + '"]');
                    inputField.addClass('is-invalid');
                    // Optionally, show error messages next to each field
                    // inputField.after('<div class="invalid-feedback">' + error[0] + '</div>');
                });
            } else if (response.status === 500) {
                // Handle server error
                errorMessage = response.message || 'Internal server error. Please contact support.';
            }
            // Display error message
            toastr.error(errorMessage, '', {
                timeOut: 3000
            });
        }
    }
    $('.newEnquiryBtn').on('click', function () {
        $('#enquiryAddModalForm').removeClass('d-none');
        $('#enquiryAddModalForm').show();
        $('.main-messages').hide();
    })
    $('.back-to-enquiry').on('click', function () {
        $('.main-messages').show();
        $('#enquiryAddModalForm').addClass('d-none');
        $('#enquiryAddModalForm').hide();
    })
});
