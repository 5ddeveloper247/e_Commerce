//  ____________________SideBar________________________

//  icon rotate
$(document).ready(function () {
    $(".main-links-for-submenu").on("click", function () {
        $(this)
            .find(".dropdown-indicator-icon-wrapper")
            .toggleClass("rotate-90");
    });

    $(".nav-link").on("click", function () {
        $(".nav-link-text").css("color", "");

        $(this).find(".nav-link-text").css("color", "#3874ff");
    });




});

//  sidebar collapse logics
document.getElementById("toggleSidebar").addEventListener("click", function () {
    const sidebar = document.querySelector(".sidebar");
    const collapseButton = document.querySelector(".sidebar-collapse-button");
    const forwardIcon = document.querySelector(".sidebar-forward-icon");
    const sidebarFooter = document.querySelector(".sidebar-footer");
    const contentSidebarCollapse = document.querySelector(
        ".sidebar-inner-content"
    );

    sidebar.classList.toggle("collapsed");

    if (sidebar.classList.contains("collapsed")) {
        collapseButton.style.display = "none";
        forwardIcon.style.display = "block";
        sidebarFooter.style.width = "80px";
        sidebarFooter.style.display = "flex";
        sidebarFooter.style.justifyContent = "center";
        $(".sidebar-inner-content").addClass("d-none");
        $(".sidebar-sub-links-bg").removeClass("px-5");
        $(".crm-dropdown").removeClass("d-none");
        $(".landing-dropdown").removeClass("d-none");
        $(".mail-dropdown").removeClass("d-none");
        $(".sidebar").css("overflow", "visible");
    } else {
        collapseButton.style.display = "block";
        forwardIcon.style.display = "none";
        sidebarFooter.style.width = "250px";
        sidebarFooter.style.display = "flex";
        sidebarFooter.style.justifyContent = "start";
        $(".sidebar-inner-content").removeClass("d-none");
        $(".sidebar-sub-links-bg").addClass("px-5");
        $(".crm-dropdown").addClass("d-none");
        $(".landing-dropdown").addClass("d-none");
        $(".mail-dropdown").addClass("d-none");
    }
});
//  dropdown mouse event none
$(document).ready(function () {
    $(".crm").hover(
        function () {
            $(".crm-dropdown").css("opacity", "1");
            $(".mail, .landing").addClass("disabled");
        },
        function () {
            $(".crm-dropdown").css("opacity", "0");
            $(".mail, .landing").removeClass("disabled");
        }
    );

    $(".mail").hover(
        function () {
            $(".mail-dropdown").css("opacity", "1");
            $(".crm, .landing").addClass("disabled");
        },
        function () {
            $(".mail-dropdown").css("opacity", "0");
            $(".crm, .landing").removeClass("disabled");
        }
    );

    $(".landing").hover(
        function () {
            $(".landing-dropdown").css("opacity", "1");
            $(".crm, .mail").addClass("disabled");
        },
        function () {
            $(".landing-dropdown").css("opacity", "0");
            $(".crm, .mail").removeClass("disabled");
        }
    );
});
//  ____________________SideBar Ends________________________

//  <h1>Footer</h1>

$(document).ready(function () {
    // Initialize Summernote
    $("#summernote").summernote({
        height: 210, // Initial height setting, adjust as needed
    });
});

// const editors = [
//     "#editor",
//     "#editor2",
//     "#editor3",
//     "#editor4",
//     "#editor5",
//     "#editor6",
//     "#editor7",
//     "#editor8",
//     "#editor9"
// ];

// editors.forEach(selector => {
//     const element = document.querySelector(selector);
//     if (element) {
//         ClassicEditor.create(element).catch((error) => {
//             console.error(error);
//         });
//     }
// });
const editors = [
    "#editor",
    "#editor2",
    "#editor3",
    "#editor4",
    "#editor5",
    "#editor6",
    "#editor7",
    "#editor8",
    "#editor9",
    "#productExtraInfoEditor",
    ".productDecription",
];

// Create an object to store the editor instances
const editorInstances = {};

