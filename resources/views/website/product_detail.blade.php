@extends('layouts.website.website_master')

@push('css')

@endpush

@section('content')

<div class="container product-detail py-5">
    <div class="row">
        <div class="col-md-5 my-1 d-flex align-items-center justify-content-center">
            <div class="row align-items-center justify-content-center">
                <figure class="zoom" onmousemove="zoom(event)" onmouseleave="resetZoom(event)" style="width: 100%; height: 23rem;">
                    <img id="mainImage" src="{{asset('assets_user/images/category-img.png')}}" alt="Card image" class="w-100" style="height: 23rem; width: 100%; height: auto;">
                </figure>
                <div class="row mt-3">
                    <div class="col-3">
                        <img src="{{asset('assets_user/images/category-img.png')}}" class="img-thumbnail thumbnail-img" alt="Thumbnail 1">
                    </div>
                    <div class="col-3">
                        <img src="{{asset('assets_user/images/category-imgg.png')}}" class="img-thumbnail thumbnail-img" alt="Thumbnail 2">
                    </div>
                    <div class="col-3">
                        <img src="{{asset('assets_user/images/category-img.png')}}" class="img-thumbnail thumbnail-img" alt="Thumbnail 3">
                    </div>
                    <div class="col-3">
                        <img src="{{asset('assets_user/images/category-imgg.png')}}" class="img-thumbnail thumbnail-img" alt="Thumbnail 4">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7 my-1">
            <div class="d-flex justify-content-between">
                <h5 class="product-title mb-0">Aspetur Autodit Autfugittt</h5>
            </div>
            <hr class="mb-0">
            <p class="text-muted mt-2">Foodzone</p>
            <p class="fw-bold">₹234.95</p>

            <div class="d-flex align-items-center">
                <div class="rating-popup mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                        <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                        <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                        <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                        <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                        <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z"></path>
                    </svg>
                </div>
                <p class="mb-0 ms-2">2 reviews</p>
            </div>

            <hr>

            <ul class="list-unstyled">
                <li><span class="pe-3">SKU:</span> DPB</li>
                <li><span class="pe-3">Weight:</span> 1.00 KGS</li>
                <li><span class="pe-3">Shipping:</span> Calculated at Checkout</li>
            </ul>

            <hr>
            <p class="me-3 fw-bold">Quantity:</p>
            <div class="d-flex align-items-center mb-3">
                <div class="d-flex align-items-center">
                    <svg type="button" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 512 512">
                        <path fill="cuurentColor" d="M256 16C123.452 16 16 123.452 16 256s107.452 240 240 240s240-107.452 240-240S388.548 16 256 16m147.078 387.078a207.253 207.253 0 1 1 44.589-66.125a207.3 207.3 0 0 1-44.589 66.125" />
                        <path fill="cuurentColor" d="M272.112 314.481V128h-32v186.481l-75.053-75.052l-22.627 22.627l113.68 113.68l113.681-113.68l-22.627-22.627z" />
                    </svg>
                    <input type="number" class="form-control text-center w-25 border-0 px-3" value="1" min="1" id="quantity">
                    <svg type="button" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 512 512">
                        <path fill="cuurentColor" d="M256 16C123.452 16 16 123.452 16 256s107.452 240 240 240s240-107.452 240-240S388.548 16 256 16m147.078 387.078a207.253 207.253 0 1 1 44.589-66.125a207.3 207.3 0 0 1-44.589 66.125" />
                        <path fill="cuurentColor" d="m142.319 241.027l22.628 22.627L240 188.602V376h32V188.602l75.053 75.052l22.628-22.627L256 127.347z" />
                    </svg>
                </div>
                <button class="btn btn-add-to-cart">
                    Add to Cart
                </button>
            </div>

            <div class="d-flex">
                <button class="btn btn-outline-secondary rounded-pill dropdown-toggle" data-bs-toggle="dropdown">Add to Wish List</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Wishlist 1</a></li>
                    <li><a class="dropdown-item" href="#">Wishlist 2</a></li>
                    <li><a class="dropdown-item" href="#">Wishlist 3</a></li>
                </ul>
            </div>
            <div class="d-flex align-items-center mt-3">
                <a href="#" class="mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                        <g fill="none" fill-rule="evenodd">
                            <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                            <path fill="#666666" d="M4 12a8 8 0 1 1 9 7.938V14h2a1 1 0 1 0 0-2h-2v-2a1 1 0 0 1 1-1h.5a1 1 0 1 0 0-2H14a3 3 0 0 0-3 3v2H9a1 1 0 1 0 0 2h2v5.938A8 8 0 0 1 4 12m8 10c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10" />
                        </g>
                    </svg>
                </a>
                <a href="#" class="mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                        <path fill="#666666" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 5l-8-5zm0 12H4V8l8 5l8-5z" />
                    </svg> </a>
                <a href="#" class="mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 14 14">
                        <g fill="none">
                            <g clip-path="url(#primeTwitter0)">
                                <path fill="#666666" d="M11.025.656h2.147L8.482 6.03L14 13.344H9.68L6.294 8.909l-3.87 4.435H.275l5.016-5.75L0 .657h4.43L7.486 4.71zm-.755 11.4h1.19L3.78 1.877H2.504z" />
                            </g>
                            <defs>
                                <clipPath id="primeTwitter0">
                                    <path fill="#fff" d="M0 0h14v14H0z" />
                                </clipPath>
                            </defs>
                        </g>
                    </svg> </a>
                <a href="#" class="mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 1024 1024">
                        <path fill="#666666" d="M847.7 112H176.3c-35.5 0-64.3 28.8-64.3 64.3v671.4c0 35.5 28.8 64.3 64.3 64.3h671.4c35.5 0 64.3-28.8 64.3-64.3V176.3c0-35.5-28.8-64.3-64.3-64.3m0 736q-671.7-.15-671.7-.3q.15-671.7.3-671.7q671.7.15 671.7.3q-.15 671.7-.3 671.7M230.6 411.9h118.7v381.8H230.6zm59.4-52.2c37.9 0 68.8-30.8 68.8-68.8a68.8 68.8 0 1 0-137.6 0c-.1 38 30.7 68.8 68.8 68.8m252.3 245.1c0-49.8 9.5-98 71.2-98c60.8 0 61.7 56.9 61.7 101.2v185.7h118.6V584.3c0-102.8-22.2-181.9-142.3-181.9c-57.7 0-96.4 31.7-112.3 61.7h-1.6v-52.2H423.7v381.8h118.6z" />
                    </svg> </a>
                <a href="#" class="mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" viewBox="0 0 24 24">
                        <path fill="#666666" d="M13.372 2.094a10.003 10.003 0 0 0-5.369 19.074a7.8 7.8 0 0 1 .162-2.292c.185-.839 1.296-5.463 1.296-5.463a3.7 3.7 0 0 1-.324-1.577c0-1.485.857-2.593 1.923-2.593a1.334 1.334 0 0 1 1.342 1.508c0 .9-.578 2.262-.88 3.54a1.544 1.544 0 0 0 1.575 1.923c1.897 0 3.17-2.431 3.17-5.301c0-2.201-1.457-3.847-4.143-3.847a4.746 4.746 0 0 0-4.93 4.793a2.96 2.96 0 0 0 .648 1.97a.48.48 0 0 1 .162.554c-.046.184-.162.623-.208.785a.354.354 0 0 1-.51.253c-1.384-.554-2.036-2.077-2.036-3.816c0-2.847 2.384-6.255 7.154-6.255c3.796 0 6.319 2.777 6.319 5.747c0 3.909-2.176 6.848-5.393 6.848a2.86 2.86 0 0 1-2.454-1.246s-.579 2.316-.692 2.754a8 8 0 0 1-1.019 2.131c.923.28 1.882.42 2.846.416a9.99 9.99 0 0 0 9.996-10.002a10 10 0 0 0-8.635-9.904" />
                    </svg> </a>
            </div>
        </div>
        <div class="border rounded-2 p-3 mt-5">
            <ul class="nav nav-tabs product-detail-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-1 active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description-tab-pane" type="button" role="tab" aria-controls="description-tab-pane" aria-selected="true">Description</button>
                </li>
                <li class="nav-item mx-md-4 mx-3" role="presentation">
                    <button class="nav-link px-1" id="specification-tab" data-bs-toggle="tab" data-bs-target="#specification-tab-pane" type="button" role="tab" aria-controls="specification-tab-pane" aria-selected="false">Specification</button>
                </li>
                <li class="nav-item mx-md-4 mx-3" role="presentation">
                    <button class="nav-link px-1" id="features-tab" data-bs-toggle="tab" data-bs-target="#features-tab-pane" type="button" role="tab" aria-controls="features-tab-pane" aria-selected="false">Features</button>
                </li>
                <li class="nav-item mx-md-4 mx-3" role="presentation">
                    <button class="nav-link px-1" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false">Reviews</button>
                </li>
                <li class="nav-item mx-md-4 mx-3" role="presentation">
                    <button class="nav-link px-1" id="extras-tab" data-bs-toggle="tab" data-bs-target="#extras-tab-pane" type="button" role="tab" aria-controls="extras-tab-pane" aria-selected="false">Extras</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade py-3 show active" id="description-tab-pane" role="tabpanel" aria-labelledby="description-tab" tabindex="0">
                    <p class="mb-0">
                        Packaged Terminal Air Conditioners (Commonly known as PTAC) are ideal for application in hotels, motels and apartments, where the environment of a single zone, with an outside wall needs to be controlled. As the name implies, a single package contains all the components of an air-cooled (and often heated) refrigeration and air-handling system. The entire package is self contained. PTAC’s are designed for through-the-wall installation, with decorative outdoor grilles. PTAC units are also available with various heating options (Electrical or Heat-Pump). Since the heat-pump ambient temperature (15 degrees Fahrenheit) may provide certain limitations in many climates, the most popular models are equipped with electric heat. <br>
                        <br>
                        Ramsond PTAC systems are easy and quick to install. They operate quietly. They are versatile and efficient and can be installed in variety of zones. They are integrated with the most reliable components available in the market. As such, they are backed by one of the best warranties in market. They are far more advanced than conventional air conditioning systems. Ramsond PTAC systems are not only sleek and stylish, but are super efficient and economical. For these and other reasons, Ramsond PTAC units have become the preferred choice of many HVAC professionals worldwide.
                    </p>
                </div>
                <div class="tab-pane fade py-3" id="specification-tab-pane" role="tabpanel" aria-labelledby="specification-tab" tabindex="0">
                    <div class="row main-specifiaction-div">
                        <div class="specification-first-table my-4">
                            <div class="d-flex table-responsive">
                                <table class="table table-custom">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="text-center">Model</th>
                                        </tr>
                                        <tr>
                                            <th>Feature</th>
                                            <th>Specification</th>
                                            <th>Unit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Power supply</td>
                                            <td>Capacity</td>
                                            <td>V/N/Hz</td>
                                        </tr>
                                        <tr>
                                            <td>Cooling</td>
                                            <td>Capacity</td>
                                            <td>Btu/h</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Power input</td>
                                            <td>W</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>EER</td>
                                            <td>Btu/h/w</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>IEER</td>
                                            <td>Btu/h/w</td>
                                        </tr>
                                        <tr>
                                            <td>Heating</td>
                                            <td>Capacity range</td>
                                            <td>Btu/h</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Power input</td>
                                            <td>W</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>COP</td>
                                            <td>W/W</td>
                                        </tr>
                                        <tr>
                                            <td>Indoor side performance</td>
                                            <td>Air flow</td>
                                            <td>CFM</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Noise level</td>
                                            <td>dB(A)</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Optional E-heater</td>
                                            <td>KW</td>
                                        </tr>
                                        <tr>
                                            <td>Compressor brand</td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td>Net dimension</td>
                                            <td>WxDxH</td>
                                            <td>inch</td>
                                        </tr>
                                        <tr>
                                            <td>Packing dimension</td>
                                            <td>WxDxH</td>
                                            <td>inch</td>
                                        </tr>
                                        <tr>
                                            <td>Net weight</td>
                                            <td></td>
                                            <td>LBS</td>
                                        </tr>
                                        <tr>
                                            <td>Gross weight</td>
                                            <td></td>
                                            <td>LBS</td>
                                        </tr>
                                        <tr>
                                            <td>Refrigerant</td>
                                            <td>Charge volume</td>
                                            <td>g/oz</td>
                                        </tr>
                                        <tr>
                                            <td>Qty per 20'/40'/40'/HQ</td>
                                            <td></td>
                                            <td>Set</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-custom ms-2">
                                    <thead>
                                        <tr>
                                            <th>MYP -09ANVR1-C</th>
                                            <th>MYP -12ANVR1-C</th>
                                            <th>MYP -15ANVR1-C</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>208~230/1/60</td>
                                            <td>208~230/1/60</td>
                                            <td>208~230/1/60</td>
                                        </tr>
                                        <tr>
                                            <td>9600/9400</td>
                                            <td>12200/12000</td>
                                            <td>15200/15000</td>
                                        </tr>
                                        <tr>
                                            <td>820/800</td>
                                            <td>1065/1045</td>
                                            <td>1400/1380</td>
                                        </tr>
                                        <tr>
                                            <td>11.7/11.7</td>
                                            <td>11.5/11.5</td>
                                            <td>10.8/10.8</td>
                                        </tr>
                                        <tr>
                                            <td>18.64</td>
                                            <td>17.74</td>
                                            <td>18.09</td>
                                        </tr>
                                        <tr>
                                            <td>5250~11900</td>
                                            <td>5300~14300</td>
                                            <td>7000~17140</td>
                                        </tr>
                                        <tr>
                                            <td>8800/8500</td>
                                            <td>11900/11800</td>
                                            <td>13800/13600</td>
                                        </tr>
                                        <tr>
                                            <td>720/695</td>
                                            <td>970/960</td>
                                            <td>1170/1160</td>
                                        </tr>
                                        <tr>
                                            <td>3.58/3.58</td>
                                            <td>3.60/3.60</td>
                                            <td>3.48/3.48</td>
                                        </tr>
                                        <tr>
                                            <td>4070~11570</td>
                                            <td>4140~13100</td>
                                            <td>6600~14800</td>
                                        </tr>
                                        <tr>
                                            <td>400/290</td>
                                            <td>470/360</td>
                                            <td>470/360</td>
                                        </tr>
                                        <tr>
                                            <td>50/42</td>
                                            <td>52/46</td>
                                            <td>52/46</td>
                                        </tr>
                                        <tr>
                                            <td>2.0/2.5/3.0</td>
                                            <td>2.0/2.5/3.0/(3+2)</td>
                                            <td>2.0/2.5/3.0/3.6/(3+2)</td>
                                        </tr>
                                        <tr>
                                            <td>MITSUIBISHI</td>
                                            <td>MITSUIBISHI</td>
                                            <td>MITSUIBISHI</td>
                                        </tr>
                                        <tr>
                                            <td>42x21x16</td>
                                            <td>42x21x16</td>
                                            <td>42x21x16</td>
                                        </tr>
                                        <tr>
                                            <td>45x25x19</td>
                                            <td>45x25x19</td>
                                            <td>45x25x19</td>
                                        </tr>
                                        <tr>
                                            <td>106</td>
                                            <td>108</td>
                                            <td>108</td>
                                        </tr>
                                        <tr>
                                            <td>119</td>
                                            <td>121</td>
                                            <td>121</td>
                                        </tr>
                                        <tr>
                                            <td>840/29.6</td>
                                            <td>910/32.1</td>
                                            <td>970/34.2</td>
                                        </tr>
                                        <tr>
                                            <td>72/152/190</td>
                                            <td>72/152/190</td>
                                            <td>72/152/190</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade py-3" id="features-tab-pane" role="tabpanel" aria-labelledby="features-tab" tabindex="0">
                    <div class="container feature-section">
                        <div class="row g-4 mt-2 align-items-center">
                            <div class="col-md-6 feature-item d-flex">
                                <div>
                                    <h3 class="feature-title">High Energy Efficiency</h3>
                                    <p class="feature-description">Efficient refrigeration design with EER up to 11.7 and COP up to 3.6, meeting the latest AHRI standard and DOE requirements.</p>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <img src="https://store-6cihw.mybigcommerce.com/content/ebay/Closing%20Sales/ptac/pane.jpg" alt="AHRI Certified" class="img-fluid">
                            </div>
                        </div>
                        <div class="row g-4 mt-2 align-items-center">
                            <div class="col-md-6 text-center">
                                <img src="https://cdn2.bigcommerce.com/server2800/u5behrs/content/products/AirConditioners/common/filterptac.jpg" alt="Silent Design Image" class="img-fluid">
                            </div>
                            <div class="col-md-6 feature-item d-flex">
                                <div>
                                    <h3 class="feature-title">Silent Design</h3>
                                    <p class="feature-description">Optimized air discharge channel design with specialized blower wheel and efficient rotary compressor for lower noise levels.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 mt-2 align-items-center">
                            <div class="col-md-6 feature-item d-flex">
                                <div>
                                    <h3 class="feature-title">Room Freeze Protection</h3>
                                    <p class="feature-description">When the indoor room temperature has fallen to 50°F, the unit will cycle on the fan and run electric heating mode to raise the temperature to 55°F.</p>
                                </div>
                            </div>
                            <div class="col-md-6 feature-item d-flex">
                                <div>
                                    <h3 class="feature-title">Self Diagnostics</h3>
                                    <p class="feature-description">Our units have a function of auto error check, and error codes will be shown on the electric display.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 mt-2 align-items-center">
                            <div class="col-md-6 feature-item d-flex">
                                <div>
                                    <h3 class="feature-title">Easy Installation And Maintenance</h3>
                                    <p class="feature-description">Indoor and outdoor sub assembly structure, integral type chassis structure, whole form air discharge channel, as well as sealed electric PCB box make installation and maintenance more convenient.</p>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <img src="https://store-6cihw.mybigcommerce.com/content/ebay/Closing%20Sales/ptac/remote.jpg" alt="Installation and Maintenance Image" class="feature-image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade py-3" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                    <h5>1 Review</h5>
                    <h6 class="mt-3">Terrariums are cool</h6>
                    <div class="mb-2">
                        <!-- Star rating -->
                        <div class="rating-popup mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z"></path>
                            </svg>
                        </div>
                    </div>
                    <p><small>Posted by Jane Doe on 7th Dec 2016</small></p>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel metus ac est egestas porta sed quis erat. Integer id nulla massa. Proin vitae enim nisi. Praesent non dignissim nulla. Nulla mattis id massa ac pharetra. Mauris et nisi in dolor aliquam sodales. Aliquam dui nisl, dictum quis leo sit amet, rutrum volutpat metus. Curabitur libero nunc, interdum ac libero non, tristique porttitor metus. Ut non dignissim lorem, in vestibulum leo. Vivamus sodales quis turpis eget.</p>
                </div>
                <div class="tab-pane fade py-3" id="extras-tab-pane" role="tabpanel" aria-labelledby="extras-tab" tabindex="0">
                    <p>Each Ramsond 15000 BTU PTAC System will be shipped as a complete package. It will include:</p>
                    <ul>
                        <li>RAMSOND PTAC Unit Insert</li>
                        <li>Wall Sleeve (off white color)</li>
                        <li>Rear Outdoor Grill</li>
                        <li>30 Amp LCDI Plug</li>
                        <li><a href="#" class="operation-manual">Operation Manual</a></li>
                        <li>1 Year Parts/5 Years Compressor Manufacturer Warranty</li>
                    </ul>
                    <p class="optional-note">(Optional Wireless Multifunction Digital Remote Control / Multifunction Digital Thermostat w/ Wiring Connection also available)</p>
                </div>
            </div>
        </div>
    </div>
    <!-- _______________________related Card Slider_________________________ -->
    <div class="related-cards-div mt-4">
        <h3 class="main-headings position-relative text-start">
            Related Products
            <div class="border-under-main-heading"></div>
        </h3>
        <div class="swiper mySwiper3">
            <div class="swiper-wrapper">
                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000" d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                                    <g fill="#000">
                                        <path d="M5.254 14.596a.5.5 0 0 1 .707-.707A5.5 5.5 0 0 0 15.35 10a.5.5 0 0 1 .999.001a6.5 6.5 0 0 1-11.096 4.596" />
                                        <path d="M13.131 12.416a.5.5 0 0 1-.555-.832l3-2a.5.5 0 1 1 .555.832z" />
                                        <path d="M18.266 12.723a.5.5 0 1 1-.832.554l-2-3a.5.5 0 0 1 .832-.554zm-3.912-7.518a.5.5 0 0 1-.708.707a5.5 5.5 0 0 0-9.389 3.89a.5.5 0 0 1-1-.001a6.5 6.5 0 0 1 11.097-4.596" />
                                        <path d="M6.476 7.385a.5.5 0 0 1 .555.832l-3 2a.5.5 0 1 1-.555-.832z" />
                                        <path d="M1.341 7.078a.5.5 0 1 1 .832-.554l2 3a.5.5 0 0 1-.832.554z" />
                                    </g>
                                </svg>
                            </button>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{url('product_detail')}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}" alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                            <p class="card-title mt-2 border-top pt-3">Suscipit laboriosam nisi</p>
                            <div class="price-and-btn">
                                <h5 class="card-price">$12.99</h5>
                                <button class="btn btn-add-to-cart">
                                    <span class="me-2">+</span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000" d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                                    <g fill="#000">
                                        <path d="M5.254 14.596a.5.5 0 0 1 .707-.707A5.5 5.5 0 0 0 15.35 10a.5.5 0 0 1 .999.001a6.5 6.5 0 0 1-11.096 4.596" />
                                        <path d="M13.131 12.416a.5.5 0 0 1-.555-.832l3-2a.5.5 0 1 1 .555.832z" />
                                        <path d="M18.266 12.723a.5.5 0 1 1-.832.554l-2-3a.5.5 0 0 1 .832-.554zm-3.912-7.518a.5.5 0 0 1-.708.707a5.5 5.5 0 0 0-9.389 3.89a.5.5 0 0 1-1-.001a6.5 6.5 0 0 1 11.097-4.596" />
                                        <path d="M6.476 7.385a.5.5 0 0 1 .555.832l-3 2a.5.5 0 1 1-.555-.832z" />
                                        <path d="M1.341 7.078a.5.5 0 1 1 .832-.554l2 3a.5.5 0 0 1-.832.554z" />
                                    </g>
                                </svg>
                            </button>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{url('/product_detail')}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}" alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                            <p class="card-title mt-2 border-top pt-3">Suscipit laboriosam nisi</p>
                            <div class="price-and-btn">
                                <h5 class="card-price">$12.99</h5>
                                <button class="btn btn-add-to-cart">
                                    <span class="me-2">+</span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000" d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                                    <g fill="#000">
                                        <path d="M5.254 14.596a.5.5 0 0 1 .707-.707A5.5 5.5 0 0 0 15.35 10a.5.5 0 0 1 .999.001a6.5 6.5 0 0 1-11.096 4.596" />
                                        <path d="M13.131 12.416a.5.5 0 0 1-.555-.832l3-2a.5.5 0 1 1 .555.832z" />
                                        <path d="M18.266 12.723a.5.5 0 1 1-.832.554l-2-3a.5.5 0 0 1 .832-.554zm-3.912-7.518a.5.5 0 0 1-.708.707a5.5 5.5 0 0 0-9.389 3.89a.5.5 0 0 1-1-.001a6.5 6.5 0 0 1 11.097-4.596" />
                                        <path d="M6.476 7.385a.5.5 0 0 1 .555.832l-3 2a.5.5 0 1 1-.555-.832z" />
                                        <path d="M1.341 7.078a.5.5 0 1 1 .832-.554l2 3a.5.5 0 0 1-.832.554z" />
                                    </g>
                                </svg>
                            </button>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{url('/product_detail')}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}" alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                            <p class="card-title mt-2 border-top pt-3">Suscipit laboriosam nisi</p>
                            <div class="price-and-btn">
                                <h5 class="card-price">$12.99</h5>
                                <button class="btn btn-add-to-cart">
                                    <span class="me-2">+</span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000" d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                                    <g fill="#000">
                                        <path d="M5.254 14.596a.5.5 0 0 1 .707-.707A5.5 5.5 0 0 0 15.35 10a.5.5 0 0 1 .999.001a6.5 6.5 0 0 1-11.096 4.596" />
                                        <path d="M13.131 12.416a.5.5 0 0 1-.555-.832l3-2a.5.5 0 1 1 .555.832z" />
                                        <path d="M18.266 12.723a.5.5 0 1 1-.832.554l-2-3a.5.5 0 0 1 .832-.554zm-3.912-7.518a.5.5 0 0 1-.708.707a5.5 5.5 0 0 0-9.389 3.89a.5.5 0 0 1-1-.001a6.5 6.5 0 0 1 11.097-4.596" />
                                        <path d="M6.476 7.385a.5.5 0 0 1 .555.832l-3 2a.5.5 0 1 1-.555-.832z" />
                                        <path d="M1.341 7.078a.5.5 0 1 1 .832-.554l2 3a.5.5 0 0 1-.832.554z" />
                                    </g>
                                </svg>
                            </button>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{url('/product_detail')}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}" alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                            <p class="card-title mt-2 border-top pt-3">Suscipit laboriosam nisi</p>
                            <div class="price-and-btn">
                                <h5 class="card-price">$12.99</h5>
                                <button class="btn btn-add-to-cart">
                                    <span class="me-2">+</span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000" d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                                    <g fill="#000">
                                        <path d="M5.254 14.596a.5.5 0 0 1 .707-.707A5.5 5.5 0 0 0 15.35 10a.5.5 0 0 1 .999.001a6.5 6.5 0 0 1-11.096 4.596" />
                                        <path d="M13.131 12.416a.5.5 0 0 1-.555-.832l3-2a.5.5 0 1 1 .555.832z" />
                                        <path d="M18.266 12.723a.5.5 0 1 1-.832.554l-2-3a.5.5 0 0 1 .832-.554zm-3.912-7.518a.5.5 0 0 1-.708.707a5.5 5.5 0 0 0-9.389 3.89a.5.5 0 0 1-1-.001a6.5 6.5 0 0 1 11.097-4.596" />
                                        <path d="M6.476 7.385a.5.5 0 0 1 .555.832l-3 2a.5.5 0 1 1-.555-.832z" />
                                        <path d="M1.341 7.078a.5.5 0 1 1 .832-.554l2 3a.5.5 0 0 1-.832.554z" />
                                    </g>
                                </svg>
                            </button>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{url('/product_detail')}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}" alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                            <p class="card-title mt-2 border-top pt-3">Suscipit laboriosam nisi</p>
                            <div class="price-and-btn">
                                <h5 class="card-price">$12.99</h5>
                                <button class="btn btn-add-to-cart">
                                    <span class="me-2">+</span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000" d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                                    <g fill="#000">
                                        <path d="M5.254 14.596a.5.5 0 0 1 .707-.707A5.5 5.5 0 0 0 15.35 10a.5.5 0 0 1 .999.001a6.5 6.5 0 0 1-11.096 4.596" />
                                        <path d="M13.131 12.416a.5.5 0 0 1-.555-.832l3-2a.5.5 0 1 1 .555.832z" />
                                        <path d="M18.266 12.723a.5.5 0 1 1-.832.554l-2-3a.5.5 0 0 1 .832-.554zm-3.912-7.518a.5.5 0 0 1-.708.707a5.5 5.5 0 0 0-9.389 3.89a.5.5 0 0 1-1-.001a6.5 6.5 0 0 1 11.097-4.596" />
                                        <path d="M6.476 7.385a.5.5 0 0 1 .555.832l-3 2a.5.5 0 1 1-.555-.832z" />
                                        <path d="M1.341 7.078a.5.5 0 1 1 .832-.554l2 3a.5.5 0 0 1-.832.554z" />
                                    </g>
                                </svg>
                            </button>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{url('/product_detail')}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}" alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                            <p class="card-title mt-2 border-top pt-3">Suscipit laboriosam nisi</p>
                            <div class="price-and-btn">
                                <h5 class="card-price">$12.99</h5>
                                <button class="btn btn-add-to-cart">
                                    <span class="me-2">+</span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000" d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                                    <g fill="#000">
                                        <path d="M5.254 14.596a.5.5 0 0 1 .707-.707A5.5 5.5 0 0 0 15.35 10a.5.5 0 0 1 .999.001a6.5 6.5 0 0 1-11.096 4.596" />
                                        <path d="M13.131 12.416a.5.5 0 0 1-.555-.832l3-2a.5.5 0 1 1 .555.832z" />
                                        <path d="M18.266 12.723a.5.5 0 1 1-.832.554l-2-3a.5.5 0 0 1 .832-.554zm-3.912-7.518a.5.5 0 0 1-.708.707a5.5 5.5 0 0 0-9.389 3.89a.5.5 0 0 1-1-.001a6.5 6.5 0 0 1 11.097-4.596" />
                                        <path d="M6.476 7.385a.5.5 0 0 1 .555.832l-3 2a.5.5 0 1 1-.555-.832z" />
                                        <path d="M1.341 7.078a.5.5 0 1 1 .832-.554l2 3a.5.5 0 0 1-.832.554z" />
                                    </g>
                                </svg>
                            </button>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{url('/product_detail')}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}" alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                            <p class="card-title mt-2 border-top pt-3">Suscipit laboriosam nisi</p>
                            <div class="price-and-btn">
                                <h5 class="card-price">$12.99</h5>
                                <button class="btn btn-add-to-cart">
                                    <span class="me-2">+</span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Navigation buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>




@endsection