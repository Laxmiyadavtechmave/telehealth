<div class="addEnquiry productSelection_modal">
    <form action="#">
        <div class="modal fade" id="createformModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header modalheader_customStyle">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <div class="modaltitle_icon">
                               <img src="assets/img/newimages/add-to-basket.png" alt="">
                            </div>
                            <div class="enquiryChoose_Title">
                                Create a New Product
                                <span class="modalTitlePara">
                                    Select the type of product you want to add.
                                </span>
                            </div>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="selectedtype_container">
                            <!-- Single Product Card -->
                            <div class="card cardforAcFire" data-form-type="single">
                                <div class="card-content">
                                    <div class="formtypecard_icon">
                                        <img src="assets/img/newimages/box(1).png" alt="">
                                    </div>
                                    <h2 class="card-title">Single Product</h2>
                                    <div class="radio-container">
                                        <input type="radio" id="radioSingle" name="formType" value="single" />
                                        <label for="radioSingle" class="radio-label"></label>
                                    </div>
                                </div>
                            </div>

                            <!-- Combo Product Card -->
                            <div class="card CardDual" data-form-type="combo">
                                <div class="card-content">
                                    <div class="formtypecard_icon">
                                        <img src="assets/img/newimages/products.png" alt="">
                                    </div>
                                    <h2 class="card-title">Combo Product</h2>
                                    <div class="radio-container">
                                        <input type="radio" id="radioCombo" name="formType" value="combo" />
                                        <label for="radioCombo" class="radio-label"></label>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="selectedFormType" id="selectedFormType" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="continueProcessBtn" class="btnContinueProcess editEnquiryBtn">
                            <div class="buttontext">
                                <div class="formediticon_modal">
                                    <iconify-icon icon="uit:process"></iconify-icon>
                                </div>
                                Continue to Process
                            </div>
                            <iconify-icon icon="bi:arrow-right"></iconify-icon>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- jQuery -->
<script src="{{asset('admin/assets/js/jquery-3.7.1.min.js')}}"></script>
<!-- iconify icon -->
<script src="{{asset('admin/assets/js/iconify.js')}}"></script>
<!-- Feather Icon JS -->
<script src="{{asset('admin/assets/js/feather.min.js')}}"></script>
<!-- Slimscroll JS -->
<script src="{{asset('admin/js/jquery.slimscroll.min.js')}}"></script>
<!-- Bootstrap Core JS -->
<script src="{{asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- Chart JS -->
<script src="{{asset('admin//plugins/apexchart/apexcharts.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/apexchart/chart-data.js')}}"></script>
<!-- Sweetalert 2 -->
<script src="{{asset('admin/assets/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/sweetalert/sweetalerts.min.js')}}"></script>
<!-- dropify -->
<script type="text/javascript" src="{{asset('admin/assets/js/dropify.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/dropify.min.css')}}">
<!-- Datatable JS -->
<script src="{{asset('admin/assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('admin/assets/js/contact-data.js')}}"></script>
<!-- Datetimepicker JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{{asset('admin/assets/js/daterangepicker-data.js')}}"></script>
<!-- Data Table JS -->
<script src="{{asset('admin/vendors/datatables.net/js/dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('admin/vendors/datatables.net-select/js/dataTables.select.min.js')}}"></script>

<!-- Mobile Input -->
<link rel="stylesheet" href="{{asset('admin/assets/plugins/intltelinput/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/plugins/intltelinput/css/demo.css')}}">
<script src="{{asset('admin/assets/plugins/intltelinput/js/intlTelInput.js')}}"></script>
<!-- Custom Datatable js start -->
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/customplugins/buttons.dataTables.min.css')}}">
<script type="text/javascript" src="{{asset('admin/assets/customplugins/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/customplugins/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/customplugins/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/customplugins/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/customplugins/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/assets/customplugins/buttons.colVis.min.js')}}"></script>
<!-- Select2 JS -->
<script src="{{asset('admin/assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Daterangepikcer JS -->
<script src="{{asset('admin/assets/js/moment.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('admin/assets/js/script.js')}}" type=""></script>
<!-- Custom JS -->
<script src="{{asset('admin/assets/js/theme-script.js')}}"></script>
<!-- Datetimepicker JS -->
<script src="{{asset('admin/assets/js/bootstrap-datetimepicker.min.js')}}" type=""></script>
<!-- Daterangepikcer JS -->
<script src="{{asset('admin/assets/plugins/daterangepicker/daterangepicker.js')}}" type=""></script>

<script src="{{asset('admin/assets/js/custom-select2.js')}}"></script>



<!-- ------------------------------------
submit trigger processing js
-------------------------------------- -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
      form.addEventListener('submit', function(event) {
        const submitButton = form.querySelector('button[type="submit"].canvasSubmit_button');
        if (submitButton) {
          event.preventDefault(); // Prevent default form submission
          showLoader(submitButton);
          // Simulate form submission for demonstration purposes
          setTimeout(() => {
            hideLoader(submitButton);
            form.submit(); // Submit the form after processing (e.g., AJAX call)
          }, 2000); // Simulate a delay for form submission
        }
      });
    });

    function showLoader(button) {
      button.dataset.originalText = button.innerHTML; // Save original button text
      button.innerHTML = 'Processing <span class="loaderButton_custom"></span>';
      button.disabled = true; // Disable the button to prevent multiple clicks
    }

    function hideLoader(button) {
      button.innerHTML = button.dataset.originalText; // Restore original button text
      button.disabled = false; // Enable the button
    }
  });
</script>
<!-- ------------------------------------
submit trigger processing js end
-------------------------------------- -->


<script>
// Wait for the DOM to load
document.addEventListener("DOMContentLoaded", function () {


    // Get all sidebar links
    const links = document.querySelectorAll("#sidebar-menu a");

    // Get the current page URL
    const currentUrl = window.location.pathname;

    // Loop through each link
    links.forEach(link => {
        // Get the href attribute of the link
        const href = link.getAttribute("href");

        // If the href matches the current URL
        if (href && currentUrl.includes(href)) {
            // Remove the active class from all links
            links.forEach(l => l.classList.remove("active"));

            // Add the active class to the matched link
            link.classList.add("active");

            // Also handle active class for parent submenu (if applicable)
            const parentLi = link.closest("li.submenu");
            if (parentLi) {
                parentLi.classList.add("active");
            }
        }
    });

    $(".submenu").each(function () {
        if ($(this).hasClass("active")) {
            // Add class 'subdrop' to the first anchor tag
            $(this).children("a").addClass("subdrop");
            
            // Set the ul within the submenu to display as block
            $(this).children("ul").css("display", "block");
        }
    });
});

</script>


  <!-- Dropify & lightbox CSS -->
<link rel="stylesheet" href="assets/css/lightbox.min.css">
  <script src="assets/js/lightbox.min.js"></script>
  
<script>
$(document).ready(function() {
    // Initialize Dropify
    var drEvent = $('.dropify').dropify();

    // Customize the Dropify message
    $('.dropify').each(function() {
        var customMessage = `
            <div class="custom-upload">
                <iconify-icon icon="solar:cloud-upload-broken"></iconify-icon>
                <p>Drag and drop image or</p>
                <button type="button" class="uploadimageBtn">Upload image</button>
            </div>
        `;

        // Append the custom message inside the Dropify message div
        $(this).closest('.dropify-wrapper').find('.dropify-message').html(customMessage);
    });

    // Add a hidden lightbox trigger link
    $('body').append('<a id="lightbox-trigger" href="#" data-lightbox="preview" style="display: none;">View Image</a>');

    // Handle new file upload and update Lightbox
    drEvent.on('change', function(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#lightbox-trigger").attr("href", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    });

    // Open Lightbox when clicking Dropify preview image
    $(document).on("click", ".dropify-render img", function(event) {
        event.preventDefault(); // Prevent file upload dialog
        $("#lightbox-trigger").click();
    });
});

</script>
<script>
$(document).ready(function () {
  setTimeout(function () {
    if (!$('body').hasClass('mini-sidebar')) {
      $('body').addClass('mini-sidebar');
    }
  }, 200); // wait for theme scripts to run and override
});


</script>