// Initialize each editor and store its instance
editors.forEach(selector => {
    const element = document.querySelector(selector);
    if (element) {
        ClassicEditor.create(element)
            .then(editor => {
                // Store the editor instance in the object with the selector as the key
                editorInstances[selector] = editor;
            })
            .catch((error) => {
                console.error(error);
            });
    }
});

// Example of how to set data for editor2
function setEditorData(selector, data) {
    if (editorInstances[selector]) {
        editorInstances[selector].setData(data);
    } else {
        console.error("Editor not initialized for " + selector);
    }
}

$(".add-statement-btn").on("click", function () {
    $(".add-statement").removeClass("d-none");
    // $(".add-option").addClass('d-none')
});
$(".add-option-btn").on("click", function () {
    $(".add-option").removeClass("d-none");
    // $(".add-statement").addClass('d-none')
});
$(".view-incoice").on("click", function () {
    $(".inoice-detail").removeClass("d-none");
    $("#products").addClass("d-none");
});
$(".back-to-invoice-list").on("click", function () {
    $(".inoice-detail").addClass("d-none");
    $("#products").removeClass("d-none");
});
$(".view-ticket").on("click", function () {
    $(".ticket-detail").removeClass("d-none");
    $("#products").addClass("d-none");
});
$(".back-to-ticket-list").on("click", function () {
    $(".ticket-detail").addClass("d-none");
    $("#products").removeClass("d-none");
});
$(".view-enroll-students").on("click", function () {
    $(".enroll-students-detail").removeClass("d-none");
    $("#products").addClass("d-none");
});
$(".back-to-enroll-students-list").on("click", function () {
    $(".enroll-students-detail").addClass("d-none");
    $("#products").removeClass("d-none");
});
$(".view-student-subscription").on("click", function () {
    $(".student-subscription-detail").removeClass("d-none");
    $("#products").addClass("d-none");
});
$(".back-to-student-subscription-list").on("click", function () {
    $(".student-subscription-detail").addClass("d-none");
    $("#products").removeClass("d-none");
});
$(".view-student-result").on("click", function () {
    $(".student-result-detail").removeClass("d-none");
    $("#products").addClass("d-none");
});
$(".back-to-student-result-list").on("click", function () {
    $(".student-result-detail").addClass("d-none");
    $("#products").removeClass("d-none");
});
$(".bank-form").on("click", function () {
    $(".bank-form-detail").removeClass("d-none");
    $("#products").addClass("d-none");
});
$(".back-to-add-form").on("click", function () {
    $(".bank-form-detail").addClass("d-none");
    $("#products").removeClass("d-none");
});
$(".audi-bank-form").on("click", function () {
    $(".audi-bank-form-detail").removeClass("d-none");
    $("#products").addClass("d-none");
});
$(".back-to-audi-add-form").on("click", function () {
    $(".audi-bank-form-detail").addClass("d-none");
    $("#products").removeClass("d-none");
});
$(".ppt-bank-form").on("click", function () {
    $(".ppt-bank-form-detail").removeClass("d-none");
    $("#products").addClass("d-none");
});
$(".back-to-ppt-add-form").on("click", function () {
    $(".ppt-bank-form-detail").addClass("d-none");
    $("#products").removeClass("d-none");
});
$(".view-exam-matrix-main-content").on("click", function () {
    $(".exam-matrix-main-content").removeClass("d-none");
    $("#products").addClass("d-none");
});
$(".back-to-products").on("click", function () {
    $(".exam-matrix-main-content").addClass("d-none");
    $("#products").removeClass("d-none");
});
$(".view-bowtie-main-content").on("click", function () {
    $(".bowtie-main-content").removeClass("d-none");
    $("#products").addClass("d-none");
});
$(".back-to-products").on("click", function () {
    $(".bowtie-main-content").addClass("d-none");
    $("#products").removeClass("d-none");
});
$(".view-cloze-main-content").on("click", function () {
    $(".cloze-main-content").removeClass("d-none");
    $("#products").addClass("d-none");
});
$(".back-to-products").on("click", function () {
    $(".cloze-main-content").addClass("d-none");
    $("#products").removeClass("d-none");
});
$(".view-rational-main-content").on("click", function () {
    $(".rational-main-content").removeClass("d-none");
    $("#products").addClass("d-none");
});
$(".back-to-products").on("click", function () {
    $(".rational-main-content").addClass("d-none");
    $("#products").removeClass("d-none");
});
$(document).ready(function () {
    $('.my-select2').select2({
        placeholder: "Modes",
        allowClear: true
    });
});

