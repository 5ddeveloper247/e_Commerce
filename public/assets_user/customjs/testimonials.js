


$(document).ready(function () {
    // Fetch testimonials on initial load
    fetchInitialLoad();

    function fetchInitialLoad() {
        const url = "/testimonials";
        const type = "GET";

        // Send AJAX request to the server
        SendAjaxRequestToServer(type, url, '', '', handleTestimonialsResponse, '', '#contactReply_submit');
    }

    function handleTestimonialsResponse(response) {
        // Generate HTML for each testimonial
        let testimonialsHtml = '';

        response.data.forEach(item => {
            testimonialsHtml += `
                <div class="swiper-slide p-2">
                    <div class="testimonial d-flex flex-lg-nowrap flex-wrap justify-content-md-start justify-content-center align-items-center">
                        <img src="${base_url + '/storage/' + item?.mediaPath}"
                            alt="${item.name}">
                        <div class="testimonial-content d-flex flex-column flex-lg-nowrap flex-wrap">
                            <p class="quote">“${item?.description}”</p>
                            <h6>${item?.name}</h6>
                            <p>${item?.designation}</p>
                        </div>
                    </div>
                </div>`;
        });

        // Update the testimonial slider element with new HTML
        $('#testimonial-slider-element').html(testimonialsHtml);
    }
});

