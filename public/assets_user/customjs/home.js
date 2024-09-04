


$(document).ready(function () {
    // Fetch testimonials on initial load
    fetchInitialLoad();


    function fetchInitialLoad() {
        fetchTestimonials();
        makeNewProductListings();
    }

    function fetchTestimonials() {
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


    function makeNewProductListings() {
        const url = "/new_products";
        const type = "GET";

        // Send AJAX request to the server
        SendAjaxRequestToServer(type, url, '', '', handleProductResponse, '', '#contactReply_submit');

    }
    function handleProductResponse(response) {
        let newProductHtml;
        if (response.data) {
            console.log(response.data)
            response.data.forEach(product => {
                newProductHtml += `
                 <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000"
                                        d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000"
                                        d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{'product_detail'}}">
                                    <img class="img-fluid" src="${base_url+'/storage/'+product?.product_images[0].filepath}"
                                        alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-5">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                            <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>${product?.product_name}</small></p>
                            <div class="price-and-btn">
                                <div class="d-flex justify-content-center card-price">
                                    <h5>${product?.discount_price==''?product?.price:product?.discount_price}</h5>
                                    <p class="text-danger ps-1"><small><del>${product?.price}</del></small></p>
                                </div>
                                <button class="btn btn-add-to-cart">
                                    <span class="me-2">+</span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>`
            });
            $('#new_products_element').html(newProductHtml);
        }

    }
});

