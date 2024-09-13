
$(document).ready(function () {

    fetchOnInitialLoad();
    function fetchOnInitialLoad() {
        fetchProductsListing();
    }



    function fetchProductsListing() {
        const type = "Get";
        const url = "/products_listing"; // replace with your server-side route

        SendAjaxRequestToServer(type, url, '', '', getProductResponse, 'newsLetterSubscribeBtn');
    }

    function getProductResponse(response) {
        console.log(response)
        if (response.status === 200) {
            // Success: Display products

            var product_listing = response.data;

            makeProductListing(product_listing);



            // Add your product display logic here
        } else {
            // Error: Display error message
            console.log(response.message);
        }
    }

    function makeProductListing(product_listing) {
        let htmlGrid = '';
        let htmlList = '';
        $("#product_listing_element").empty();
        if (product_listing.length > 0) {
            product_listing.forEach(product => {
                htmlGrid += `
                <div class="card featured-card border-0">
                    <p class="sale-badge text-black">AC</p>
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
                           <a href="${base_url + '/product_detail/' + (product?.category?.category_name?.replace(/\s/g, '-') || 'default-category') + '/' + (product?.sku || 'default-sku')}">
                                <img class="img-fluid" src="${base_url + '/storage/' + (product?.product_images?.[0]?.filepath || 'default-image.jpg')}"
                                    alt="${product?.product_name || 'Product Image'}">
                            </a>

                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="rating border-bottom pb-2">
                            ${[...Array(5)].map(() => `
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            `).join('')}
                        </div>
                        <p class="card-title mt-2 border-top pt-3 line-clamp-2">
                            <small>
                                ${product?.product_name || 'Product Name'}
                            </small>
                        </p>
                        <div class="price-and-btn">
                            <div class="d-flex justify-content-center card-price">
                                <h5>${product?.price ? `$${product?.price}` : 'Price Not Available'}</h5>
                                ${product?.price ? `<p class="text-danger ps-1"><small><del>$${product?.price}</del></small></p>` : ''}
                            </div>
                            <button class="btn btn-add-to-cart AddToCartBtn" data-quantity="1" data-productid="${product?.id}">
                                <span class="me-2">+</span>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>`;



                htmlList += `
                      <div class="card list-view-card p-2 border-0 my-4">
                    <div class="verified-badge">AC</div>
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <!-- Property Image or Placeholder -->
                            <div class="text-center">
                                <img src="${base_url + '/storage/' + product?.product_images[0]?.filepath}"alt="Property Image"
                                    class="img-fluid list-view-card-images" style="max-width: 100%;">
                            </div>
                        </div>
                        <div class="col-md-7 d-flex flex-column justify-content-center border-end">
                            <h6 class="property-price">
                             ${product?.product_name}
                            </h6>
                            <div class="rating-list-view pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                    </path>
                                </svg>
                            </div>
                            <!-- <p class="property-type">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, culpa.</p> -->
                            <p class="card-text mb-0 line-clamp-4">
                              ${product?.product_name}
                            </p>

                        </div>
                        <div class="col-md-2 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex card-price">
                                <h5 class=" mb-0">${product?.price}</h5>
                                <p class="mb-0 text-danger ps-1"><small><del>$15.00</del></small></p>
                            </div>
                            <p class="fw-bold text-success">Free Shipping</p>
                            <button class="btn btn-view-details my-1">
                                <small>View Detail</small>
                            </button>
                            <button class="btn btn-add-to-cart my-1">
                                <small>Add to Cart</small>
                            </button>
                        </div>
                    </div>
                </div>

                    `

            });
        }
        else {
            htmlGrid = '<p class="text-center">No record found...</p>';
        }

        $("#product_grid_element").html(htmlGrid);
        $("#product_list_element").html(htmlList);

    }


});
