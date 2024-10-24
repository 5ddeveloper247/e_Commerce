<!-- _______________________NewsLetter_________________________ -->
<div class="newsletter">
    <div class="container py-5">
        <div class="row justify-content-md-between justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="d-flex justify-content-center align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 48 48">
                        <g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4">
                            <path fill="currentColor"
                                d="M44 18v21.818C44 41.023 43.105 42 42 42H6c-1.105 0-2-.977-2-2.182V18l20 13z" />
                            <path stroke-linecap="round" d="M4 17.784L24 4l20 13.784" />
                        </g>
                    </svg>
                    <h4 class="text-white ps-2 mb-0">Sign Up For NewsLetter</h4>
                </div>
            </div>

            <div class="col-md-6">
                <form class="d-flex mt-md-0 mt-3" id="newsLetterForm">
                    <input class="form-control me-2 nav-search" maxlength="50" name="email" id="email" type="search"
                        placeholder="Your email address" aria-label="Search">
                    <button class="btn nav-search-btn d-flex align-items-center justify-content-center" type="button"
                        id="newsLetterSubscribeBtn">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@php
// Call the siteCommonData helper and extract the data
$siteData = siteCommonData();
// Extract specific variables from the returned data array
$settings = $siteData['settings'];
$products = $siteData['products'];
$categories = $siteData['categories'];
$brands = $siteData['brands'];
// dd()

@endphp

<footer class="bg-light text-dark pt-md-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <h5>Info</h5>
                <div class="d-flex mt-1">
                    <svg class=" mt-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        viewBox="0 0 512 512">
                        <circle cx="256" cy="192" r="32" fill="currentColor" />
                        <path fill="#666666"
                            d="M256 32c-88.22 0-160 68.65-160 153c0 40.17 18.31 93.59 54.42 158.78c29 52.34 62.55 99.67 80 123.22a31.75 31.75 0 0 0 51.22 0c17.42-23.55 51-70.88 80-123.22C397.69 278.61 416 225.19 416 185c0-84.35-71.78-153-160-153m0 224a64 64 0 1 1 64-64a64.07 64.07 0 0 1-64 64" />
                    </svg>
                    <p class="ms-2">

                        {{ @$settings->address }}
                    </p>
                </div>
                <div class="d-flex align-items-center mt-1">
                    <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="#666666"
                            d="M4 20q-.825 0-1.412-.587T2 18V6q0-.825.588-1.412T4 4h16q.825 0 1.413.588T22 6v12q0 .825-.587 1.413T20 20zm8-7L4 8v10h16V8zm0-2l8-5H4zM4 8V6v12z" />
                    </svg>
                    <p class="ms-2 mb-0">
                        {{ @$settings->email }}
                    </p>
                </div>
                <div class="d-flex align-items-center mt-3 mb-0 mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <path fill="#000"
                            d="m19.23 15.26l-2.54-.29a1.99 1.99 0 0 0-1.64.57l-1.84 1.84a15.05 15.05 0 0 1-6.59-6.59l1.85-1.85c.43-.43.64-1.03.57-1.64l-.29-2.52a2 2 0 0 0-1.99-1.77H5.03c-1.13 0-2.07.94-2 2.07c.53 8.54 7.36 15.36 15.89 15.89c1.13.07 2.07-.87 2.07-2v-1.73c.01-1.01-.75-1.86-1.76-1.98" />
                    </svg>
                    <h5 class="ms-2 mb-0">
                        {{ @$settings->phone }}
                    </h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>Navigate</h5>
                <ul class="list-unstyled">
                    <li><a href="{{'contact_us'}}">Contact Us</a></li>
                    <li><a href={{url('shipping-returns')}}>Shipping & Returns</a></li>
                    <li><a href={{url('privacy-policy')}}>Privacy Policy</a></li>
                    <li><a href={{url('terms-conditions')}}>Terms & Conditions</a></li>
                    <li><a href="{{'about_us'}}">About Us</a></li>
                    <li><a href="{{'delivery-information'}}">Delivery Information</a></li>
                    <li><a href="{{'faqs'}}">FAQ's</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>Categories</h5>
                <ul class="list-unstyled">
                    <li><a href="{{url('/products')}}">Shop All</a></li>
                    @foreach ($categories as $category )
                    @if($category->status==1 || $category->status=="1")
                    <li><a href="{{ url('/products'.'/'. $category->category_name) }}">{{ $category->category_name
                            }}</a></li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-3 col-md-4 footer-brands">
                <h5>Popular Brands</h5>
                <ul class="list-unstyled">
                    @foreach ($brands as $brand )
                    @if($brand->status==1 || $brand->status=="1")
                    <li><a href="{{ $brand->url?? " #" }}">{{ $brand->title }}</a></li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row justify-content-center align-items-center text-center footer-mains-offers py-4">
            <div class="col-lg-3 col-md-4 col-12 mb-4 mb-md-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 36 24">
                    <path fill="#000"
                        d="M33.6 24H2.4A2.4 2.4 0 0 1 0 21.6V11.504h1.729l.39-.944h.873l.389.94h3.402v-.715l.304.72h1.766l.304-.732v.73h8.453V9.959h.16c.114.004.147.014.147.204v1.342h4.373v-.359c.447.227.974.36 1.533.36l.095-.001h-.005h1.84l.394-.94h.873l.385.94h3.546v-.894l.536.894h2.836V5.601h-2.807v.697l-.393-.697h-2.886v.697l-.361-.697h-3.897a3.5 3.5 0 0 0-1.709.353l.021-.009v-.344h-2.688v.344a1.63 1.63 0 0 0-1.149-.343h.006h-9.823l-.659 1.525l-.677-1.525H4.207v.697l-.341-.697h-2.64l-1.223 2.8v-6a2.4 2.4 0 0 1 2.4-2.4h31.2a2.4 2.4 0 0 1 2.4 2.4v10.48H34.13q-.047-.002-.101-.002c-.434 0-.837.13-1.173.353l.008-.005v-.346h-2.77a1.92 1.92 0 0 0-1.215.349l.006-.004v-.346h-4.946v.346a2.7 2.7 0 0 0-1.327-.346h-.039h.002h-3.263v.346a2.25 2.25 0 0 0-1.436-.345l.009-.001h-3.651l-.836.904l-.782-.904H7.162v5.908h5.352l.861-.918l.811.918h3.299v-1.383h.46a3.2 3.2 0 0 0 1.296-.217l-.022.008v1.594h2.72v-1.539h.131c.166 0 .183.006.183.174v1.366h8.266l.101.002c.474 0 .916-.142 1.284-.385l-.009.005v.378h2.622l.125.002c.491 0 .958-.101 1.382-.284l-.023.009v3.082a2.4 2.4 0 0 1-2.4 2.4zm-12.495-6.039h-1.018v-4.235h2.336a2.45 2.45 0 0 1 1.233.206l-.016-.006c.313.172.522.5.522.876l-.002.067v-.003l.001.038c0 .486-.293.904-.713 1.086l-.008.003c.201.072.369.195.494.354l.002.002a1.23 1.23 0 0 1 .168.779l.001-.006v.838h-1.016v-.53a1.2 1.2 0 0 0-.163-.834l.003.005a.98.98 0 0 0-.748-.187l.006-.001h-1.082v1.547zm0-3.36v.951h1.23a.97.97 0 0 0 .506-.09l-.006.003a.46.46 0 0 0 .21-.385l-.001-.023v.001a.4.4 0 0 0-.207-.38l-.002-.001a1 1 0 0 0-.484-.08h.004zM12.08 17.96H8.073v-4.234h4.07l1.245 1.388l1.287-1.388h3.233c1.148 0 1.706.457 1.706 1.395c0 .955-.577 1.419-1.76 1.419h-1.265v1.419h-1.967l-1.246-1.399zm3.501-3.78l-1.554 1.67l1.554 1.724zm-6.499 2.055v.842h2.488l1.15-1.242l-1.106-1.234H9.081v.77h2.222v.863zm7.507-1.633v1.078h1.307c.4 0 .63-.204.63-.56c0-.34-.214-.519-.619-.519zm18.038 3.36h-1.954v-.91h1.946a.56.56 0 0 0 .411-.106l-.001.001a.37.37 0 0 0 .119-.273v-.016a.35.35 0 0 0-.123-.266a.5.5 0 0 0-.358-.094h.002l-.187-.006c-.914-.024-1.949-.052-1.949-1.305c0-.61.382-1.261 1.451-1.261h2.017v.902h-1.845a.7.7 0 0 0-.412.082l.004-.002a.33.33 0 0 0-.147.302v-.001v.011a.32.32 0 0 0 .22.304l.002.001a1.1 1.1 0 0 0 .392.048h-.003l.549.014a1.58 1.58 0 0 1 1.151.343l-.003-.002q.045.036.079.079l.001.001l.012 1.612a1.58 1.58 0 0 1-1.381.541zm-3.949 0h-1.972v-.91h1.962a.58.58 0 0 0 .415-.106l-.002.001a.37.37 0 0 0 .118-.273v-.01a.36.36 0 0 0-.123-.272a.53.53 0 0 0-.363-.094h.002l-.186-.006c-.911-.024-1.945-.052-1.945-1.305c0-.61.38-1.261 1.447-1.261h2.028v.902h-1.856a.7.7 0 0 0-.409.082l.004-.002a.354.354 0 0 0 .066.619l.002.001a1.1 1.1 0 0 0 .397.048h-.003l.545.014a1.6 1.6 0 0 1 1.158.344l-.003-.003a1.18 1.18 0 0 1 .302.901v-.005c.003.883-.532 1.333-1.587 1.333zm-2.578 0h-3.38v-4.237h3.377v.875H25.73v.77h2.312v.863H25.73v.842l2.37.004v.88zm1.97-7.286h-2.061l-.394-.944h-2.102l-.382.944h-1.184a2.18 2.18 0 0 1-1.472-.471l.005.003a2.12 2.12 0 0 1-.54-1.625l-.001.008a2.2 2.2 0 0 1 .548-1.657l-.002.002a2.03 2.03 0 0 1 1.545-.492l-.008-.001h.98v.903h-.96a.96.96 0 0 0-.78.251l.001-.001a1.4 1.4 0 0 0-.291.964v-.005a1.46 1.46 0 0 0 .281.998l-.003-.004a.98.98 0 0 0 .709.218h-.004h.454l1.431-3.33h1.52l1.713 4v-4h1.541l1.778 2.948V6.437h1.04v4.232h-1.444l-1.92-3.178v3.178zm-3.499-3.518l-.697 1.688h1.397zm-9.799 3.516H15.76V6.44h2.328a2.36 2.36 0 0 1 1.241.209l-.015-.006a1 1 0 0 1 .514.871l-.002.07v-.003v.031a1.2 1.2 0 0 1-.706 1.094l-.008.003c.201.076.37.198.499.354l.002.002a1.2 1.2 0 0 1 .167.783l.001-.006v.831H18.76l-.004-.534v-.08a1.1 1.1 0 0 0-.163-.749l.003.005a1 1 0 0 0-.744-.181l.006-.001h-1.085v1.54zm0-3.353v.94H18a.9.9 0 0 0 .505-.09l-.005.002a.44.44 0 0 0 .21-.373l-.001-.028v.001a.39.39 0 0 0-.211-.373l-.002-.001a1 1 0 0 0-.483-.08h.003zM6.056 10.674H4l-.389-.944H1.503l-.392.944h-1.1L1.824 6.44h1.503l1.721 4.007V6.44h1.651l1.324 2.871L9.24 6.44h1.685v4.232h-1.04L9.883 7.36l-1.467 3.313h-.888L6.057 7.355v3.318zM2.552 7.158l-.689 1.688h1.382zm18.888 3.515h-1.032V6.44h1.033v4.232zm-6.386 0H11.68V6.44h3.38v.88h-2.368v.763h2.311v.869H12.69v.846h2.368v.874z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 1000 1000">
                    <path fill="#000"
                        d="M45.938 186c-25.69 0-46.532 20.814-46.532 46.5v535c0 25.689 20.844 46.5 46.532 46.5h906.968c25.69 0 46.5-20.814 46.5-46.5v-535c0-25.689-20.812-46.5-46.5-46.5zm479.937 176.781c.678-.017 1.349 0 2.031 0c43.67 0 79.063 35.387 79.063 79.063c0 43.675-35.394 79.094-79.063 79.094s-79.062-35.419-79.062-79.094c0-42.993 34.305-77.98 77.031-79.063m-249.563 3.469c15.675 0 30.042 5.38 42.032 15.875L303.75 401.25c-7.27-8.152-14.146-11.594-22.5-11.594c-12.028 0-20.781 6.835-20.781 15.844c0 7.726 4.915 11.836 21.656 18.031c31.73 11.607 41.125 21.899 41.125 44.625c0 27.695-20.323 46.969-49.313 46.969c-21.221 0-36.68-8.381-49.53-27.25l18.03-17.344c6.42 12.425 17.134 19.063 30.438 19.063c12.442 0 21.656-8.567 21.656-20.156c0-6.008-2.769-11.17-8.344-14.813c-2.806-1.724-8.363-4.304-19.28-8.156c-26.2-9.435-35.188-19.51-35.188-39.219c0-23.412 19.289-41 44.594-41zm131.22 0c12 0 22.094 2.565 34.343 8.75v32.688c-11.603-11.298-21.69-16.032-35-16.032c-26.162 0-46.719 21.595-46.719 48.938c0 28.845 19.936 49.125 48.031 49.125c12.648 0 22.533-4.479 33.688-15.594v32.688c-12.686 5.948-22.988 8.312-35 8.312c-42.478 0-75.469-32.48-75.469-74.344c0-41.413 33.863-74.531 76.125-74.531zm-352.876 2.344h41.25c45.578 0 77.344 29.158 77.344 71.031c0 20.879-9.724 41.072-26.156 54.469c-13.833 11.308-29.586 16.375-51.406 16.375H54.656zm131.375 0h26.75v141.875h-26.75zm409.313 0h30.406l38.063 95.969l38.562-95.97h30.188l-61.657 146.532h-15zm148.843 0h79.063v24.031h-51.219v31.5h49.344v24.031h-49.344v38.281h51.219v24.032h-79.063zm98.844 0h41.438c32.246 0 50.75 15.312 50.75 41.875c0 21.723-11.597 35.976-32.657 40.219l45.125 59.78h-34.406l-38.687-57h-3.657v57h-27.906V368.595zm28.094 22.344v43.187h8.094c17.681 0 27.062-7.7 27.062-22.031c0-13.874-9.382-21.156-26.625-21.156zM82.75 392.5v94.063h7.531c18.18 0 29.693-3.437 38.531-11.313c9.737-8.541 15.563-22.186 15.563-35.844c0-13.625-5.826-26.86-15.563-35.406c-9.29-8.3-20.352-11.5-38.53-11.5zm904.469 134.188s.28 152.372-.344 232.468c-.055 7.01-2.621 18.107-10.594 27.344s-20.373 13.558-27.781 13.531s-724.094 0-724.094 0C716.298 715.174 987.22 526.688 987.22 526.688z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 1000 1000">
                    <path fill="#000"
                        d="M46.531 195C20.841 195 0 215.83 0 241.531V776.47C0 802.166 20.844 823 46.531 823H953.47c25.69 0 46.531-20.83 46.531-46.531V241.53c0-25.697-20.844-46.531-46.531-46.531H46.53zm281.375 75.594c57.081 0 109.505 19.859 150.656 53.031c-34.622 30.979-60.446 71.68-73.187 117.813h19.969c11.76-38.058 33.123-71.942 61.281-98.813c28.158 26.871 49.52 60.755 61.281 98.813h20.282c-12.918-45.89-38.778-86.348-73.375-117.125c41.23-33.593 93.86-53.72 151.187-53.72c132.291 0 239.531 107.252 239.531 239.563S778.291 749.719 646 749.719c-58.28 0-111.72-20.802-153.25-55.407c37.15-32.32 64.538-75.647 77.063-124.937H550.28c-11.121 41.37-33.505 78.165-63.656 106.938c-30.15-28.773-52.503-65.568-63.625-106.938h-18.594c12.598 48.576 39.628 91.297 76.219 123.313c-41.454 34.176-94.684 54.718-152.719 54.718c-132.29 0-239.53-106.736-239.53-238.406s107.24-238.406 239.531-238.406M628.031 439c-28.781 0-56.781 25.162-56.781 72.406c0 31.328 15.124 52 44.875 52c8.412.003 21.813-3.437 21.813-3.437l4.437-27.375s-12.23 6.187-20.625 6.187c-17.685 0-24.781-13.601-24.781-28.218c0-29.653 15.216-45.97 32.156-45.97c12.703 0 22.906 7.188 22.906 7.188l4.063-26.625S640.99 439 628.03 439zM870 441.313l-25.031.062l-5.375 32.938s-9.41-12.782-24.125-12.782c-22.88 0-41.938 27.18-41.938 58.438c0 20.177 10.143 39.968 30.938 39.968c14.958 0 23.25-10.28 23.25-10.28l-1.094 8.78h24.313zm-716.938.343l-19.937 117.406h24.031l15.188-88.53l2.25 88.53h17.187l32.063-88.53l-14.219 88.53h25.531l19.688-117.406h-39.5l-24.594 72.031l-1.281-72.03h-36.406zm251.063 7.625c-.543.545-14.531 81.207-14.531 91.031c0 14.546 8.153 21.043 19.625 20.938c8.22-.07 14.586-2.135 17.531-3c.308-.083.906-.25.906-.25l3.094-21c-1.682 0-4.16.719-6.344.719c-8.565 0-9.514-4.557-8.969-7.938l6.907-42.843h13.031l3.156-23.22H426.25l2.5-14.437zm290.469 11.813c-16.773 0-29.625 5.531-29.625 5.531l-3.563 21.563s10.615-4.407 26.657-4.407c9.108 0 15.78 1.042 15.78 8.625c0 4.606-.812 6.313-.812 6.313s-7.202-.625-10.531-.625c-21.152 0-43.375 9.27-43.375 37.156c0 21.972 14.589 27 23.625 27c17.258 0 24.7-11.465 25.094-11.5l-.813 9.563h21.532l9.625-69c.003-29.278-24.934-30.22-33.594-30.22zm-403.907.125c-16.834 0-29.75 5.531-29.75 5.531l-3.562 21.563s10.65-4.407 26.75-4.407c9.142 0 15.844 1.046 15.844 8.625c0 4.604-.813 6.313-.813 6.313s-7.223-.625-10.562-.625c-21.233 0-43.531 9.255-43.531 37.125c0 21.96 14.618 27 23.687 27c17.321 0 24.79-11.466 25.188-11.5l-.813 9.562h21.625l9.656-68.968c0-29.261-25.027-30.22-33.719-30.22zm76.375 0c-18.077 0-36.437 7.297-36.437 32.219c0 28.238 30.594 25.385 30.594 37.28c0 7.94-8.538 8.595-15.125 8.595c-11.4 0-21.651-3.939-21.688-3.75l-3.281 21.562c.59.183 6.938 3.031 27.438 3.031c5.504 0 36.968 1.398 36.968-31.375c0-30.639-29.125-24.566-29.125-36.875c0-6.128 4.729-8.062 13.406-8.062c3.446 0 16.72 1.094 16.72 1.094l3.062-21.782c0 .003-8.565-1.937-22.531-1.937zm113 0c-25.12.005-43.718 27.017-43.718 57.531c0 35.219 23.302 43.594 43.156 43.594c18.326 0 26.406-4.094 26.406-4.094l4.375-24.031s-13.941 6.125-26.531 6.125c-26.826 0-22.125-19.969-22.125-19.969h50.781s3.282-16.138 3.282-22.719c0-16.42-8.195-36.437-35.625-36.437zm90.97 1.031c-11.317 0-19.72 15.219-19.72 15.219l2.25-13.969h-23.5l-15.78 96.438h25.968c7.355-41.182 8.698-74.621 26.25-68.5c3.072-15.94 6.053-22.098 9.406-28.844c0 0-1.575-.344-4.875-.344zm210.405 0c-11.316 0-19.718 15.219-19.718 15.219l2.25-13.969h-23.5l-15.782 96.438h25.938c7.358-41.182 8.735-74.621 26.281-68.5c3.078-15.94 6.056-22.098 9.407-28.844c0 0-1.576-.344-4.875-.344zm-301.5 20.719c14.267 0 11.657 16.104 11.657 17.406H463.5c0-1.662 2.658-17.406 16.438-17.406zm339.47 1.875c9.08-.003 13.75 6.131 13.75 20.562c0 13.094-6.604 30.594-20.282 30.594c-9.078 0-13.344-7.497-13.344-19.25c0-19.218 8.792-31.906 19.875-31.906zm-124.782 32.812c3.704.005 4.47.365 5.094.532c-.09-.015-.107.002.25.062c.469 4.295-2.595 24.438-17.407 24.438c-7.637 0-9.593-6.073-9.593-9.657c0-6.988 3.638-15.375 21.656-15.375m-403.906.094c4.207.005 4.666.475 5.375.594c.47 4.293-2.606 24.406-17.469 24.406c-7.667 0-9.656-6.044-9.656-9.625c0-6.984 3.66-15.375 21.75-15.375" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 36 24">
                    <path fill="#000"
                        d="M33.6 24H2.4A2.4 2.4 0 0 1 0 21.6V2.4A2.4 2.4 0 0 1 2.4 0h31.2A2.4 2.4 0 0 1 36 2.4v19.2a2.4 2.4 0 0 1-2.4 2.4M14.032 10.325a.18.18 0 0 0-.142.07a.22.22 0 0 0-.063.15c0 .021.098.32.308.933l.454 1.326l.211.618q.355 1.04.371 1.106a14.6 14.6 0 0 0-1.259 1.828l-.038.07l-.002.025c0 .1.081.182.182.182l.027-.002h-.001h1.218a.34.34 0 0 0 .283-.159l.001-.001l4.032-5.819a.16.16 0 0 0 .033-.097l-.001-.015v.001a.22.22 0 0 0-.063-.15a.18.18 0 0 0-.141-.07h-1.219a.34.34 0 0 0-.284.159l-.001.001l-1.68 2.466l-.695-2.372a.334.334 0 0 0-.323-.254l-.026.001h.001zm13.978-.111h-.026c-.758 0-1.439.329-1.909.851l-.002.002a2.85 2.85 0 0 0-.8 1.982v.027v-.001q-.002.045-.002.098c0 .537.209 1.026.549 1.389l-.001-.001a1.96 1.96 0 0 0 1.468.554h-.005c.337-.004.657-.073.949-.197l-.016.006c.295-.111.545-.284.742-.504l.002-.002q-.015.084-.034.151l.002-.01a1 1 0 0 0-.032.188v.002q0 .252.206.253h1.091a.32.32 0 0 0 .348-.299v-.001l.648-4.127a.21.21 0 0 0-.047-.177a.2.2 0 0 0-.157-.08h-1.203c-.147 0-.24.175-.27.522a1.66 1.66 0 0 0-1.509-.627l.008-.001zm-17.963 0h-.028c-.757 0-1.438.329-1.906.851l-.002.002a2.85 2.85 0 0 0-.8 1.982v.027v-.001a2.02 2.02 0 0 0 .548 1.486l-.001-.001c.354.344.838.556 1.372.556l.096-.002h-.005c.332-.005.647-.074.934-.197l-.016.006c.299-.114.553-.286.758-.505l.001-.001c-.037.098-.06.212-.063.33v.002q.001.252.206.253h1.09a.32.32 0 0 0 .348-.299v-.001l.649-4.127a.21.21 0 0 0-.048-.175a.2.2 0 0 0-.157-.08H11.82c-.147 0-.24.175-.269.522a1.69 1.69 0 0 0-1.51-.628l.008-.001zM32.612 8l-.016-.001a.19.19 0 0 0-.19.174v.001l-1.028 6.578a.19.19 0 0 0 .047.181a.2.2 0 0 0 .154.071h1.05l.032.002a.3.3 0 0 0 .3-.3v-.002l1.026-6.465l.001-.022a.26.26 0 0 0-.053-.158v.001a.2.2 0 0 0-.14-.061L33.78 8h.001zm-11.67 0a.31.31 0 0 0-.348.299l-1.027 6.452a.21.21 0 0 0 .047.174a.19.19 0 0 0 .156.08h1.305a.25.25 0 0 0 .248-.204v-.002l.285-1.834a.3.3 0 0 1 .111-.205h.001a.5.5 0 0 1 .237-.103h.003c.081-.015.174-.023.269-.024h.001q.126 0 .3.016a3 3 0 0 0 .382.02a2.9 2.9 0 0 0 1.976-.773l-.002.002a2.86 2.86 0 0 0 .774-2.135v.008a1.53 1.53 0 0 0-.605-1.35l-.004-.003a2.73 2.73 0 0 0-1.6-.419h.006zM2.96 8a.3.3 0 0 0-.332.298V8.3L1.6 14.752a.21.21 0 0 0 .047.174a.19.19 0 0 0 .156.08h1.204a.31.31 0 0 0 .348-.299l.285-1.739a.3.3 0 0 1 .11-.205h.001a.5.5 0 0 1 .237-.103h.003a1.6 1.6 0 0 1 .268-.024h.001q.126 0 .3.016a3 3 0 0 0 .381.02c.763 0 1.457-.293 1.977-.773l-.002.002a2.86 2.86 0 0 0 .774-2.135v.008a1.53 1.53 0 0 0-.605-1.35l-.004-.003a2.73 2.73 0 0 0-1.593-.42h.006zm24.984 5.835l-.048.001a1.08 1.08 0 0 1-.698-.255l.002.001a.9.9 0 0 1-.286-.653l.001-.045v-.027c0-.374.151-.713.396-.959c.241-.247.577-.4.949-.4h.033h-.002l.034-.001c.269 0 .514.099.702.262l-.001-.001a.92.92 0 0 1 .294.674l-.001.048v-.002v.024c0 .369-.153.703-.4.94a1.34 1.34 0 0 1-.949.391h-.025h.001zm-17.979 0l-.05.001c-.262 0-.503-.096-.687-.255l.001.001a.9.9 0 0 1-.278-.651l.001-.047v-.027c0-.374.151-.713.396-.959c.241-.247.576-.4.948-.4h.035h-.002l.034-.001c.269 0 .514.099.702.262l-.001-.001a.92.92 0 0 1 .293.673l-.001.049v-.002v.035c0 .369-.153.701-.4.938a1.37 1.37 0 0 1-.954.384h-.036h.002zm11.907-2.56l.269-1.691a.19.19 0 0 1 .206-.173h-.001h.285l.061-.001q.26 0 .511.035l-.019-.002c.155.028.29.098.396.198a.6.6 0 0 1 .191.444l-.001.038v-.002a1.02 1.02 0 0 1-.346.901l-.001.001a1.86 1.86 0 0 1-1.05.24h.006l-.505.016zm-17.979 0l.269-1.691a.19.19 0 0 1 .206-.173h-.001h.3a1.77 1.77 0 0 1 .927.186l-.01-.005q.284.183.19.766a.9.9 0 0 1-.408.726l-.003.002a3.3 3.3 0 0 1-1.484.188z" />
                </svg>
            </div>
            <div class="col-lg-9 col-md-8 col-12 footer-offers">
                <div class="swiper mySwiper7">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide d-flex justify-content-center">
                            <div class="d-flex justify-content-center align-items-center col-md-3 col-12 mb-4 mb-md-0">
                                <div class="icon-circle d-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2.4em" height="2.4em"
                                        viewBox="0 0 24 24">
                                        <path fill="#000"
                                            d="M5.5 7A1.5 1.5 0 0 1 4 5.5A1.5 1.5 0 0 1 5.5 4A1.5 1.5 0 0 1 7 5.5A1.5 1.5 0 0 1 5.5 7m15.91 4.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.11 0-2 .89-2 2v7c0 .55.22 1.05.59 1.41l8.99 9c.37.36.87.59 1.42.59s1.05-.23 1.41-.59l7-7c.37-.36.59-.86.59-1.41c0-.56-.23-1.06-.59-1.42" />
                                    </svg>
                                </div>
                                <h6 class="mb-0 ms-2 cards-in-footer text-md-nowrap">Daily Discount</h6>
                            </div>
                        </div>
                        <div class="swiper-slide d-flex justify-content-center">
                            <div class="d-flex justify-content-center align-items-center col-md-3 col-12 mb-4 mb-md-0">
                                <div class="icon-circle d-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2.4em" height="2.4em"
                                        viewBox="0 0 24 24">
                                        <path fill="#000"
                                            d="M20 6h-2.18c.11-.31.18-.65.18-1a2.996 2.996 0 0 0-5.5-1.65l-.5.67l-.5-.68C10.96 2.54 10.05 2 9 2C7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2m-5-2c.55 0 1 .45 1 1s-.45 1-1 1s-1-.45-1-1s.45-1 1-1M9 4c.55 0 1 .45 1 1s-.45 1-1 1s-1-.45-1-1s.45-1 1-1m11 15H4v-2h16zm0-5H4V8h5.08L7 10.83L8.62 12L12 7.4l3.38 4.6L17 10.83L14.92 8H20z" />
                                    </svg>
                                </div>
                                <h6 class="mb-0 ms-2 cards-in-footer text-md-nowrap">Send A Free Gift</h6>
                            </div>
                        </div>
                        <div class="swiper-slide d-flex justify-content-center">
                            <div class="d-flex justify-content-center align-items-center col-md-3 col-12 mb-4 mb-md-0">
                                <div class="icon-circle d-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2.4em" height="2.4em"
                                        viewBox="0 0 24 24">
                                        <path fill="#000"
                                            d="M20.72 14.621a.8.8 0 0 1-.19.35a.7.7 0 0 1-.33.21a.8.8 0 0 1-.4 0l-5.81-1.46l-.27 4.8l1.06.8a.22.22 0 0 1 .1.2v1.75a.27.27 0 0 1-.09.2a.3.3 0 0 1-.16 0h-.06l-2.57-.69l-2.56.69a.25.25 0 0 1-.31-.24v-1.75a.25.25 0 0 1 .1-.2l1.06-.8l-.27-4.8l-5.81 1.46a.73.73 0 0 1-.39 0a.75.75 0 0 1-.34-.21a.73.73 0 0 1-.18-.35a.65.65 0 0 1 0-.39l.52-1.55a.6.6 0 0 1 .15-.27a.8.8 0 0 1 .27-.18l5.75-2.47v-5.23a2 2 0 0 1 .58-1.41a2.06 2.06 0 0 1 2.83 0a2 2 0 0 1 .58 1.42v5.22l5.76 2.47a.74.74 0 0 1 .42.45l.52 1.54a.9.9 0 0 1 .04.44" />
                                    </svg>
                                </div>
                                <h6 class="mb-0 ms-2 cards-in-footer">Free Shipping</h6>
                            </div>
                        </div>
                        <div class="swiper-slide d-flex justify-content-center">
                            <div class="d-flex justify-content-center align-items-center col-md-3 col-12 mb-4 mb-md-0">
                                <div class="icon-circle d-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2.4em" height="2.4em"
                                        viewBox="0 0 24 24">
                                        <path fill="#000"
                                            d="M20.72 14.621a.8.8 0 0 1-.19.35a.7.7 0 0 1-.33.21a.8.8 0 0 1-.4 0l-5.81-1.46l-.27 4.8l1.06.8a.22.22 0 0 1 .1.2v1.75a.27.27 0 0 1-.09.2a.3.3 0 0 1-.16 0h-.06l-2.57-.69l-2.56.69a.25.25 0 0 1-.31-.24v-1.75a.25.25 0 0 1 .1-.2l1.06-.8l-.27-4.8l-5.81 1.46a.73.73 0 0 1-.39 0a.75.75 0 0 1-.34-.21a.73.73 0 0 1-.18-.35a.65.65 0 0 1 0-.39l.52-1.55a.6.6 0 0 1 .15-.27a.8.8 0 0 1 .27-.18l5.75-2.47v-5.23a2 2 0 0 1 .58-1.41a2.06 2.06 0 0 1 2.83 0a2 2 0 0 1 .58 1.42v5.22l5.76 2.47a.74.74 0 0 1 .42.45l.52 1.54a.9.9 0 0 1 .04.44" />
                                    </svg>
                                </div>
                                <h6 class="mb-0 ms-2 cards-in-footer text-md-nowrap">Free Shipping</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="py-4">Powered by BigCommerce© 2024 5d@Solutions</p>
    </div>
</footer>

<!-- <div>Footer</div> -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
<script src="{{ asset('assets_admin/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{asset('assets_user/customjs/common.js')}}"></script>
<script src="{{asset('assets_user/customjs/customjs.js')}}"></script>
<script src="{{ asset('assets_user/customjs/cart.js') }}"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    // var swiper = new Swiper(".mySwiper", {
    //     centeredSlides: true,
    //     effect: "fade",
    //     autoplay: {
    //         delay: 3000,
    //         disableOnInteraction: false,
    //     },
    //     navigation: {
    //         nextEl: ".swiper-button-next",
    //         prevEl: ".swiper-button-prev",
    //     },
    // });

    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
        },
    });
    var swiper = new Swiper(".mySwiper2", {
        slidesPerView: 1,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 50,
            },
        },
    });
    var swiper = new Swiper('.mySwiper3', {
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    var swiper = new Swiper('.mySwiper4', {
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    var swiper = new Swiper('.mySwiper5', {
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    var swiper = new Swiper('.mySwiper6', {
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    var swiper = new Swiper('.mySwiper7', {
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        slidesPerView: 2,
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    var swiper = new Swiper('.mySwiper8', {
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        slidesPerView: 1,
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        // navigation: {
        //     nextEl: ".swiper-button-next",
        //     prevEl: ".swiper-button-prev",
        // },
    });
    var swiper = new Swiper('.mySwiper10', {
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        slidesPerView: 1,
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        // navigation: {
        //     nextEl: ".swiper-button-next",
        //     prevEl: ".swiper-button-prev",
        // },
    });
</script>


<script>
    document.querySelectorAll('.thumbnail-img').forEach(img => {
        img.addEventListener('click', function() {
            // Get the source of the clicked thumbnail
            let newSrc = this.src;
            // Set the main image source to the clicked thumbnail source
            document.getElementById('mainImage').src = newSrc;
        });
    });
</script>

<script>
    function zoom(e) {
        var img = e.currentTarget.querySelector('img');
        var offsetX, offsetY;
        e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX;
        e.offsetY ? offsetY = e.offsetY : offsetY = e.touches[0].pageY;

        var x = offsetX / img.offsetWidth * 100;
        var y = offsetY / img.offsetHeight * 100;

        img.style.transformOrigin = x + '% ' + y + '%';
        img.style.transform = "scale(2)";
    }

    function resetZoom(e) {
        var img = e.currentTarget.querySelector('img');
        img.style.transform = "scale(1)";
        img.style.transformOrigin = "center center";
    }
</script>
<script src="{{ asset('assets_user/customjs/news_letters.js') }}"></script>