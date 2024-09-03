<div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
    {{-- Product Images --}}
    <div class="row">
        <div class="col-2 mb-3">
            <label for="file-input1" class="form-label fw-bold mb-2">Upload Product Images</label>
            <div onclick="document.getElementById('file-input1').click();" class="input-group position-relative border border-primary rounded shadow-sm overflow-hidden d-flex align-items-center justify-content-center"
                style="height: 50px; cursor: pointer;">
                <!-- Adjusted height to provide space for centering -->
                <input type="file" id="file-input1" class="form-control d-none" name="product_images" accept="image/*" single aria-describedby="file-input-label">
                <!-- SVG Icon acting as button -->
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-upload text-primary cursor-pointer" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H1v4a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-4h-4a.5.5 0 0 1 0-1h4.5a.5.5 0 0 1 .5.5V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V9.9z" />
                    <path d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V13.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 0 1-.708-.708l3-3z" />
                </svg>
            </div>
        </div>

        {{-- Images Preview --}}
        <div class="col-10 mt-4 d-flex align-items-center">
            <div class="white image-container-existed mx-2" id="image-container" data-page-name="products">

            </div>
            <div class="white image-container-selected mx-2" id="image-container" data-page-name="products">
                
            </div>
        </div>
    </div>

    {{-- Product Videos --}}
    <div class="row">
        <div class="col-12 mb-3">
            <label for="video-urls" class="form-label fw-bold mb-2">Add Video URL</label>
            <div id="video-url-container">
                <!-- Video URL Fields will be appended here -->
                <div class="input-group mb-2">
                    <input type="url" id="video_url" name="video_url" class="form-control" placeholder="Enter Youtube Video URL">
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <button type="button" id="saveProductAssetsBtn" class="btn theme-btn-outline btn-lg px-md-5">Save
            Media</button>
    </div>
</div>