// To Clear Modal Pop Up Form On Add Click
$(document).on('click', '.modal-add-btn', function () {
    resetModalForm('#filterModal');
});


function resetModalForm(selector = '#filterModal') {
    $(selector).find('input').val('');
    $(selector).find('textarea').val('');
    $(selector).find('select').val(null).trigger('change');
}

$('#file-input').on('change', function (event) {
    const files = event.target.files;
    var allfileslength = files.length + selectedFiles.length;
    if (allfileslength > 7) {
        toastr.error('You can upload a maximum of 7 images.');
        return;
    }
    $('.image-container-selected').empty();
    // Validate and add selected files to selectedFiles array
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        // Check if the file is an image
        if (!file.type.startsWith('image/')) {
            toastr.error('Please select only image files.');
            continue;
        }
        selectedFiles.push(file);
    }
    // Update the display
    displaySelectedFiles();
});


function displaySelectedFiles() {
    const $imageContainerselected = $('.image-container-selected');
    $imageContainerselected.empty(); // Clear previous images
    if ($imageContainerselected.attr('data-page-name') == 'products') {
        ajaxUrl = '/admin/product/delete/images';
    } else {
        ajaxUrl = '/admin/settings/file/remove';
    }
    selectedFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function (e) {
            const $imageDiv = $('<div>').addClass('image-item-land');
            const $image = $('<img>').attr('src', e.target.result);
            $imageDiv.append($image);
            const $fileName = $('<p>').text(file.name);
            $imageDiv.append($fileName);
            const $cancelButton = $('<span>').html('&times;').addClass('cancel-icon');
            $cancelButton.on('click', function () {
                selectedFiles.splice(index, 1);
                displaySelectedFiles();
            });

            $imageDiv.append($cancelButton);
            $imageContainerselected.append($imageDiv);
        }
        reader.readAsDataURL(file);
    });
}
function removeExistedFiles(fileIndex, url) {
    // Remove the file from the files array
    const removedfile = files[fileIndex]; // Directly use fileIndex to get the file object
    files.splice(fileIndex, 1); // Remove the file from the array
    if (removedfile !== undefined) {
        var url = url;
        const type = "POST";
        const data = {
            id: removedfile.id
        };

        // Ensure that AJAX settings are correct
        $.ajax({
            type: type,
            url: url,
            data: JSON.stringify(data),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (response) {
                handleFileRemoveResponse(response);
            },
            error: function (error) {
                console.error("Error removing file:", error);
            }
        });
    }

    // Re-render the image container after removal
    displayExistedFiles();
}

function handleFileRemoveResponse(response) {
    if (response.status == 200) {
        toastr.success(response.message, '', {
            "timeOut": "3000"
        })
    }
    else {
        toastr.error(response.message, '', {
            "timeOut": "3000"
        })
    }
}


var files = [];
var selectedFiles = [];

function displayExistedFiles() {
    const $imageContainerexisted = $('.image-container-existed');
    $imageContainerexisted.empty(); // Clear previous images

    // Determine the AJAX URL based on the page name
    let ajaxUrl;
    if ($imageContainerexisted.attr('data-page-name') === 'products') {
        ajaxUrl = '/admin/product/delete/images';
    }
    else {
        ajaxUrl = '/admin/settings/file/remove';
    }

    files.forEach((file, index) => {
        const $imageDiv = $('<div>').addClass('image-item-land');
        const $image = $('<img>').attr('src', file.name);
        $imageDiv.append($image);
        const $fileName = $('<p>').text(file.name); // Display the file name
        $imageDiv.append($fileName);

        const $cancelButton = $('<span>').html('&times;').addClass('cancel-icon');
        $cancelButton.on('click', function () {
            removeExistedFiles(index, ajaxUrl); // Call remove function with the current index
        });

        $imageDiv.append($cancelButton);
        $imageContainerexisted.append($imageDiv);
    });
}


$(document).on('DOMContentLoaded', function () {
    $('.focusedField').focus();
});
