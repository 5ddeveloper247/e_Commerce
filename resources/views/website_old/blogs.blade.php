@extends('layouts.website.website_master')

@push('css')

@endpush

@section('content')

<div class="container blogs py-5">
    <h3 class="main-headings position-relative text-start">
        Blogs
        <div class="border-under-main-heading"></div>
    </h3>
    <div class="row mt-5">
        <div class="col-md-6 mt-md-3">
            <div class="card mb-3 border-0">
                <div class="row g-0">
                    <div class="col-md-5">
                        <div class="image position-relative">
                            <img class="img-fluid" src="https://cdn11.bigcommerce.com/s-xfjb6c0wb4/images/stencil/870x1000/uploaded_images/blog-05.jpg?t=1591696630" class="img-fluid rounded-start" alt="...">
                            <div class="position-absolute text-white text-on-blog-img">
                                <p class="mb-0 py-2 px-3">
                                    <small>
                                        30th June 2023
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h6 class="card-title">Lacus rhoncus tincidunt</h6>
                            <hr>
                            <p class="card-text"><small class="text-body-secondary">John Doe on 30th Jun 2020</small></p>
                            <p class="card-text line-clamp-4 mb-2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam tempore quos consequuntur eligendi, ad sit eum! Eos dolore, iure asperiores, odio incidunt optio, unde in voluptas fugit nulla est dolor! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro, nulla iure soluta nobis enim aut. Obcaecati labore iure reprehenderit, minus dolore cumque dolorum provident veniam repellendus! Nam consequuntur perferendis blanditiis iusto quisquam?
                            </p>
                            <a class="text-black" href={{url('blog-detail')}}><small>Read More</small></a>
                            <div class="d-flex align-items-center mt-3">
                                <a href="#" class="text-decoration-none mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                                        <g fill="none">m
                                            <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                            <path fill="#777" d="M13.5 21.888C18.311 21.164 22 17.013 22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 5.013 3.689 9.165 8.5 9.888V15H9a1.5 1.5 0 0 1 0-3h1.5v-2A3.5 3.5 0 0 1 14 6.5h.5a1.5 1.5 0 0 1 0 3H14a.5.5 0 0 0-.5.5v2H15a1.5 1.5 0 0 1 0 3h-1.5z" />
                                        </g>
                                    </svg>
                                </a>
                                <a href="#" class="text-decoration-none mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                                        <path fill="#777" d="M4.616 19q-.691 0-1.153-.462T3 17.384V6.616q0-.691.463-1.153T4.615 5h14.77q.69 0 1.152.463T21 6.616v10.769q0 .69-.463 1.153T19.385 19zM12 12.116l8-5.231L19.692 6L12 11L4.308 6L4 6.885z" />
                                    </svg>
                                </a>
                                <a href="#" class="text-decoration-none mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 512 512">
                                        <path fill="#777" d="M389.2 48h70.6L305.6 224.2L487 464H345L233.7 318.6L106.5 464H35.8l164.9-188.5L26.8 48h145.6l100.5 132.9zm-24.8 373.8h39.1L151.1 88h-42z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-md-3">
            <div class="card mb-3 border-0">
                <div class="row g-0">
                    <div class="col-md-5">
                        <div class="image position-relative">
                            <img class="img-fluid" src="https://cdn11.bigcommerce.com/s-xfjb6c0wb4/images/stencil/870x1000/uploaded_images/blog-05.jpg?t=1591696630" class="img-fluid rounded-start" alt="...">
                            <div class="position-absolute text-white text-on-blog-img">
                                <p class="mb-0 py-2 px-3">
                                    <small>
                                        30th June 2023
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h6 class="card-title">Lacus rhoncus tincidunt</h6>
                            <hr>
                            <p class="card-text"><small class="text-body-secondary">John Doe on 30th Jun 2020</small></p>
                            <p class="card-text line-clamp-4 mb-2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam tempore quos consequuntur eligendi, ad sit eum! Eos dolore, iure asperiores, odio incidunt optio, unde in voluptas fugit nulla est dolor! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro, nulla iure soluta nobis enim aut. Obcaecati labore iure reprehenderit, minus dolore cumque dolorum provident veniam repellendus! Nam consequuntur perferendis blanditiis iusto quisquam?
                            </p>
                            <a class="text-black" href={{url('blog-detail')}}><small>Read More</small></a>
                            <div class="d-flex align-items-center mt-3">
                                <a href="#" class="text-decoration-none mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                                        <g fill="none">
                                            <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                            <path fill="#777" d="M13.5 21.888C18.311 21.164 22 17.013 22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 5.013 3.689 9.165 8.5 9.888V15H9a1.5 1.5 0 0 1 0-3h1.5v-2A3.5 3.5 0 0 1 14 6.5h.5a1.5 1.5 0 0 1 0 3H14a.5.5 0 0 0-.5.5v2H15a1.5 1.5 0 0 1 0 3h-1.5z" />
                                        </g>
                                    </svg>
                                </a>
                                <a href="#" class="text-decoration-none mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                                        <path fill="#777" d="M4.616 19q-.691 0-1.153-.462T3 17.384V6.616q0-.691.463-1.153T4.615 5h14.77q.69 0 1.152.463T21 6.616v10.769q0 .69-.463 1.153T19.385 19zM12 12.116l8-5.231L19.692 6L12 11L4.308 6L4 6.885z" />
                                    </svg>
                                </a>
                                <a href="#" class="text-decoration-none mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 512 512">
                                        <path fill="#777" d="M389.2 48h70.6L305.6 224.2L487 464H345L233.7 318.6L106.5 464H35.8l164.9-188.5L26.8 48h145.6l100.5 132.9zm-24.8 373.8h39.1L151.1 88h-42z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-md-3">
            <div class="card mb-3 border-0">
                <div class="row g-0">
                    <div class="col-md-5">
                        <div class="image position-relative">
                            <img class="img-fluid" src="https://cdn11.bigcommerce.com/s-xfjb6c0wb4/images/stencil/870x1000/uploaded_images/blog-05.jpg?t=1591696630" class="img-fluid rounded-start" alt="...">
                            <div class="position-absolute text-white text-on-blog-img">
                                <p class="mb-0 py-2 px-3">
                                    <small>
                                        30th June 2023
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h6 class="card-title">Lacus rhoncus tincidunt</h6>
                            <hr>
                            <p class="card-text"><small class="text-body-secondary">John Doe on 30th Jun 2020</small></p>
                            <p class="card-text line-clamp-4 mb-2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam tempore quos consequuntur eligendi, ad sit eum! Eos dolore, iure asperiores, odio incidunt optio, unde in voluptas fugit nulla est dolor! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro, nulla iure soluta nobis enim aut. Obcaecati labore iure reprehenderit, minus dolore cumque dolorum provident veniam repellendus! Nam consequuntur perferendis blanditiis iusto quisquam?
                            </p>
                            <a class="text-black" href={{url('blog-detail')}}><small>Read More</small></a>
                            <div class="d-flex align-items-center mt-3">
                                <a href="#" class="text-decoration-none mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                                        <g fill="none">
                                            <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                            <path fill="#777" d="M13.5 21.888C18.311 21.164 22 17.013 22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 5.013 3.689 9.165 8.5 9.888V15H9a1.5 1.5 0 0 1 0-3h1.5v-2A3.5 3.5 0 0 1 14 6.5h.5a1.5 1.5 0 0 1 0 3H14a.5.5 0 0 0-.5.5v2H15a1.5 1.5 0 0 1 0 3h-1.5z" />
                                        </g>
                                    </svg>
                                </a>
                                <a href="#" class="text-decoration-none mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                                        <path fill="#777" d="M4.616 19q-.691 0-1.153-.462T3 17.384V6.616q0-.691.463-1.153T4.615 5h14.77q.69 0 1.152.463T21 6.616v10.769q0 .69-.463 1.153T19.385 19zM12 12.116l8-5.231L19.692 6L12 11L4.308 6L4 6.885z" />
                                    </svg>
                                </a>
                                <a href="#" class="text-decoration-none mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 512 512">
                                        <path fill="#777" d="M389.2 48h70.6L305.6 224.2L487 464H345L233.7 318.6L106.5 464H35.8l164.9-188.5L26.8 48h145.6l100.5 132.9zm-24.8 373.8h39.1L151.1 88h-42z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-md-3">
            <div class="card mb-3 border-0">
                <div class="row g-0">
                    <div class="col-md-5">
                        <div class="image position-relative">
                            <img class="img-fluid" src="https://cdn11.bigcommerce.com/s-xfjb6c0wb4/images/stencil/870x1000/uploaded_images/blog-05.jpg?t=1591696630" class="img-fluid rounded-start" alt="...">
                            <div class="position-absolute text-white text-on-blog-img">
                                <p class="mb-0 py-2 px-3">
                                    <small>
                                        30th June 2023
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h6 class="card-title">Lacus rhoncus tincidunt</h6>
                            <hr>
                            <p class="card-text"><small class="text-body-secondary">John Doe on 30th Jun 2020</small></p>
                            <p class="card-text line-clamp-4 mb-2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam tempore quos consequuntur eligendi, ad sit eum! Eos dolore, iure asperiores, odio incidunt optio, unde in voluptas fugit nulla est dolor! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro, nulla iure soluta nobis enim aut. Obcaecati labore iure reprehenderit, minus dolore cumque dolorum provident veniam repellendus! Nam consequuntur perferendis blanditiis iusto quisquam?
                            </p>
                            <a class="text-black" href={{url('blog-detail')}}><small>Read More</small></a>
                            <div class="d-flex align-items-center mt-3">
                                <a href="#" class="text-decoration-none mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                                        <g fill="none">
                                            <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                            <path fill="#777" d="M13.5 21.888C18.311 21.164 22 17.013 22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 5.013 3.689 9.165 8.5 9.888V15H9a1.5 1.5 0 0 1 0-3h1.5v-2A3.5 3.5 0 0 1 14 6.5h.5a1.5 1.5 0 0 1 0 3H14a.5.5 0 0 0-.5.5v2H15a1.5 1.5 0 0 1 0 3h-1.5z" />
                                        </g>
                                    </svg>
                                </a>
                                <a href="#" class="text-decoration-none mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                                        <path fill="#777" d="M4.616 19q-.691 0-1.153-.462T3 17.384V6.616q0-.691.463-1.153T4.615 5h14.77q.69 0 1.152.463T21 6.616v10.769q0 .69-.463 1.153T19.385 19zM12 12.116l8-5.231L19.692 6L12 11L4.308 6L4 6.885z" />
                                    </svg>
                                </a>
                                <a href="#" class="text-decoration-none mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 512 512">
                                        <path fill="#777" d="M389.2 48h70.6L305.6 224.2L487 464H345L233.7 318.6L106.5 464H35.8l164.9-188.5L26.8 48h145.6l100.5 132.9zm-24.8 373.8h39.1L151.1 88h-42z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection