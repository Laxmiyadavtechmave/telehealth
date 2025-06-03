@extends('admin.layouts.app')
@section('title', 'Tele Health Super Admin | Add Clinic')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <div class="rightSideWrapper">
                <div
                    class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                    <div class="my-auto ">
                        <h2 class="mb-1 flexpagetitle">
                            <div class="backbtnwrap">
                                <a href="{{ route('superadmin.clinic.index') }}">
                                    <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                                </a>
                            </div>
                            New Clinic
                        </h2>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">

                        <div class="ActionWrapper">

                        </div>
                        <div class="head-icons ms-2 headicon_innerpage">
                            <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="Collapse" id="collapse-header">
                                <i class="ti ti-chevrons-up"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="tablemaincard_nopaddingleftright">
                    <form id="clinicForm" action="{{ route('superadmin.clinic.store') }}" class="form needs-validation"
                        method="post" enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="file" id="finalImageInput" name="documents[]" multiple hidden>

                        <div class="ItemContainerTop no-bg">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 class="sectionTitle">Basic Info</h6>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ItemNewContainer1 pe-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <div class="image-upload-container">
                                                                    <div class="profile-pic-wrapper">
                                                                        <div class="pic-holder">
                                                                            <img id="profilePic" class="pic"
                                                                                src="">

                                                                            <input class="uploadProfileInput" type="file"
                                                                                name="profile_pic" id="newProfilePhoto"
                                                                                accept="image/*" style="opacity: 0;" />
                                                                            <label for="newProfilePhoto"
                                                                                class="upload-file-block">
                                                                                <div class="text-center">
                                                                                    <div class="uploadicon_template">
                                                                                        <iconify-icon
                                                                                            icon="bytesize:upload"></iconify-icon>
                                                                                    </div>
                                                                                    <div class="text-uppercase">
                                                                                        Upload <br /> Logo Picture
                                                                                    </div>
                                                                                </div>
                                                                            </label>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label for="clinic_name">Clinic Name
                                                                                <span>*</span></label>
                                                                            <input type="text" placeholder="Clinic Name"
                                                                                id="clinic_name" class="form-control"
                                                                                name="clinic_name"
                                                                                value="{{ old('clinic_name') }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="license_no">License Number
                                                                                <span>*</span></label>
                                                                            <input type="text"
                                                                                placeholder="License Number" id="license_no"
                                                                                name="license_no" class="form-control"
                                                                                name="license_no"
                                                                                value="{{ old('license_no') }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div class="form-group">
                                                                            <label for="valid_from">Valid From
                                                                                <span>*</span></label>
                                                                            <input type="text" placeholder="Valid From"
                                                                                id="valid_from"
                                                                                class="form-control customdataPicker"
                                                                                name="valid_from"
                                                                                value="{{ old('valid_from') }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div class="form-group">
                                                                            <label for="valid_to">Valid To
                                                                                <span>*</span></label>
                                                                            <input type="text" placeholder="Valid To"
                                                                                id="valid_to"
                                                                                class="form-control customdataPicker"
                                                                                name="valid_to"
                                                                                value="{{ old('valid_to') }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label for="description">Description / Bio
                                                                                <span>*</span></label>
                                                                            <textarea name="extra[description]" id="description" class="form-control" required>{{ old('extra.description') }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>


                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ItemNewContainer1">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="email">Email <span>*</span></label>
                                                            <input type="email" placeholder="Enter Email here.."
                                                                id="email" class="form-control"
                                                                value="{{ old('email') }}" name="email" required
                                                                autocomplete="off" pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$"
                                                                title="Please enter a valid email">
                                                        </div>
                                                    </div>
                                                     <div class="col-lg-6">
                                                        <div class="form-group position-relative">
                                                            <label for="password">Password <span>*</span></label>
                                                            <input type="password" name="password" id="password"
                                                                class="pass-input form-control" placeholder="********"
                                                                min="6" style="width: 100%; padding-right: 40px;"
                                                                autocomplete="new-password" required />

                                                            <span 
                                                                style="position:absolute; top:38px; right:15px; cursor:pointer;">
                                                                <iconify-icon icon="mdi:eye"
                                                                    id="togglePassword"></iconify-icon>
                                                            </span>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="phone">Phone No. <span>*</span></label>
                                                            <input type="text" placeholder="Phone No." id="phone"
                                                                class="form-control" name="phone"
                                                                value="{{ old('phone') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="web_url">Website URL</label>
                                                            <input type="text" placeholder="Website URL"
                                                                id="web_url" class="form-control" name="web_url"
                                                                value="{{ old('web_url') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ItemContainerTop">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="ItemNewContainer1 pe-2">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h6 class="sectionTitle">Clinic Location</h6>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="ItemNewContainer1">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="address1">Address 1
                                                                            <span>*</span></label>
                                                                        <input type="text" placeholder="Address 1"
                                                                            id="address1" class="form-control"
                                                                            name="address1" value="{{ old('address1') }}"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="address2">Address 2 (Optional)</label>
                                                                        <input type="text"
                                                                            placeholder="Address 2 (Optional)"
                                                                            id="address2" class="form-control"
                                                                            name="address2"
                                                                            value="{{ old('address2') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <label for="city">Town/City
                                                                            <span>*</span></label>
                                                                        <input type="text" placeholder="Town/City"
                                                                            id="city" class="form-control"
                                                                            name="city" value="{{ old('city') }}"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <label for="country">Country
                                                                            <span>*</span></label>
                                                                        <input type="text" placeholder="Country"
                                                                            id="country" class="form-control"
                                                                            name="country" value="{{ old('country') }}"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <label for="postal_code">Postal Code
                                                                            <span>*</span></label>
                                                                        <input type="text" placeholder="Postal Code"
                                                                            id="postal_code" class="form-control"
                                                                            name="postal_code"
                                                                            value="{{ old('postal_code') }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="map_link">Google Maps Link
                                                                            <span>*</span></label>
                                                                        <input type="text"
                                                                            placeholder="Google Maps Link" name="map_link"
                                                                            id="map_link" required
                                                                            value="{{ old('map_link') }}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ItemNewContainer1">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h6 class="sectionTitle">Working Days & Hour</h6>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="card mb-0">
                                                    <div class="card-body">
                                                        @php
                                                            $weekDays = [
                                                                'monday',
                                                                'tuesday',
                                                                'wednesday',
                                                                'thursday',
                                                                'friday',
                                                                'saturday',
                                                                'sunday',
                                                            ];
                                                        @endphp
                                                        <div class="WeekDays_row">
                                                            <ul class="nav nav-tabs" id="weekTabs" role="tablist">
                                                                @foreach ($weekDays as $index => $day)
                                                                    <li class="nav-item" role="presentation">
                                                                        <button
                                                                            class="nav-link {{ $index === 0 ? 'active' : '' }}"
                                                                            id="{{ $day }}-tab"
                                                                            data-bs-toggle="tab"
                                                                            data-bs-target="#{{ $day }}"
                                                                            type="button" role="tab"
                                                                            aria-controls="{{ $day }}"
                                                                            aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                                                            {{ ucfirst($day) }}
                                                                        </button>
                                                                    </li>
                                                                @endforeach

                                                            </ul>
                                                        </div>
                                                        <div class="tab-content" id="weekTabContent">
                                                            @foreach ($weekDays as $index => $day)
                                                                <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                                                    id="{{ $day }}" role="tabpanel"
                                                                    aria-labelledby="{{ $day }}-tab">

                                                                    <div class="day-row" id="{{ $day }}">
                                                                        <div class="time-slots"
                                                                            id="{{ $day }}-slots"></div>

                                                                        <div class="form-group applyonallcheckbbox">
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input apply-all"
                                                                                    id="applyAll{{ ucfirst($day) }}">
                                                                                <label class="form-check-label"
                                                                                    for="applyAll{{ ucfirst($day) }}">
                                                                                    Do you want to apply this on all days
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    id="NotAvailable{{ $index + 1 }}"
                                                                                    name="not_available[{{ $day }}]">
                                                                                <label class="form-check-label"
                                                                                    for="NotAvailable{{ $index + 1 }}">
                                                                                    Not Available
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                        <button type="button"
                                                                            class="add-button addMultislot_button"
                                                                            onclick="addSlot('{{ $day }}')">
                                                                            <iconify-icon
                                                                                icon="basil:add-outline"></iconify-icon>
                                                                            Add Time
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ItemContainerTop no-bg">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="ItemNewContainer1 pe-2">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h6 class="sectionTitle">Social Media Links</h6>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="ItemNewContainer1">
                                                    <div class="row mb-3">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="facebook">Facebook </label>
                                                                <input type="text" placeholder="Enter Url"
                                                                    id="facebook" class="form-control"
                                                                    name="extra[facebook]"
                                                                    value="{{ old('extra.email') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="#">Instagram</label>
                                                                <input type="text" placeholder="Enter Url"
                                                                    id="name" class="form-control"
                                                                    name="extra[instagram]"
                                                                    value="{{ old('extra.instagram') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="#">LinkedIn</label>
                                                                <input type="text" placeholder="Enter Url"
                                                                    id="name" class="form-control"
                                                                    name="extra[linkedin]"
                                                                    value="{{ old('extra.linkedin') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="#">Twitter</label>
                                                                <input type="text" placeholder="Enter Url"
                                                                    id="name" class="form-control"
                                                                    value="{{ old('extra.twitter') }}"
                                                                    name="extra[twitter]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ItemNewContainer1">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h6 class="sectionTitle">Upload Clinic Document Images</h6>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="card selected">

                                                    <div class="card-body">
                                                        <div class="adding_fildswrap multipleimage_wrap">
                                                            <!-- Product Gallery Images Section -->
                                                            <div class="image-gallery" id="imageGalleryNew"
                                                                style="display: none;">
                                                                <!-- Placeholder for uploaded images -->
                                                            </div>

                                                            <!-- Add Product Gallery Images Link -->
                                                            <div class="addgaller_action">
                                                                <a href="#"
                                                                    class="text-primary d-inline-flex justify-content-center addgallery_btn btnComn_add_lightbg"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#uploadModalNew"
                                                                    style="display: none;">
                                                                    <iconify-icon
                                                                        icon="octicon:feed-plus-16"></iconify-icon> Add
                                                                    Document
                                                                    Images
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="FormSubmit_fix_container">
                            <a href="javascript:void(0)">
                                <button type="submit" class="btn btn-primary commonUpdateButton">
                                    <iconify-icon icon="mynaui:save"></iconify-icon> Submit & Save
                                </button>
                            </a>

                            <a href="{{ route('superadmin.clinic.index') }}">
                                <button type="button" class="btn commonCancleButton">
                                    Cancel
                                </button>
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="uploadModalNew" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Clinic Document Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Drag and Drop Upload Area -->
                    <div id="uploadAreaNew" class="upload-area">
                        Drag & drop images here or click to upload
                        <input type="file" id="imageInputNew" accept="image/*,.pdf,.doc,.docx" style="display: none;"
                            multiple />
                    </div>
                    <!-- Upload Loader -->
                    <div class="loaderCenter">
                        <div class="loader" id="uploadLoaderNew">

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class=" brnmodalclose" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addImageBtnNew">Add Images</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_scripts')
    <script src="{{ asset('common/js/form-validation.js') }}"></script>
    <script src="{{ asset('common/js/password.js') }}"></script>
    <script src="{{ asset('common/js/profile-pic.js') }}"></script>
    <script>
       
        /******************************** clinic gallery ****************************/
        const uploadAreaNew = document.getElementById("uploadAreaNew");
        const imageInputNew = document.getElementById("imageInputNew");
        const imageGalleryNew = document.getElementById("imageGalleryNew");
        const uploadLoaderNew = document.getElementById("uploadLoaderNew");
        const addImageBtnNew = document.getElementById("addImageBtnNew");
        const addImagesLinkNew = document.querySelector("[data-bs-target='#uploadModalNew']");
        let uploadedFilesNew = [];
        let finalImagesArray = [];

        imageGalleryNew.style.display = "none";

        const MAX_FILES = 7;
        const MAX_SIZE_MB = 5;

        // Helper
        function isValidFile(file) {
            const validTypes = [
                "image/",
                "application/pdf",
                "application/msword",
                "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
            ];
            return (
                (validTypes.some(type => file.type.startsWith(type)) ||
                    file.name.endsWith(".doc") || file.name.endsWith(".docx"))
            );
        }

        // Drag & Drop
        uploadAreaNew.addEventListener("dragover", (event) => {
            event.preventDefault();
            uploadAreaNew.classList.add("drag-over");
        });

        uploadAreaNew.addEventListener("dragleave", () => {
            uploadAreaNew.classList.remove("drag-over");
        });

        uploadAreaNew.addEventListener("drop", (event) => {
            event.preventDefault();
            uploadAreaNew.classList.remove("drag-over");
            const files = event.dataTransfer.files;
            handleFiles(files);
        });

        // Click to Upload
        uploadAreaNew.addEventListener("click", () => {
            imageInputNew.click();
        });

        imageInputNew.addEventListener("change", (event) => {
            const files = event.target.files;
            handleFiles(files);
        });

        // Handle File Uploads
        function handleFiles(files) {
            if (!files || files.length === 0) return;

            const newFiles = Array.from(files);
            for (let file of newFiles) {
                if (!isValidFile(file)) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Error!',
                        text: `${file.name} is not a valid file type.`
                    });
                    continue;
                }

                if (file.size > MAX_SIZE_MB * 1024 * 1024) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Error!',
                        text: `${file.name} exceeds the 5MB limit.`
                    });
                    continue;
                }

                if (uploadedFilesNew.length >= MAX_FILES) {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Error!',
                        text: `You can upload a maximum of ${MAX_FILES} files.`
                    });
                    break;
                }

                if (!uploadedFilesNew.includes(file)) {
                    uploadedFilesNew.push(file);
                }
            }

            showPreviewNew(uploadedFilesNew);
        }

        // Show Preview
        function showPreviewNew(files) {
            uploadAreaNew.innerHTML = ""; // Clear previous previews
            files.forEach((file) => {
                const fileDiv = document.createElement("div");
                fileDiv.style.marginBottom = "10px";
                fileDiv.style.border = "1px solid #ccc";
                fileDiv.style.padding = "5px";

                const fileName = document.createElement("p");
                fileName.textContent = file.name;
                fileName.style.fontSize = "14px";
                fileName.style.margin = "5px 0";

                if (file.type.startsWith("image/")) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const img = document.createElement("img");
                        img.src = e.target.result;
                        img.style.width = "100%";
                        img.style.border = "1px solid #ccc";
                        fileDiv.appendChild(img);
                        fileDiv.appendChild(fileName);
                    };
                    reader.readAsDataURL(file);
                } else {
                    const img = document.createElement("img");
                    img.style.width = "50px";
                    img.style.marginRight = "10px";
                    img.src = file.name.endsWith(".pdf") ?
                        "{{ asset('common/img/file.png') }}" :
                        "{{ asset('common/img/docx-file.png') }}";
                    fileDiv.appendChild(img);
                    fileDiv.appendChild(fileName);
                }

                uploadAreaNew.appendChild(fileDiv);
            });
        }

        // Final Submit Preview
        addImageBtnNew.addEventListener("click", () => {
            if (uploadedFilesNew.length === 0) {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error!',
                    text: 'Please upload at least one file first.',
                });
                return;
            }

            uploadLoaderNew.style.display = "block";

            uploadedFilesNew.forEach((file, index) => {
                setTimeout(() => {
                    if (!finalImagesArray.includes(file)) {
                        finalImagesArray.push(file);
                    }

                    const container = document.createElement("div");
                    container.classList.add("image-container");

                    if (file.type.startsWith("image/")) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            const img = document.createElement("img");
                            img.src = e.target.result;
                            img.style.width = "100px";
                            img.style.marginRight = "10px";

                            const removeBtn = document.createElement("button");
                            removeBtn.classList.add("remove-btn");
                            removeBtn.innerHTML = "×";
                            removeBtn.addEventListener("click", () => {
                                container.remove();
                                finalImagesArray = finalImagesArray.filter(f => f !==
                                    file);
                                checkAndHideGallery();
                            });

                            container.appendChild(img);
                            container.appendChild(removeBtn);
                            imageGalleryNew.appendChild(container);
                            imageGalleryNew.style.display = "flex";
                        };
                        reader.readAsDataURL(file);
                    } else {
                        const fileWrapper = document.createElement("div");
                        fileWrapper.style.display = "flex";
                        fileWrapper.style.alignItems = "center";
                        fileWrapper.style.border = "1px solid #ccc";
                        fileWrapper.style.padding = "5px";
                        fileWrapper.style.flexDirection = "column";
                        fileWrapper.style.textAlign = "center";

                        const img = document.createElement("img");
                        img.style.width = "60px";
                        img.style.marginRight = "10px";
                        img.src = file.name.endsWith(".pdf") ?
                            "{{ asset('common/img/file.png') }}" :
                            "{{ asset('common/img/docx-file.png') }}";

                        const fileText = document.createElement("span");
                        fileText.textContent = file.name;
                        fileText.style.fontSize = "12px";
                        fileText.style.lineHeight = "13px";
                        fileText.style.marginTop = "10px";

                        const removeBtn = document.createElement("button");
                        removeBtn.classList.add("remove-btn");
                        removeBtn.innerHTML = "×";
                        removeBtn.style.marginLeft = "10px";
                        removeBtn.addEventListener("click", () => {
                            container.remove();
                            finalImagesArray = finalImagesArray.filter(f => f !== file);
                            checkAndHideGallery();
                        });

                        fileWrapper.appendChild(img);
                        fileWrapper.appendChild(fileText);
                        container.appendChild(fileWrapper);
                        container.appendChild(removeBtn);
                        imageGalleryNew.appendChild(container);
                        imageGalleryNew.style.display = "flex";
                    }
                }, index * 2000);
            });

            setTimeout(() => {
                uploadLoaderNew.style.display = "none";
                uploadedFilesNew = [];
                uploadAreaNew.innerHTML = "Drag & drop images here or click to upload";
                const modal = bootstrap.Modal.getInstance(document.getElementById("uploadModalNew"));
                modal.hide();
                addImagesLinkNew.style.display = "none";
            }, uploadedFilesNew.length * 2000);
        });

        function checkAndHideGallery() {
            if (imageGalleryNew.childElementCount === 0) {
                imageGalleryNew.style.display = "none";
            }
        }

        $('form').on('submit', function(e) {
            const dataTransfer = new DataTransfer();
            finalImagesArray.forEach((file) => {
                dataTransfer.items.add(file);
            });
            document.getElementById("finalImageInput").files = dataTransfer.files;
        });
    </script>
    @include('admin.common.schedule-js')
@endpush
