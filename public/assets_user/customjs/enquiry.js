





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
        const url = '/inquiries/listing';
        const type = 'Post';
        const data = new FormData();
        SendAjaxRequestToServer(type, url, data, '', handleInquiriesDataResponse, '', '#refreshInquiriesBtn');
    }

    function handleInquiriesDataResponse(response) {
        if (response.status == 200) {
            inquiries.push(response.inquiries);
            displayInquiriesActive();
            //displayInquiriesInActive();
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
        $('.main-messages').addClass('d-none');
        $('#inquiry-detail-view').removeClass('d-none');

        const url = '/inquiries/listing';
        const type = 'Post';
        const data = new FormData();
        data.append('inquiryId', inquiryid);
        SendAjaxRequestToServer(type, url, data, '', handleInquiriesById, '', '#refreshInquiriesBtn');
    });

    function handleInquiriesById(response) {
        let inquiryDetailHtml = '';
        if (response.status == 200) {
            const inquiry = response.inquiry;
            console.log(inquiry)
            const username = inquiry?.user?.username;
            const role = inquiry?.user?.role == 2 ? "You" : "Admin";
            const created_at = formatDate(inquiry.created_at);
            const title = inquiry?.title;

            inquiryDetailHtml += `
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
                <div class="d-flex align-items-start justify-content-between profile-area mt-2">
                    <div class="d-flex mail-profile-detail">
                        <img src="https://prium.github.io/phoenix/v1.18.0/assets/img/team/60.webp" alt="">
                        <div class="ms-2">
                            <h6>${username}</h6>
                            <p><small>${created_at}</small></p>
                        </div>
                    </div>
                </div>
                <div class="mail-structure">
                    <div class="d-flex align-items-center justify-content-between">
                        <p><b>${title}</b></p>
                        <p class="mx-2">07:23 AM</p>
                    </div>
                    <br>
                    <p><b>Ingredia Nutrisha,</b> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture</p>
                    <p class="pt-2">
                        Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
                    </p>
                    <p class="pt-2">
                        Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,
                        <br><br>
                        <b>Kind Regards</b>
                    </p>
                    <p class="pt-2">Mr Smith</p>
                    <hr>
                </div>
                <hr>
                <h5 class="my-4">Reply</h5>
                <div class="form_blk">
                    <textarea name="" id="" class="text_box p-3 rounded" placeholder="eg: Details about your dealership brand &amp; service"></textarea>
                </div>
                <div class="attachments mt-3">
                    <div class="d-flex align-items-center mb-2">
                        <h5 class="mb-0">Attachments (3)</h5>
                        <svg style="cursor:pointer" class="advance-plus-icon ms-3" xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 256 256">
                            <path fill="currentColor" d="M188 184a16 16 0 1 1 16-16a16 16 0 0 1-16 16m36-68h-44a12 12 0 0 0 0 24h40v56H36v-56h40a12 12 0 0 0 0-24H32a20 20 0 0 0-20 20v64a20 20 0 0 0 20 20h192a20 20 0 0 0 20-20v-64a20 20 0 0 0-20-20M88.49 80.49L116 53v75a12 12 0 0 0 24 0V53l27.51 27.52a12 12 0 1 0 17-17l-48-48a12 12 0 0 0-17 0l-48 48a12 12 0 1 0 17 17Z">
                            </path>
                        </svg>
                    </div>
                    <div class="d-flex">
                        <p class="px-2 mb-0">My-Photo.png</p>
                        <p class="px-2 mb-0">My-Document.docx</p>
                    </div>
                    <hr>
                    <div class="col-xs-12 p-0 mb-5">
                        <div class="uploader_blk uploader-blk-support text_box">
                            <div class="icon mb-3">
                                <img src="{{asset('assets_user/images/upload.svg')}}" alt="">
                            </div>
                            <h6>Drag &amp; Drop</h6>
                            <div class="or">OR</div>
                            <div class="btn_blk text-center">
                                <button type="button" class="btn theme-btn">Browse Files</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a class="btn btn-success my-4 px-md-5">Send</a>
                </div>
            </div>
        `;

            $('#inquiry-detail-view').html(inquiryDetailHtml);
        }
    }

});
