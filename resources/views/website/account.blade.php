@extends('layouts.website.website_master')

@push('css')

@endpush

@section('content')

<div class="container account py-5">
    <h3 class="main-headings position-relative text-start">
        Account Settings
        <div class="border-under-main-heading"></div>
    </h3>
    <div class="mt-5">
        <ul class="nav nav-tabs account-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link px-0 active" id="orders-tab" data-bs-toggle="tab"
                    data-bs-target="#orders-tab-pane" type="button" role="tab" aria-controls="orders-tab-pane"
                    aria-selected="true">
                    Order
                </button>
            </li>
            <li class="nav-item mx-md-3 mx-3" role="presentation">
                <button class="nav-link px-0" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages-tab-pane"
                    type="button" role="tab" aria-controls="messages-tab-pane" aria-selected="false">
                    Messages (0)
                </button>
            </li>
            <li class="nav-item mx-md-2 mx-2" role="presentation">
                <button class="nav-link px-0" id="address-tab" data-bs-toggle="tab" data-bs-target="#address-tab-pane"
                    type="button" role="tab" aria-controls="address-tab-pane" aria-selected="false">
                    Addresses
                </button>
            </li>
            <li class="nav-item mx-md-2 mx-2" role="presentation">
                <button class="nav-link px-0" id="wish-list-tab" data-bs-toggle="tab"
                    data-bs-target="#wish-list-tab-pane" type="button" role="tab" aria-controls="wish-list-tab-pane"
                    aria-selected="false">
                    Wish Lists (0)
                </button>
            </li>
            <li class="nav-item mx-md-2 mx-2" role="presentation">
                <button class="nav-link px-0" id="recently-viewed-tab" data-bs-toggle="tab"
                    data-bs-target="#recently-viewed-tab-pane" type="button" role="tab"
                    aria-controls="recently-viewed-tab-pane" aria-selected="false">
                    Recently Viewed
                </button>
            </li>
            <li class="nav-item mx-md-2 mx-2" role="presentation">
                <button class="nav-link px-0" id="account-settings-tab" data-bs-toggle="tab"
                    data-bs-target="#account-settings-tab-pane" type="button" role="tab"
                    aria-controls="account-settings-tab-pane" aria-selected="false">
                    Account Settings
                </button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade py-4 show active" id="orders-tab-pane" role="tabpanel"
                aria-labelledby="orders-tab" tabindex="0">
                <div class="row orders-div" id="orderDiv">

                    {{-- <div class="col-lg-6">
                        <div class="card mb-3 border-0 py-2">
                            <div class="col-12 d-flex justify-content-between">
                                <p class="mb-0"><b>Order: </b>&nbsp; 0-202-998</p>
                                <p class="mb-0"> 3 May 2023</p>
                            </div>
                            <div class="row align-items-center justify-content-between g-0">
                                <div class="col-3 d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="5.5em" height="5.5em"
                                        viewBox="0 0 256 193">
                                        <defs>
                                            <linearGradient id="logosParcelIcon0" x1="49.385%" x2="50.286%" y1="49.503%"
                                                y2="50.417%">
                                                <stop offset="0%" />
                                                <stop offset="100%" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon1" x1="50.147%" x2="49.946%" y1="49.935%"
                                                y2="50.142%">
                                                <stop offset="0%" />
                                                <stop offset="100%" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon2" x1="81.503%" x2="93.734%" y1="46.547%"
                                                y2="50.202%">
                                                <stop offset="0%" stop-color="#c37a44" />
                                                <stop offset="44.42%" stop-color="#bb713d" />
                                                <stop offset="64.06%" stop-color="#a05728" />
                                                <stop offset="100%" stop-color="#964e23" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon3" x1="63.475%" x2="41.388%" y1="61.32%"
                                                y2="43.414%">
                                                <stop offset="0%" stop-color="#e9b880" />
                                                <stop offset="100%" stop-color="#e4af76" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon4" x1="50.894%" x2="49.16%" y1="51.117%"
                                                y2="49.274%">
                                                <stop offset="0%" stop-color="#c37a45" stop-opacity="0" />
                                                <stop offset="13.34%" stop-color="#c37a45" />
                                                <stop offset="29.45%" stop-color="#d08d55" />
                                                <stop offset="50.21%" stop-color="#dea167" />
                                                <stop offset="69.66%" stop-color="#e8af73" />
                                                <stop offset="86.31%" stop-color="#ecb477" />
                                                <stop offset="100%" stop-color="#ecb477" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon5" x1="47.423%" x2="22.315%" y1="28.937%"
                                                y2="77.493%">
                                                <stop offset="8.81%" stop-color="#af6938" />
                                                <stop offset="48.29%" stop-color="#9a5227" />
                                                <stop offset="77.92%" stop-color="#8d4520" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon6" x1="41.147%" x2="56.579%" y1="57.288%"
                                                y2="44.95%">
                                                <stop offset="3.27%" stop-color="#e4af76" />
                                                <stop offset="100%" stop-color="#e9b880" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon7" x1="49.624%" x2="50.677%" y1="50.47%"
                                                y2="49.223%">
                                                <stop offset="0%" stop-color="#af6a38" stop-opacity="0" />
                                                <stop offset="8.6%" stop-color="#af6a38" />
                                                <stop offset="19.77%" stop-color="#b87542" />
                                                <stop offset="58.28%" stop-color="#d59c66" />
                                                <stop offset="77.71%" stop-color="#e4af76" />
                                                <stop offset="92.39%" stop-color="#e4af76" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon8" x1="8.211%" x2="93.243%" y1="50.006%"
                                                y2="50.006%">
                                                <stop offset="0%" stop-color="#743f1a" stop-opacity="0" />
                                                <stop offset="49.29%" stop-color="#743f1a" stop-opacity="0.887" />
                                                <stop offset="50%" stop-color="#743f1a" stop-opacity="0.9" />
                                                <stop offset="52.97%" stop-color="#743f1a" stop-opacity="0.847" />
                                                <stop offset="100%" stop-color="#743f1a" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon9" x1="49.901%" x2="49.998%" y1="50.091%"
                                                y2="49.994%">
                                                <stop offset="0%" stop-color="#322214" />
                                                <stop offset="23.97%" stop-color="#322314" stop-opacity="0.989" />
                                                <stop offset="100%" stop-color="#322214" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcona" x1="51.38%" x2="48.714%" y1="48.236%"
                                                y2="51.568%">
                                                <stop offset="4.76%" stop-color="#c69866" />
                                                <stop offset="41.56%" stop-color="#ba8c5e" />
                                                <stop offset="81.35%" stop-color="#b5875b" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIconb" x1="63.039%" x2="24.984%" y1="46.844%"
                                                y2="8.907%">
                                                <stop offset="0%" stop-color="#845f35" />
                                                <stop offset="43.11%" stop-color="#91673c" />
                                                <stop offset="44.07%" stop-color="#976a40" />
                                                <stop offset="87.37%" stop-color="#986b40" />
                                                <stop offset="100%" stop-color="#ab8157" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIconc" x1="49.999%" x2="50.108%" y1="50.004%"
                                                y2="50.114%">
                                                <stop offset="0%" stop-color="#322214" stop-opacity="0" />
                                                <stop offset="100%" stop-color="#322214" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcond" x1="45.656%" x2="50.475%" y1="62.623%"
                                                y2="33.538%">
                                                <stop offset="0%" stop-color="#a9794b" />
                                                <stop offset="38.57%" stop-color="#ae7f53" />
                                                <stop offset="45.57%" stop-color="#ac7d50" />
                                                <stop offset="62.36%" stop-color="#a9794b" />
                                                <stop offset="100%" stop-color="#b2875d" />
                                            </linearGradient>
                                        </defs>
                                        <path fill="url(#logosParcelIcon0)"
                                            d="m140.515 191.333l70.257-44.428c.26-.16.6-.09.76.17s.09.6-.17.76l-70.487 44.568c-.09.06-.19.09-.29.09z" />
                                        <path fill="url(#logosParcelIcon1)"
                                            d="M140.585 192.493c-.06 0-.13-.01-.19-.03l-95.787-35.699a.543.543 0 0 1-.32-.71c.11-.29.42-.43.71-.32l95.537 35.599z" />
                                        <path fill="#e8b67f"
                                            d="m241.1 21.81l-11.059 18.309l-44.428 18.89l-2.47 1.05l-39.929 37.338c-.77.77-1.29 1.87-1.38 2.48c-.04.21-.22.12-.39.11c-.18-.01-.43.06-.45-.16c-.02-.8-.11-1.69-1.4-2.49l-20.009-12.96l-14.59-9.46l-41.097-10.539l-34.4-8.82L7.71 21.71l.33-.38l.02-.03L89.857.04c.12-.04.14-.02.19.05l27.898 41.789l.55.82c.6.88.66 1.42.66 1.81h.51v-.09c0-.04 0-.09.01-.14c0-.03.01-.06.01-.1c.01-.04.01-.08.02-.12s.01-.08.02-.13c.03-.14.07-.3.11-.46c.01-.05.03-.1.04-.14c.05-.16.1-.33.16-.49c.03-.06.05-.13.08-.19c.08-.2.16-.38.25-.54c.08-.16.16-.29.24-.4l25.15-36.579c.06-.09.09-.13.22-.11l94.966 16.34z" />
                                        <path fill="url(#logosParcelIcon2)"
                                            d="M119.585 84.367h-.01l-14.579-9.449l-41.098-10.54l55.257-19.869l.15-.29v.29z" />
                                        <path fill="url(#logosParcelIcon3)"
                                            d="M119.155 44.509L63.898 64.368l-4.98-1.28l-29.42-7.55L7.71 21.69l.35-.41L89.857.02c.12-.04.14-.02.19.05l27.898 41.789l.55.82c.6.9.66 1.44.66 1.83" />
                                        <path fill="url(#logosParcelIcon4)"
                                            d="M119.35 46.619L67.102 65.398l-8.15-2.09l59.028-21.22l.55.82c.6.88.66 1.42.66 1.81h.15z" />
                                        <path fill="#d2a679" d="m30.249 55.738l-.74-.19L7.72 21.7l.33-.38z" />
                                        <path fill="url(#logosParcelIcon5)"
                                            d="m185.613 59.008l-2.47 1.05l-39.929 37.339c-.77.77-1.29 1.87-1.38 2.48c-.04.21-.22.12-.39.11c-.18-.01-.43.06-.45-.16c-.02-.8-.11-1.69-1.4-2.49l-20.009-12.97l-.27-39.848v-.29l.37.29z" />
                                        <path fill="url(#logosParcelIcon6)"
                                            d="m241.1 21.81l-11.059 18.309l-40.438 17.19l-3.98 1.69l-65.948-14.49c-.04-.51.31-1.67.69-2.41c.08-.16.16-.29.24-.4l25.15-36.579c.06-.09.09-.13.22-.11l94.966 16.34z" />
                                        <path fill="url(#logosParcelIcon7)"
                                            d="m189.603 57.308l-6.45 2.74l-.83.8l-63.018-13.93l.29-2.42h.08c-.04-.51.31-1.67.69-2.41z" />
                                        <path fill="url(#logosParcelIcon8)"
                                            d="M121.055 44.809v40.508l-1.47-.95h-.01l-1.93-1.26V45.049l1.51-.54h.51z"
                                            opacity="0.75" />
                                        <path fill="#bf9064"
                                            d="m140.195 191.843l-95.867-35.769c-.54-.23-.62-.74-.65-1.37c0 0-4.12-81.696-4.13-81.706c-.01-.21.25-.34.23-.47c-.07-.31-.66-1.48-.85-1.6L0 48.808l.33-.75l104.666 26.86l34.589 22.409c1.29.8 1.39 1.69 1.4 2.49c.01.22.27.15.45.16s.35.1.39-.11c.09-.61.61-1.71 1.38-2.47l39.928-37.339L255.54 29.28l.44.61l-39.088 34.349c-.76.76-1.11 1.69-.96 2.07l-4 80.067c-.06.51-.3.66-.81 1.01l-70.077 44.358c-.28.18-.58.23-.85.1" />
                                        <path fill="#bd8f63"
                                            d="m141.434 99.977l-.69 91.906a.83.83 0 0 1-.56-.04l-95.866-35.759c-.54-.23-.62-.75-.65-1.37l-4.13-81.706v-.02c0-.02 0-.04.01-.06c0-.02.01-.03.02-.04c.01-.02.02-.03.03-.05s.02-.03.03-.05c.04-.06.1-.12.12-.17c.01-.01.01-.02.01-.03v-.01l101.237 27.279c.04.18.28.11.44.12" />
                                        <path fill="url(#logosParcelIcon9)"
                                            d="M140.755 191.613v.26a.83.83 0 0 1-.56-.04l-95.867-35.759c-.38-.16-.53-.47-.6-.85z"
                                            opacity="0.54" />
                                        <path fill="#322214"
                                            d="m97.406 135.865l37.119 12.14l-.09 36.198l-36.429-13.38zm18.6 24.32l.09 16.769l17.978 6.604v-17.094zm5.311 5.417l3.633 5.782l3.559-3.118l.62.707l-3.673 3.217l3.681 5.858l-.533.335l-3.628-5.773l-3.541 3.104l-.62-.707l3.655-3.203l-3.686-5.867zm10.698 6.512v1.65l.95.31v1.86l-.95-.38v1.5l-2.08-3.16zm-3.2-2.01l.73.23v6.59l-.73-.26zm-30.679-16.13l.27 16.51l17.18 6.28l-.1-16.73zm26.86 19.68l1.88 3.03l-3.75-1.36zm2.899-2.78v4.3l-1.95-2.75zm-7.44-3.83l.72.24v6.58l-.72-.25zm1.62 1.77l1.86 2.87l-1.86 1.43zm-15.54-7.97l.71.23l.002.422c2.114.85 4.202 2.97 5.209 6.268c-.66-1.11-1.24-1.32-2.27-.97c-.38-.79-1.5-1.21-2.17-.79a1.93 1.93 0 0 0-.746-.776l.036 6.276c0 .58-.4 1.1-1.39.9c-.9-.22-1.27-.91-1.17-2.09l.5.08c0 .79.06 1.24.66 1.38c.51.12.74-.07.74-.54l-.066-6.225c-.284-.02-.547.05-.734.215c-.23-.58-1.32-1.36-2.14-.78c-.58-.92-1.67-1.27-2.28-.6c.779-2.355 2.894-3.18 5.113-2.585zm11.38 6.13l2.03 3.2l-2.01 1.67l.04-1.57l-.98-.23v-1.82l.92.34zm5.15.69l3.8 1.38l-1.9 1.67zm-7.09-25.2l.04 17.1l18.07 6.3v-17.47zm3.37 14.77l10.8 3.69v2.15l-10.8-3.72zm-9.338 4.069l.039.011c.07.07.07.82-.16.99a.41.41 0 0 1-.42-.05c-.14-.11-.22-.27-.16-.51s.66-.5.74-.43zm1-1.71l.039.011c.08.07.08.82-.16.99a.41.41 0 0 1-.42-.05c-.14-.11-.22-.27-.16-.51s.66-.5.74-.43zm-2.8-.07l.039.011c.08.07.08.82-.16.99a.41.41 0 0 1-.42-.05c-.14-.11-.22-.27-.16-.51s.66-.5.74-.43zm-2.83-.41l.039.011c.08.07.08.82-.16.99a.41.41 0 0 1-.42-.05c-.14-.11-.22-.27-.16-.51s.66-.5.74-.43zm22.308-11.228l2.62 5.17l-1.79-.61v7.49l-1.79-.62l.01-7.43l-1.78-.58zm-29.889-11.38l.31 16.87l17.39 5.98l-.15-17.09zm23.98 9.41l2.62 5.17l-1.79-.61v7.49l-1.79-.62l.02-7.43l-1.79-.58zm-20.09-6.02l1.42.47l.66 2.39l-.74-.05l2.11 5.1l-1.09-4.2l.62-.01l-.63-2.93l7.33 2.42v4.03c0 1.53-1.66 3.46-4 2.5l.01 4.05l3.36 2.16l-8.13-2.82l3.27.16l-.06-4.01c-2.32-.69-4-3.48-4-5.18z" />
                                        <path fill="url(#logosParcelIcona)"
                                            d="M141.434 99.977c-.4.01-.7.54-.71 1.02l-.09.04l-101.096-28.04c-.01-.19.21-.31.23-.43q.015-.015 0-.03c-.07-.31-.66-1.48-.85-1.6L0 48.81l.33-.75l104.656 26.849h.01l34.589 22.409c1.29.81 1.39 1.69 1.4 2.49c0 .01 0 .03.01.04c.04.19.28.12.44.13" />
                                        <path fill="#cd9c6b"
                                            d="M216.902 64.228c-.76.76-1.11 1.69-.96 2.07l-73.628 34.839l-.15-.12c-.01-.58-.38-.97-.66-1.03c.15.02.29.07.33-.12c.02-.12.05-.26.1-.41c.04-.13.1-.27.17-.42c.21-.48.53-1 .94-1.46c.06-.06.12-.13.18-.19l39.929-37.339L255.56 29.27l.44.61z" />
                                        <path fill="url(#logosParcelIconb)"
                                            d="M95.996 109.136c.11.03.15.04.15-.05l-.38-20.339c-.03-.69-.2-2.05-1.03-2.6L57.868 63.748l-17.28-4.46l37.469 22.39c.94.62 1.02 1.78 1.06 2.64l.54 19.778c0 .1.02.12.09.15z" />
                                        <path fill="#d4a271"
                                            d="M141.434 99.977c-.41.01-.71.57-.71 1.06c-.01.04-.08.03-.09 0c-.08-1.09-.53-2.31-1.12-2.74l-34.868-22.48l.34-.91h.01l34.589 22.41c1.29.81 1.39 1.69 1.4 2.49c0 .01 0 .03.01.04c.04.19.28.12.44.13" />
                                        <path fill="#deb37e" d="m104.986 74.918l-.34.9L0 48.809l.33-.74z" />
                                        <path fill="#dbad77"
                                            d="m215.952 66.298l-4 80.067c-.06.51-.3.66-.81 1.01l-70.077 44.358c-.1.07-.21.11-.31.14l.69-91.906c.18.01.35.1.39-.11c0-.03.01-.05.01-.08l74.087-33.57c0 .05.01.07.02.09" />
                                        <path fill="url(#logosParcelIconc)"
                                            d="M211.952 146.335v.04c-.06.51-.3.66-.81 1.01l-70.077 44.358c-.1.07-.21.11-.31.14v-.26z"
                                            opacity="0.54" />
                                        <path fill="#322214"
                                            d="m210.642 111.496l-1.6 32.599l-23.3 14.51l1.2-33.93zm-12.46 23.6l-11.58 6.809l-.55 16.05l11.53-7.17zm-5.53 6.889l-.02.54c1.383-.69 2.69-.21 3.24 2.08c-.38-.53-1.07-.32-1.53.76c-.21-.45-1.28-.08-1.44.86c-.085-.153-.238-.209-.414-.189l-.255 6.189c-.02.53-.05 1.1-.72 1.51c-.31.14-1.13.25-1.02-.9l.39-.3c-.03.73.16.95.56.71c.48-.29.39-.75.41-1.18l.215-5.864a1.4 1.4 0 0 0-.605.894c-.12-.36-1.28-.14-1.42.89c-.33-.44-1.23-.01-1.57 1.1c.626-2.883 2.178-5.276 3.723-6.306l.017-.474zm16.9-13.61l-11.04 6.53l-.61 15.73l10.92-6.87zm-3.41 5.3l.32.3l-2.406 5.458l1.986 2.742l-.32.68l-1.98-2.71l-2.38 5.4l-.33-.3l2.424-5.491l-2.054-2.809l.36-.68l2.01 2.775zm-6.72 6.27l1.25 1.52l-1.33 2.86v-1.26l-.56.34l.03-1.63l.56-.33zm2.16-1.98l-.26 6.03l-.45.3l.25-6.01zm2.11 3.15l1.07 1.41l-2.3 1.4zm-12.25.44c.05 0 .02.69-.15 1.03c-.06.12-.17.25-.26.26s-.13-.09-.08-.35s.44-.94.49-.94m10.64-2.77l1.06 1.31l-1.24 2.45zm-7.6 1.52c.04.01.01.7-.15 1.03c-.06.12-.17.25-.26.26s-.13-.09-.08-.35s.44-.94.49-.94m4.44-21.84l-11.7 6.56l-.61 16.37l11.61-6.84zm7.71 16.43l-.28 6.02l-.4.26l.27-6.01zm-13.25 4.96c.05 0 .02.69-.15 1.03c-.06.12-.17.25-.26.26s-.13-.09-.08-.35s.44-.94.49-.94m12.22-3.21l-.16 3.84l-1.04-1.24zm2.48-1.83l-.06 1.48l.58-.32l-.07 1.64l-.56.33l-.02 1.35l-1.21-1.45zm-12.83 3.06c.05 0 .02.69-.15 1.03c-.06.12-.17.25-.26.26s-.13-.09-.08-.35s.44-.94.49-.94m9.78-2.32l-1.24 2.84l-1.07-1.45zm-8.83-13.61l-.15 4.12c-.06 1.4-1.18 3.94-2.85 5l-.18 3.89l2.23-.48l-5.43 3.14l2.26-2.15l.12-3.82c-1.45.83-2.61-.71-2.54-2.27l.13-3.78l.98-.53l.32 1.82l-.53.43l1.17 3.39l-.45-3.09l.4-.46l-.31-2.43zm14.2-9.859l-11.2 6.26l-.7 16.09l11.1-6.64zm-2.92 13.87l-.14 1.91l-6.56 3.88l.09-1.93zm-4.64-8.25l1.45 3.06l-1.09.61l-.33 6.87l-1.04.6l.2-6.87l-1.05.63zm3.64-2.02l1.41 3.01l-1.16.65l-.24 6.82l-1.11.62l.35-6.87l-1.09.62z" />
                                        <path fill="#d7aa77"
                                            d="m183.733 60.838l-39.589 36.799c-1.12 1.07-1.86 2.67-1.83 3.5c-.02.04-.12.07-.16 0c.05-.64-.36-1.08-.66-1.15c.15.02.29.07.33-.12c.02-.12.05-.26.1-.41c.04-.13.1-.27.17-.42c.24-.54.63-1.16 1.11-1.64l39.929-37.339z" />
                                        <path fill="url(#logosParcelIcond)"
                                            d="M175.003 105.476c0 .11.05.16.12.13l11.89-6.1c.02-.01.03-.03.04-.07l.66-19.489c.02-1.07.62-2.13 1.44-2.86L228.64 41.6l-12.02 5.15l-39.688 35.958c-1.02 1-1.37 2.18-1.39 3.18z" />
                                        <path fill="#f8ce93"
                                            d="m183.733 60.838l72.257-30.959l-.44-.6l-72.407 30.769z" />
                                    </svg>

                                </div>
                                <div class="col-6 d-flex flex-column justify-content-between">
                                    <div class="card-body p-0">
                                        <div class="d-flex flex-column">
                                            <p class="fw-bold mb-0">Shipping Address: </p>
                                            <p class="mb-0">Bahria Phase 7</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mt-2 d-flex flex-column">
                                        <button type="button" class="btn btn-sm my-2 btn-success">Order
                                            Confirmed</button>
                                        <button type="button"
                                            class="btn btn-sm my-2 btn-secondary view-order-details">Order
                                            Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-3 border-0 py-2">
                            <div class="col-12 d-flex justify-content-between">
                                <p class="mb-0"><b>Order: </b>&nbsp; 0-202-998</p>
                                <p class="mb-0"> 3 May 2023</p>
                            </div>
                            <div class="row align-items-center justify-content-between g-0">
                                <div class="col-3 d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="5.5em" height="5.5em"
                                        viewBox="0 0 256 193">
                                        <defs>
                                            <linearGradient id="logosParcelIcon0" x1="49.385%" x2="50.286%" y1="49.503%"
                                                y2="50.417%">
                                                <stop offset="0%" />
                                                <stop offset="100%" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon1" x1="50.147%" x2="49.946%" y1="49.935%"
                                                y2="50.142%">
                                                <stop offset="0%" />
                                                <stop offset="100%" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon2" x1="81.503%" x2="93.734%" y1="46.547%"
                                                y2="50.202%">
                                                <stop offset="0%" stop-color="#c37a44" />
                                                <stop offset="44.42%" stop-color="#bb713d" />
                                                <stop offset="64.06%" stop-color="#a05728" />
                                                <stop offset="100%" stop-color="#964e23" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon3" x1="63.475%" x2="41.388%" y1="61.32%"
                                                y2="43.414%">
                                                <stop offset="0%" stop-color="#e9b880" />
                                                <stop offset="100%" stop-color="#e4af76" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon4" x1="50.894%" x2="49.16%" y1="51.117%"
                                                y2="49.274%">
                                                <stop offset="0%" stop-color="#c37a45" stop-opacity="0" />
                                                <stop offset="13.34%" stop-color="#c37a45" />
                                                <stop offset="29.45%" stop-color="#d08d55" />
                                                <stop offset="50.21%" stop-color="#dea167" />
                                                <stop offset="69.66%" stop-color="#e8af73" />
                                                <stop offset="86.31%" stop-color="#ecb477" />
                                                <stop offset="100%" stop-color="#ecb477" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon5" x1="47.423%" x2="22.315%" y1="28.937%"
                                                y2="77.493%">
                                                <stop offset="8.81%" stop-color="#af6938" />
                                                <stop offset="48.29%" stop-color="#9a5227" />
                                                <stop offset="77.92%" stop-color="#8d4520" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon6" x1="41.147%" x2="56.579%" y1="57.288%"
                                                y2="44.95%">
                                                <stop offset="3.27%" stop-color="#e4af76" />
                                                <stop offset="100%" stop-color="#e9b880" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon7" x1="49.624%" x2="50.677%" y1="50.47%"
                                                y2="49.223%">
                                                <stop offset="0%" stop-color="#af6a38" stop-opacity="0" />
                                                <stop offset="8.6%" stop-color="#af6a38" />
                                                <stop offset="19.77%" stop-color="#b87542" />
                                                <stop offset="58.28%" stop-color="#d59c66" />
                                                <stop offset="77.71%" stop-color="#e4af76" />
                                                <stop offset="92.39%" stop-color="#e4af76" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon8" x1="8.211%" x2="93.243%" y1="50.006%"
                                                y2="50.006%">
                                                <stop offset="0%" stop-color="#743f1a" stop-opacity="0" />
                                                <stop offset="49.29%" stop-color="#743f1a" stop-opacity="0.887" />
                                                <stop offset="50%" stop-color="#743f1a" stop-opacity="0.9" />
                                                <stop offset="52.97%" stop-color="#743f1a" stop-opacity="0.847" />
                                                <stop offset="100%" stop-color="#743f1a" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon9" x1="49.901%" x2="49.998%" y1="50.091%"
                                                y2="49.994%">
                                                <stop offset="0%" stop-color="#322214" />
                                                <stop offset="23.97%" stop-color="#322314" stop-opacity="0.989" />
                                                <stop offset="100%" stop-color="#322214" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcona" x1="51.38%" x2="48.714%" y1="48.236%"
                                                y2="51.568%">
                                                <stop offset="4.76%" stop-color="#c69866" />
                                                <stop offset="41.56%" stop-color="#ba8c5e" />
                                                <stop offset="81.35%" stop-color="#b5875b" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIconb" x1="63.039%" x2="24.984%" y1="46.844%"
                                                y2="8.907%">
                                                <stop offset="0%" stop-color="#845f35" />
                                                <stop offset="43.11%" stop-color="#91673c" />
                                                <stop offset="44.07%" stop-color="#976a40" />
                                                <stop offset="87.37%" stop-color="#986b40" />
                                                <stop offset="100%" stop-color="#ab8157" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIconc" x1="49.999%" x2="50.108%" y1="50.004%"
                                                y2="50.114%">
                                                <stop offset="0%" stop-color="#322214" stop-opacity="0" />
                                                <stop offset="100%" stop-color="#322214" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcond" x1="45.656%" x2="50.475%" y1="62.623%"
                                                y2="33.538%">
                                                <stop offset="0%" stop-color="#a9794b" />
                                                <stop offset="38.57%" stop-color="#ae7f53" />
                                                <stop offset="45.57%" stop-color="#ac7d50" />
                                                <stop offset="62.36%" stop-color="#a9794b" />
                                                <stop offset="100%" stop-color="#b2875d" />
                                            </linearGradient>
                                        </defs>
                                        <path fill="url(#logosParcelIcon0)"
                                            d="m140.515 191.333l70.257-44.428c.26-.16.6-.09.76.17s.09.6-.17.76l-70.487 44.568c-.09.06-.19.09-.29.09z" />
                                        <path fill="url(#logosParcelIcon1)"
                                            d="M140.585 192.493c-.06 0-.13-.01-.19-.03l-95.787-35.699a.543.543 0 0 1-.32-.71c.11-.29.42-.43.71-.32l95.537 35.599z" />
                                        <path fill="#e8b67f"
                                            d="m241.1 21.81l-11.059 18.309l-44.428 18.89l-2.47 1.05l-39.929 37.338c-.77.77-1.29 1.87-1.38 2.48c-.04.21-.22.12-.39.11c-.18-.01-.43.06-.45-.16c-.02-.8-.11-1.69-1.4-2.49l-20.009-12.96l-14.59-9.46l-41.097-10.539l-34.4-8.82L7.71 21.71l.33-.38l.02-.03L89.857.04c.12-.04.14-.02.19.05l27.898 41.789l.55.82c.6.88.66 1.42.66 1.81h.51v-.09c0-.04 0-.09.01-.14c0-.03.01-.06.01-.1c.01-.04.01-.08.02-.12s.01-.08.02-.13c.03-.14.07-.3.11-.46c.01-.05.03-.1.04-.14c.05-.16.1-.33.16-.49c.03-.06.05-.13.08-.19c.08-.2.16-.38.25-.54c.08-.16.16-.29.24-.4l25.15-36.579c.06-.09.09-.13.22-.11l94.966 16.34z" />
                                        <path fill="url(#logosParcelIcon2)"
                                            d="M119.585 84.367h-.01l-14.579-9.449l-41.098-10.54l55.257-19.869l.15-.29v.29z" />
                                        <path fill="url(#logosParcelIcon3)"
                                            d="M119.155 44.509L63.898 64.368l-4.98-1.28l-29.42-7.55L7.71 21.69l.35-.41L89.857.02c.12-.04.14-.02.19.05l27.898 41.789l.55.82c.6.9.66 1.44.66 1.83" />
                                        <path fill="url(#logosParcelIcon4)"
                                            d="M119.35 46.619L67.102 65.398l-8.15-2.09l59.028-21.22l.55.82c.6.88.66 1.42.66 1.81h.15z" />
                                        <path fill="#d2a679" d="m30.249 55.738l-.74-.19L7.72 21.7l.33-.38z" />
                                        <path fill="url(#logosParcelIcon5)"
                                            d="m185.613 59.008l-2.47 1.05l-39.929 37.339c-.77.77-1.29 1.87-1.38 2.48c-.04.21-.22.12-.39.11c-.18-.01-.43.06-.45-.16c-.02-.8-.11-1.69-1.4-2.49l-20.009-12.97l-.27-39.848v-.29l.37.29z" />
                                        <path fill="url(#logosParcelIcon6)"
                                            d="m241.1 21.81l-11.059 18.309l-40.438 17.19l-3.98 1.69l-65.948-14.49c-.04-.51.31-1.67.69-2.41c.08-.16.16-.29.24-.4l25.15-36.579c.06-.09.09-.13.22-.11l94.966 16.34z" />
                                        <path fill="url(#logosParcelIcon7)"
                                            d="m189.603 57.308l-6.45 2.74l-.83.8l-63.018-13.93l.29-2.42h.08c-.04-.51.31-1.67.69-2.41z" />
                                        <path fill="url(#logosParcelIcon8)"
                                            d="M121.055 44.809v40.508l-1.47-.95h-.01l-1.93-1.26V45.049l1.51-.54h.51z"
                                            opacity="0.75" />
                                        <path fill="#bf9064"
                                            d="m140.195 191.843l-95.867-35.769c-.54-.23-.62-.74-.65-1.37c0 0-4.12-81.696-4.13-81.706c-.01-.21.25-.34.23-.47c-.07-.31-.66-1.48-.85-1.6L0 48.808l.33-.75l104.666 26.86l34.589 22.409c1.29.8 1.39 1.69 1.4 2.49c.01.22.27.15.45.16s.35.1.39-.11c.09-.61.61-1.71 1.38-2.47l39.928-37.339L255.54 29.28l.44.61l-39.088 34.349c-.76.76-1.11 1.69-.96 2.07l-4 80.067c-.06.51-.3.66-.81 1.01l-70.077 44.358c-.28.18-.58.23-.85.1" />
                                        <path fill="#bd8f63"
                                            d="m141.434 99.977l-.69 91.906a.83.83 0 0 1-.56-.04l-95.866-35.759c-.54-.23-.62-.75-.65-1.37l-4.13-81.706v-.02c0-.02 0-.04.01-.06c0-.02.01-.03.02-.04c.01-.02.02-.03.03-.05s.02-.03.03-.05c.04-.06.1-.12.12-.17c.01-.01.01-.02.01-.03v-.01l101.237 27.279c.04.18.28.11.44.12" />
                                        <path fill="url(#logosParcelIcon9)"
                                            d="M140.755 191.613v.26a.83.83 0 0 1-.56-.04l-95.867-35.759c-.38-.16-.53-.47-.6-.85z"
                                            opacity="0.54" />
                                        <path fill="#322214"
                                            d="m97.406 135.865l37.119 12.14l-.09 36.198l-36.429-13.38zm18.6 24.32l.09 16.769l17.978 6.604v-17.094zm5.311 5.417l3.633 5.782l3.559-3.118l.62.707l-3.673 3.217l3.681 5.858l-.533.335l-3.628-5.773l-3.541 3.104l-.62-.707l3.655-3.203l-3.686-5.867zm10.698 6.512v1.65l.95.31v1.86l-.95-.38v1.5l-2.08-3.16zm-3.2-2.01l.73.23v6.59l-.73-.26zm-30.679-16.13l.27 16.51l17.18 6.28l-.1-16.73zm26.86 19.68l1.88 3.03l-3.75-1.36zm2.899-2.78v4.3l-1.95-2.75zm-7.44-3.83l.72.24v6.58l-.72-.25zm1.62 1.77l1.86 2.87l-1.86 1.43zm-15.54-7.97l.71.23l.002.422c2.114.85 4.202 2.97 5.209 6.268c-.66-1.11-1.24-1.32-2.27-.97c-.38-.79-1.5-1.21-2.17-.79a1.93 1.93 0 0 0-.746-.776l.036 6.276c0 .58-.4 1.1-1.39.9c-.9-.22-1.27-.91-1.17-2.09l.5.08c0 .79.06 1.24.66 1.38c.51.12.74-.07.74-.54l-.066-6.225c-.284-.02-.547.05-.734.215c-.23-.58-1.32-1.36-2.14-.78c-.58-.92-1.67-1.27-2.28-.6c.779-2.355 2.894-3.18 5.113-2.585zm11.38 6.13l2.03 3.2l-2.01 1.67l.04-1.57l-.98-.23v-1.82l.92.34zm5.15.69l3.8 1.38l-1.9 1.67zm-7.09-25.2l.04 17.1l18.07 6.3v-17.47zm3.37 14.77l10.8 3.69v2.15l-10.8-3.72zm-9.338 4.069l.039.011c.07.07.07.82-.16.99a.41.41 0 0 1-.42-.05c-.14-.11-.22-.27-.16-.51s.66-.5.74-.43zm1-1.71l.039.011c.08.07.08.82-.16.99a.41.41 0 0 1-.42-.05c-.14-.11-.22-.27-.16-.51s.66-.5.74-.43zm-2.8-.07l.039.011c.08.07.08.82-.16.99a.41.41 0 0 1-.42-.05c-.14-.11-.22-.27-.16-.51s.66-.5.74-.43zm-2.83-.41l.039.011c.08.07.08.82-.16.99a.41.41 0 0 1-.42-.05c-.14-.11-.22-.27-.16-.51s.66-.5.74-.43zm22.308-11.228l2.62 5.17l-1.79-.61v7.49l-1.79-.62l.01-7.43l-1.78-.58zm-29.889-11.38l.31 16.87l17.39 5.98l-.15-17.09zm23.98 9.41l2.62 5.17l-1.79-.61v7.49l-1.79-.62l.02-7.43l-1.79-.58zm-20.09-6.02l1.42.47l.66 2.39l-.74-.05l2.11 5.1l-1.09-4.2l.62-.01l-.63-2.93l7.33 2.42v4.03c0 1.53-1.66 3.46-4 2.5l.01 4.05l3.36 2.16l-8.13-2.82l3.27.16l-.06-4.01c-2.32-.69-4-3.48-4-5.18z" />
                                        <path fill="url(#logosParcelIcona)"
                                            d="M141.434 99.977c-.4.01-.7.54-.71 1.02l-.09.04l-101.096-28.04c-.01-.19.21-.31.23-.43q.015-.015 0-.03c-.07-.31-.66-1.48-.85-1.6L0 48.81l.33-.75l104.656 26.849h.01l34.589 22.409c1.29.81 1.39 1.69 1.4 2.49c0 .01 0 .03.01.04c.04.19.28.12.44.13" />
                                        <path fill="#cd9c6b"
                                            d="M216.902 64.228c-.76.76-1.11 1.69-.96 2.07l-73.628 34.839l-.15-.12c-.01-.58-.38-.97-.66-1.03c.15.02.29.07.33-.12c.02-.12.05-.26.1-.41c.04-.13.1-.27.17-.42c.21-.48.53-1 .94-1.46c.06-.06.12-.13.18-.19l39.929-37.339L255.56 29.27l.44.61z" />
                                        <path fill="url(#logosParcelIconb)"
                                            d="M95.996 109.136c.11.03.15.04.15-.05l-.38-20.339c-.03-.69-.2-2.05-1.03-2.6L57.868 63.748l-17.28-4.46l37.469 22.39c.94.62 1.02 1.78 1.06 2.64l.54 19.778c0 .1.02.12.09.15z" />
                                        <path fill="#d4a271"
                                            d="M141.434 99.977c-.41.01-.71.57-.71 1.06c-.01.04-.08.03-.09 0c-.08-1.09-.53-2.31-1.12-2.74l-34.868-22.48l.34-.91h.01l34.589 22.41c1.29.81 1.39 1.69 1.4 2.49c0 .01 0 .03.01.04c.04.19.28.12.44.13" />
                                        <path fill="#deb37e" d="m104.986 74.918l-.34.9L0 48.809l.33-.74z" />
                                        <path fill="#dbad77"
                                            d="m215.952 66.298l-4 80.067c-.06.51-.3.66-.81 1.01l-70.077 44.358c-.1.07-.21.11-.31.14l.69-91.906c.18.01.35.1.39-.11c0-.03.01-.05.01-.08l74.087-33.57c0 .05.01.07.02.09" />
                                        <path fill="url(#logosParcelIconc)"
                                            d="M211.952 146.335v.04c-.06.51-.3.66-.81 1.01l-70.077 44.358c-.1.07-.21.11-.31.14v-.26z"
                                            opacity="0.54" />
                                        <path fill="#322214"
                                            d="m210.642 111.496l-1.6 32.599l-23.3 14.51l1.2-33.93zm-12.46 23.6l-11.58 6.809l-.55 16.05l11.53-7.17zm-5.53 6.889l-.02.54c1.383-.69 2.69-.21 3.24 2.08c-.38-.53-1.07-.32-1.53.76c-.21-.45-1.28-.08-1.44.86c-.085-.153-.238-.209-.414-.189l-.255 6.189c-.02.53-.05 1.1-.72 1.51c-.31.14-1.13.25-1.02-.9l.39-.3c-.03.73.16.95.56.71c.48-.29.39-.75.41-1.18l.215-5.864a1.4 1.4 0 0 0-.605.894c-.12-.36-1.28-.14-1.42.89c-.33-.44-1.23-.01-1.57 1.1c.626-2.883 2.178-5.276 3.723-6.306l.017-.474zm16.9-13.61l-11.04 6.53l-.61 15.73l10.92-6.87zm-3.41 5.3l.32.3l-2.406 5.458l1.986 2.742l-.32.68l-1.98-2.71l-2.38 5.4l-.33-.3l2.424-5.491l-2.054-2.809l.36-.68l2.01 2.775zm-6.72 6.27l1.25 1.52l-1.33 2.86v-1.26l-.56.34l.03-1.63l.56-.33zm2.16-1.98l-.26 6.03l-.45.3l.25-6.01zm2.11 3.15l1.07 1.41l-2.3 1.4zm-12.25.44c.05 0 .02.69-.15 1.03c-.06.12-.17.25-.26.26s-.13-.09-.08-.35s.44-.94.49-.94m10.64-2.77l1.06 1.31l-1.24 2.45zm-7.6 1.52c.04.01.01.7-.15 1.03c-.06.12-.17.25-.26.26s-.13-.09-.08-.35s.44-.94.49-.94m4.44-21.84l-11.7 6.56l-.61 16.37l11.61-6.84zm7.71 16.43l-.28 6.02l-.4.26l.27-6.01zm-13.25 4.96c.05 0 .02.69-.15 1.03c-.06.12-.17.25-.26.26s-.13-.09-.08-.35s.44-.94.49-.94m12.22-3.21l-.16 3.84l-1.04-1.24zm2.48-1.83l-.06 1.48l.58-.32l-.07 1.64l-.56.33l-.02 1.35l-1.21-1.45zm-12.83 3.06c.05 0 .02.69-.15 1.03c-.06.12-.17.25-.26.26s-.13-.09-.08-.35s.44-.94.49-.94m9.78-2.32l-1.24 2.84l-1.07-1.45zm-8.83-13.61l-.15 4.12c-.06 1.4-1.18 3.94-2.85 5l-.18 3.89l2.23-.48l-5.43 3.14l2.26-2.15l.12-3.82c-1.45.83-2.61-.71-2.54-2.27l.13-3.78l.98-.53l.32 1.82l-.53.43l1.17 3.39l-.45-3.09l.4-.46l-.31-2.43zm14.2-9.859l-11.2 6.26l-.7 16.09l11.1-6.64zm-2.92 13.87l-.14 1.91l-6.56 3.88l.09-1.93zm-4.64-8.25l1.45 3.06l-1.09.61l-.33 6.87l-1.04.6l.2-6.87l-1.05.63zm3.64-2.02l1.41 3.01l-1.16.65l-.24 6.82l-1.11.62l.35-6.87l-1.09.62z" />
                                        <path fill="#d7aa77"
                                            d="m183.733 60.838l-39.589 36.799c-1.12 1.07-1.86 2.67-1.83 3.5c-.02.04-.12.07-.16 0c.05-.64-.36-1.08-.66-1.15c.15.02.29.07.33-.12c.02-.12.05-.26.1-.41c.04-.13.1-.27.17-.42c.24-.54.63-1.16 1.11-1.64l39.929-37.339z" />
                                        <path fill="url(#logosParcelIcond)"
                                            d="M175.003 105.476c0 .11.05.16.12.13l11.89-6.1c.02-.01.03-.03.04-.07l.66-19.489c.02-1.07.62-2.13 1.44-2.86L228.64 41.6l-12.02 5.15l-39.688 35.958c-1.02 1-1.37 2.18-1.39 3.18z" />
                                        <path fill="#f8ce93"
                                            d="m183.733 60.838l72.257-30.959l-.44-.6l-72.407 30.769z" />
                                    </svg>

                                </div>
                                <div class="col-6 d-flex flex-column justify-content-between">
                                    <div class="card-body p-0">
                                        <div class="d-flex flex-column">
                                            <p class="fw-bold mb-0">Shipping Address: </p>
                                            <p class="mb-0">Bahria Phase 7</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mt-2 d-flex flex-column">
                                        <button type="button" class="btn btn-sm my-2 btn-success">Order
                                            Confirmed</button>
                                        <button type="button"
                                            class="btn btn-sm my-2 btn-secondary view-order-details">Order
                                            Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
                <div class="order-detail-div d-none">
                    <div class="back-to-orders-div" style="cursor:pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 512 512">
                            <path fill="#000"
                                d="M48 256c0 114.87 93.13 208 208 208s208-93.13 208-208S370.87 48 256 48S48 141.13 48 256m212.65-91.36a16 16 0 0 1 .09 22.63L208.42 240H342a16 16 0 0 1 0 32H208.42l52.32 52.73A16 16 0 1 1 238 347.27l-79.39-80a16 16 0 0 1 0-22.54l79.39-80a16 16 0 0 1 22.65-.09">
                            </path>
                        </svg>
                    </div>
                    <div class="md-stepper-horizontal orange">

                        <div class="row" id="statusContainer">

                        </div>

                    </div>

                    <div id="refund-btn-container">

                    </div>
                    <div class="your-cart container">
                        <div class="table-responsive add-to-cart">
                            <table class="w-100">
                                <thead class="py-3">
                                    <tr>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="product-detail-table-body">
                                    {{-- dynamically injected here --}}
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex text-start gap-5 justify-content-end py-4">
                            <small class="fw-bold">
                                Total amount:
                            </small>

                            <small>
                                $
                                <span id="subTotal">

                                </span>
                            </small>
                        </div>
                    </div>
                </div>
                <p class="mb-0 d-flex align-items-center bg-secondary p-3 text-white rounded-2">
                    <svg class="me-2 d-md-block d-none" xmlns="http://www.w3.org/2000/svg" width="1.05em"
                        height="1.05em" viewBox="0 0 20 20">
                        <path fill="#fff"
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93A10 10 0 0 1 2.93 17.07M9 5v6h2V5zm0 8v2h2v-2z" />
                    </svg>
                    Once you place an order you'll have full access to send messages from this page.
                </p>
            </div>


            <div class="tab-pane fade py-4" id="messages-tab-pane" role="tabpanel" aria-labelledby="messages-tab"
                tabindex="0">
                <div class="row main-messages">
                    <div class="col-md-3 col-sm-4">
                        <div class="mail-categories">
                            <div class="mail-menu m-0 p-0">
                                <div class="mail-menu-item mail-categories" data-bs-toggle="collapse"
                                    href="#collapseExample22" role="button" aria-expanded="false"
                                    aria-controls="collapseExample22">
                                    <span class="mail-text">Status</span>
                                    <span class="mail-icon">▾</span>
                                </div>
                                <div class="collapse show" id="collapseExample22">
                                    <div class="mail-menu-item mail-sub-categories">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1">
                                        </div>
                                        <span class="mail-text">Complete</span>
                                    </div>
                                    <div class="mail-menu-item mail-sub-categories">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2">
                                        </div>
                                        <span class="mail-text">Incomplete</span>
                                    </div>
                                    <div class="mail-menu-item mail-sub-categories">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault3">
                                        </div>
                                        <span class="mail-text">In Pocess</span>
                                    </div>
                                    <div class="mail-menu-item mail-sub-categories">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault4">
                                        </div>
                                        <span class="mail-text">Assigned</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-8">
                        <div
                            class="px-4 px-lg-6 bg-white border-top border-bottom border-translucent position-relative top-1">
                            <div class="list-group mt-3">
                                <div class="list-item view-ticket">
                                    <input type="checkbox" class="form-check-input me-3">
                                    <span class="star">★</span>
                                    <div class="list-item-content">
                                        Lux Foods Inc., A wide variety of spices are organized in glass jars - Dolores
                                        ipsum dolor sit amet consectetur adipisicing elit. Cumque, est.
                                    </div>
                                    <div class="timestamp">
                                        09:15 am
                                    </div>
                                </div>

                                <div class="list-item view-ticket">
                                    <input type="checkbox" class="form-check-input me-3">
                                    <span class="star">★</span>
                                    <div class="list-item-content">
                                        Tech Innovations, The latest gadgets are displayed in the showroom - Ipsum dolor
                                        sit amet consectetur adipisicing elit. Cumque, est.
                                    </div>
                                    <div class="timestamp">
                                        02:30 pm
                                    </div>
                                </div>

                                <div class="list-item view-ticket">
                                    <input type="checkbox" class="form-check-input me-3">
                                    <span class="star">★</span>
                                    <div class="list-item-content">
                                        EcoGreen Solutions, Various plant samples are laid out for analysis - Sit amet
                                        consectetur adipisicing elit. Cumque, est.
                                    </div>
                                    <div class="timestamp">
                                        08:45 am
                                    </div>
                                </div>

                                <div class="list-item view-ticket">
                                    <input type="checkbox" class="form-check-input me-3">
                                    <span class="star">★</span>
                                    <div class="list-item-content">
                                        Horizon Enterprises, A series of architectural blueprints are scattered on the
                                        desk - Adipisicing elit. Cumque, est.
                                    </div>
                                    <div class="timestamp">
                                        01:20 pm
                                    </div>
                                </div>

                                <div class="list-item view-ticket">
                                    <input type="checkbox" class="form-check-input me-3">
                                    <span class="star">★</span>
                                    <div class="list-item-content">
                                        Global Travels, Colorful travel brochures are displayed on the rack -
                                        Consectetur adipisicing elit. Cumque, est.
                                    </div>
                                    <div class="timestamp">
                                        04:10 pm
                                    </div>
                                </div>

                            </div>
                            <div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
                                <div class="col-auto d-flex">
                                    <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body"
                                        data-list-info="data-list-info">
                                        1 to 10
                                        <span class="text-body-tertiary"> Items of</span>
                                        16
                                    </p>
                                    <a class="fw-semibold" href="#!" data-list-view="*">View all<svg
                                            class="svg-inline--fa fa-angle-right " width="1.4rem" height="1.4em"
                                            data-fa-transform="down-1" aria-hidden="true" focusable="false"
                                            data-prefix="fas" data-icon="angle-right" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""
                                            style="transform-origin: 0.3125em 0.5625em;">
                                            <g transform="translate(160 256)">
                                                <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)">
                                                    <path fill="currentColor"
                                                        d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"
                                                        transform="translate(-160 -256)"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                    <a class="fw-semibold d-none" href="#!" data-list-view="less">View Less<svg
                                            class="svg-inline--fa fa-angle-right ms-1" data-fa-transform="down-1"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 320 512" data-fa-i2svg=""
                                            style="transform-origin: 0.3125em 0.5625em;">
                                            <g transform="translate(160 256)">
                                                <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)">
                                                    <path fill="currentColor"
                                                        d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"
                                                        transform="translate(-160 -256)"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                                <div class="col-auto d-flex table-bottom mb-2">
                                    <button class="page-link disabled" data-list-pagination="prev" disabled=""><svg
                                            class="svg-inline--fa fa-chevron-left" aria-hidden="true" focusable="false"
                                            data-prefix="fas" data-icon="chevron-left" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z">
                                            </path>
                                        </svg>
                                    </button>
                                    <ul class="mb-0 pagination px-2">
                                        <li class="active px-1">
                                            <button class="page" type="button" data-i="1" data-page="10">1</button>
                                        </li>
                                        <li class="px-1">
                                            <button class="page" type="button" data-i="2" data-page="10">2</button>
                                        </li>
                                    </ul>
                                    <button class="page-link pe-0" data-list-pagination="next">
                                        <svg class="svg-inline--fa fa-chevron-right" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="chevron-right" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ticket-detail d-none">
                    <div class="d-flex align-items-center mb-4">
                        <div class="back-to-ticket-list" style="cursor:pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 512 512">
                                <path fill="#000"
                                    d="M48 256c0 114.87 93.13 208 208 208s208-93.13 208-208S370.87 48 256 48S48 141.13 48 256m212.65-91.36a16 16 0 0 1 .09 22.63L208.42 240H342a16 16 0 0 1 0 32H208.42l52.32 52.73A16 16 0 1 1 238 347.27l-79.39-80a16 16 0 0 1 0-22.54l79.39-80a16 16 0 0 1 22.65-.09" />
                            </svg>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="mail-categories my-2">
                            <div class="mail-menu m-0 p-0">
                                <div class="mail-menu-item mail-categories" data-bs-toggle="collapse"
                                    href="#collapseExample22" role="button" aria-expanded="false"
                                    aria-controls="collapseExample22">
                                    <span class="mail-text">Status</span>
                                    <span class="mail-icon">▾</span>
                                </div>
                                <div class="collapse show" id="collapseExample22">
                                    <div class="mail-menu-item mail-sub-categories">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1">
                                        </div>
                                        <span class="mail-text">Complete</span>
                                    </div>
                                    <div class="mail-menu-item mail-sub-categories">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2">
                                        </div>
                                        <span class="mail-text">Incomplete</span>
                                    </div>
                                    <div class="mail-menu-item mail-sub-categories">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault3">
                                        </div>
                                        <span class="mail-text">In Process</span>
                                    </div>
                                    <div class="mail-menu-item mail-sub-categories">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault4">
                                        </div>
                                        <span class="mail-text">Assigned</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-8">

                        <div class="d-flex align-items-start justify-content-between profile-area mt-2">
                            <div class="d-flex mail-profile-detail">
                                <img src="https://prium.github.io/phoenix/v1.18.0/assets/img/team/60.webp" alt="">
                                <div class="ms-2">
                                    <h6>Ingredia Nutrisha</h6>
                                    <p><small>20 May 2020</small></p>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-end">
                                <button type="button" class="btn ticketno mx-2">
                                    <small>
                                        Mark Incomplete
                                    </small> </button>
                                <button type="button" class="btn ticketno mx-2">
                                    <small>
                                        Mark Process
                                    </small> </button>
                            </div>
                        </div>
                        <div class="mail-structure">
                            <div class="d-flex align-items-center justify-content-between">
                                <p>
                                    <b>A collection of textile samples lay spread</b>
                                </p>
                                <p class="mx-2">07:23 AM</p>
                            </div>
                            <p>To: Me, info@example.com</p><br>
                            <p><b>Hi,Ingredia,</b></p>
                            <br>
                            <p>
                                <b>Ingredia Nutrisha,</b> A collection of textile samples lay spread out on the table -
                                Samsa was a travelling salesman - and above it there hung a picture
                            </p>
                            <p class="pt-2">
                                Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic life One day however a small line of blind text by the name of Lorem
                                Ipsum decided to leave for the far World of Grammar. Aenean vulputate eleifend tellus.
                                Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                                dapibus in, viverra quis, feugiat a, tellus.
                            </p>
                            <p class="pt-2">
                                Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae,
                                eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
                                Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam
                                ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam
                                rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit
                                amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,
                                <br><br>
                                <b>Kind Regards</b>
                            </p>
                            <p class="pt-2">Mr Smith</p>
                            <p></p>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between">
                                <p>
                                    <b>A collection of textile samples lay spread</b>
                                </p>
                                <p class="mx-2">07:23 AM</p>
                            </div>
                            <p>To: Me, info@example.com</p><br>
                            <p><b>Hi,Ingredia,</b></p>
                            <br>
                            <p>
                                <b>Ingredia Nutrisha,</b> A collection of textile samples lay spread out on the table -
                                Samsa was a travelling salesman - and above it there hung a picture
                            </p>
                            <p class="pt-2">
                                Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic life One day however a small line of blind text by the name of Lorem
                                Ipsum decided to leave for the far World of Grammar. Aenean vulputate eleifend tellus.
                                Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                                dapibus in, viverra quis, feugiat a, tellus.
                            </p>
                            <p class="pt-2">
                                Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae,
                                eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
                                Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam
                                ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam
                                rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit
                                amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,
                                <br><br>
                                <b>Kind Regards</b>
                            </p>
                            <p class="pt-2">Mr Smith</p>
                            <p></p>
                        </div>
                        <hr>
                        <h5 class="my-4">Reply</h5>
                        <div class="form_blk">
                            <textarea name="" id="" class="text_box p-3 rounded"
                                placeholder="eg: Details about your dealership brand &amp; service"></textarea>
                        </div>

                        <div class="attachments mt-3">
                            <div class="d-flex align-items-center mb-2">
                                <h5 class="mb-0">Attachments (3)</h5>
                                <svg style="cursor:pointer" class="advance-plus-icon ms-3"
                                    xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                                    viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M188 184a16 16 0 1 1 16-16a16 16 0 0 1-16 16m36-68h-44a12 12 0 0 0 0 24h40v56H36v-56h40a12 12 0 0 0 0-24H32a20 20 0 0 0-20 20v64a20 20 0 0 0 20 20h192a20 20 0 0 0 20-20v-64a20 20 0 0 0-20-20M88.49 80.49L116 53v75a12 12 0 0 0 24 0V53l27.51 27.52a12 12 0 1 0 17-17l-48-48a12 12 0 0 0-17 0l-48 48a12 12 0 1 0 17 17Z">
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
                </div>

                <p class="mb-0 d-flex align-items-center bg-secondary p-3 text-white rounded-2">
                    <svg class="me-2 d-md-block d-none" xmlns="http://www.w3.org/2000/svg" width="1.05em"
                        height="1.05em" viewBox="0 0 20 20">
                        <path fill="#fff"
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93A10 10 0 0 1 2.93 17.07M9 5v6h2V5zm0 8v2h2v-2z" />
                    </svg>
                    You haven't placed any orders with us. When you do, their status will appear on this page.
                </p>
            </div>
            <div class="tab-pane fade py-4" id="address-tab-pane" role="tabpanel" aria-labelledby="address-tab"
                tabindex="0">
                <div class="row justify-content-md-start justify-content-center" id="address_container">
                    <!-- Address List Section -->
                    {{-- will be injected here dynamically --}}

                    <!-- New Address Button Section -->
                    <div type="button" data-bs-toggle="modal" data-bs-target="#addressAddModal"
                        class="col-md-3 col-11 d-flex align-items-center justify-content-center border rounded-2 m-3">
                        <div class="p-5 text-center" id="newAddress">
                            <div class="h1">+</div>
                            <div>New Address</div>
                        </div>
                    </div>

                    {{-- add addres --}}
                    <!-- Modal -->
                    <div class="modal fade" id="addressAddModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="addressAddModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Address</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="customerAddressForm">
                                        <!-- Full Name -->
                                        <input type="hidden" name="" id="edit_id" name="edit_id">
                                        <div class="mb-3">
                                            <label for="fullName" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="fullName" name="fullName"
                                                placeholder="Enter full name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                placeholder="Enter full name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phoneNumber" class="form-label">Phone Number</label>
                                            <input type="number" class="form-control" id="phoneNumber"
                                                name="phoneNumber" placeholder="Enter phone number" required>
                                        </div>


                                        <!-- Address Line 1 -->
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea type="text" class="form-control" id="address" name="address"
                                                placeholder="Enter street address" required></textarea>
                                        </div>

                                        <!-- Country Dropdown -->
                                        <div class="mb-3">
                                            <label for="country" class="form-label">Country</label>
                                            <select class="form-select" id="country" name="country" required>
                                                <option value="" selected>Select country</option>

                                                <!-- Add more countries or populate dynamically -->
                                            </select>
                                        </div>

                                        <!-- State/Province/Region Dropdown -->
                                        <div class="mb-3">
                                            <label for="state" class="form-label">State/Province/Region</label>
                                            <select class="form-select" id="state" name="state" required>
                                                <option value="" selected>Select state</option>

                                            </select>
                                        </div>

                                        <!-- City Dropdown -->
                                        <div class="mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <select class="form-select" id="city" name="city" required>
                                                <option value="" selected>Select city</option>

                                            </select>
                                        </div>

                                        <!-- Postal Code -->
                                        <div class="mb-3">
                                            <label for="postalCode" class="form-label">Postal Code</label>
                                            <input type="text" class="form-control" id="postalCode" name="postalCode"
                                                placeholder="Enter postal code" required>
                                        </div>
                                    </form>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="addAddressBtn">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade py-4" id="wish-list-tab-pane" role="tabpanel" aria-labelledby="wish-list-tab"
                tabindex="0">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-nowrap" scope="col">Product ID</th>
                                <th class="text-nowrap" scope="col">Product Name</th>
                                <th class="text-nowrap" scope="col">Category</th>
                                <th class="text-nowrap" scope="col">Price</th>
                                <th class="text-nowrap" scope="col">Added Date</th>
                                <th class="text-nowrap" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example row -->
                            <tr>
                                <td class="text-nowrap">101</td>
                                <td class="text-nowrap">Wireless Headphones</td>
                                <td class="text-nowrap">Electronics</td>
                                <td class="text-nowrap">$99</td>
                                <td class="text-nowrap">2024-08-13</td>
                                <td class="text-nowrap">
                                    <button class="btn btn-primary btn-sm">Add to Cart</button>
                                    <button class="btn btn-danger btn-sm">Remove</button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
                <h3 class="text-center" >Wish List</h3>
                <div class="row mt-3" id="wishListContainer">

                    {{-- <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                        <div class="card featured-card border-0">
                            <p class="sale-badge text-black">Sale</p>
                            <div class="actions">
                                <button class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 256 256">
                                        <path fill="#000"
                                            d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11">
                                        </path>
                                    </svg>
                                </button>
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="#000"
                                            d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="d-flex justify-content-center my-4">
                                <div class="featured-card-imagess">
                                    <a href="product_detail">
                                        <img src="http://127.0.0.1:8000/assets/images/category-img.png"
                                            alt="Card image">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="rating border-bottom pb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC
                                        HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                                <div class="price-and-btn">
                                    <div class="d-flex justify-content-center card-price">
                                        <h5>$12.99</h5>
                                        <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                                    </div>
                                    <button class="btn btn-add-to-cart">
                                        <span class="me-2">+</span>
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
                <p class="mb-0 d-flex align-items-center bg-secondary p-3 text-white rounded-2 mt-5">
                    <svg class="me-2 d-md-block d-none" xmlns="http://www.w3.org/2000/svg" width="1.05em"
                        height="1.05em" viewBox="0 0 20 20">
                        <path fill="#fff"
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93A10 10 0 0 1 2.93 17.07M9 5v6h2V5zm0 8v2h2v-2z" />
                    </svg>
                    You haven't placed any orders with us. When you do, their status will appear on this page.
                </p>
            </div>
            <div class="tab-pane fade py-4" id="recently-viewed-tab-pane" role="tabpanel"
                aria-labelledby="recently-viewed-tab" tabindex="0">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                        <div class="card featured-card border-0">
                            <p class="sale-badge text-black">Sale</p>
                            <div class="actions">
                                <button class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 256 256">
                                        <path fill="#000"
                                            d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11">
                                        </path>
                                    </svg>
                                </button>
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="#000"
                                            d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="d-flex justify-content-center my-4">
                                <div class="featured-card-imagess">
                                    <a href="product_detail">
                                        <img src="http://127.0.0.1:8000/assets/images/category-img.png"
                                            alt="Card image">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="rating border-bottom pb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC
                                        HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                                <div class="price-and-btn">
                                    <div class="d-flex justify-content-center card-price">
                                        <h5>$12.99</h5>
                                        <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                                    </div>
                                    <button class="btn btn-add-to-cart">
                                        <span class="me-2">+</span>
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                        <div class="card featured-card border-0">
                            <p class="sale-badge text-black">Sale</p>
                            <div class="actions">
                                <button class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 256 256">
                                        <path fill="#000"
                                            d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11">
                                        </path>
                                    </svg>
                                </button>
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="#000"
                                            d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="d-flex justify-content-center my-4">
                                <div class="featured-card-imagess">
                                    <a href="product_detail">
                                        <img src="http://127.0.0.1:8000/assets/images/category-img.png"
                                            alt="Card image">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="rating border-bottom pb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC
                                        HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                                <div class="price-and-btn">
                                    <div class="d-flex justify-content-center card-price">
                                        <h5>$12.99</h5>
                                        <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                                    </div>
                                    <button class="btn btn-add-to-cart">
                                        <span class="me-2">+</span>
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                        <div class="card featured-card border-0">
                            <p class="sale-badge text-black">Sale</p>
                            <div class="actions">
                                <button class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 256 256">
                                        <path fill="#000"
                                            d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11">
                                        </path>
                                    </svg>
                                </button>
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="#000"
                                            d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="d-flex justify-content-center my-4">
                                <div class="featured-card-imagess">
                                    <a href="product_detail">
                                        <img src="http://127.0.0.1:8000/assets/images/category-img.png"
                                            alt="Card image">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="rating border-bottom pb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC
                                        HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                                <div class="price-and-btn">
                                    <div class="d-flex justify-content-center card-price">
                                        <h5>$12.99</h5>
                                        <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                                    </div>
                                    <button class="btn btn-add-to-cart">
                                        <span class="me-2">+</span>
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                        <div class="card featured-card border-0">
                            <p class="sale-badge text-black">Sale</p>
                            <div class="actions">
                                <button class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 256 256">
                                        <path fill="#000"
                                            d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11">
                                        </path>
                                    </svg>
                                </button>
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="#000"
                                            d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="d-flex justify-content-center my-4">
                                <div class="featured-card-imagess">
                                    <a href="product_detail">
                                        <img src="http://127.0.0.1:8000/assets/images/category-img.png"
                                            alt="Card image">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="rating border-bottom pb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC
                                        HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                                <div class="price-and-btn">
                                    <div class="d-flex justify-content-center card-price">
                                        <h5>$12.99</h5>
                                        <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                                    </div>
                                    <button class="btn btn-add-to-cart">
                                        <span class="me-2">+</span>
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                        <div class="card featured-card border-0">
                            <p class="sale-badge text-black">Sale</p>
                            <div class="actions">
                                <button class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 256 256">
                                        <path fill="#000"
                                            d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11">
                                        </path>
                                    </svg>
                                </button>
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="#000"
                                            d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="d-flex justify-content-center my-4">
                                <div class="featured-card-imagess">
                                    <a href="product_detail">
                                        <img src="http://127.0.0.1:8000/assets/images/category-img.png"
                                            alt="Card image">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="rating border-bottom pb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC
                                        HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                                <div class="price-and-btn">
                                    <div class="d-flex justify-content-center card-price">
                                        <h5>$12.99</h5>
                                        <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                                    </div>
                                    <button class="btn btn-add-to-cart">
                                        <span class="me-2">+</span>
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade py-4" id="account-settings-tab-pane" role="tabpanel"
                aria-labelledby="account-settings-tab" tabindex="0">


                {{-- ____________settings_form___________ --}}

                <form id="userSettingsForm" name="userSettingsForm">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="firstName" name="firstName"
                                    placeholder="First Name" required value=" {{$user->first_name }}">
                                <label for="firstName">First Name <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="lastName" name="lastName"
                                    placeholder="Last Name" required
                                    value="{{ old('lastName', $user->last_name ?? '') }}">
                                <label for="lastName">Last Name <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="company" name="company"
                                    placeholder="Company" value="{{ old('company', $user->company_name ?? '') }}">
                                <label for="company">Company</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                                    placeholder="Phone Number" value="{{ old('phoneNumber', $user->phone ?? '') }}">
                                <label for="phoneNumber">Phone Number</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="emailAddress" name="emailAddress"
                                    placeholder="Email Address" required
                                    value="{{ old('emailAddress', $user->email ?? '') }}">
                                <label for="emailAddress">Email Address <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                    placeholder="Confirm Password">
                                <label for="confirmPassword">Confirm Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="currentPassword" name="currentPassword"
                                    placeholder="Current Password">
                                <label for="currentPassword">Current Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button type="button" class="btn btn-add-to-cart py-2" id="updateDetailBtn">Update
                            Details</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>




@endsection
@push('scripts')
<script src="{{asset('assets_user/customjs/account.js') }}"></script>

@endpush
