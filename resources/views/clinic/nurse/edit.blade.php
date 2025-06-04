@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | Nurse-edit')
@section('content')

    <div class="page-wrapper">
        <div class="content">

            <div class="rightSideWrapper">
                <div
                    class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                    <div class="my-auto ">
                        <h2 class="mb-1 flexpagetitle">
                            <div class="backbtnwrap">
                                <a href="{{ route('clinic.nurse.index') }}">
                                    <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                                </a>
                            </div>
                            Edit Nurse Detail
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
                    <form action="{{ route('clinic.nurse.update', ['nurse' => encrypt($nurse->id)]) }}" class="form needs-validation"
                        method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
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
                                                                            @php

                                                                                $image = '';
                                                                                if (
                                                                                    $nurse->img &&
                                                                                    Illuminate\Support\Facades\Storage::disk(
                                                                                        'public',
                                                                                    )->exists($nurse->img)
                                                                                ) {
                                                                                    $image =
                                                                                        env('IMAGE_ROOT') . $nurse->img;
                                                                                }

                                                                            @endphp
                                                                            <img id="profilePic" class="pic"
                                                                                src="{{ $image ?? '' }}">

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

                                                                                </div>
                                                                            </label>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="#">Nurse Name</label>
                                                                            <input type="text" placeholder="Nurse Name"
                                                                                id="name" class="form-control"
                                                                                name="name" value="{{ old('name',$nurse->name ?? '') }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="#">Date of Birth
                                                                                (DOB)</label>
                                                                            <input type="text"
                                                                                placeholder="Date of Birth (DOB)"
                                                                                id="name"
                                                                                class="form-control customdataPicker"
                                                                                name="dob" value="{{ old('dob', $nurse->dob ?? '') }}"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="#">Gender</label>
                                                                            <select class="select2 form-control"
                                                                                data-placeholder="Select Gender"
                                                                                name="gender" required>
                                                                                <option value="" selected disabled>
                                                                                </option>
                                                                                <option value="Male"
                                                                                    {{ old('gender',$nurse->gender) == 'Male' ? 'selected' : '' }}>
                                                                                    Male</option>
                                                                                <option value="Female"
                                                                                    {{ old('gender',$nurse->gender) == 'Female' ? 'selected' : '' }}>
                                                                                    Female</option>
                                                                                <option value="Other"
                                                                                    {{ old('gender',$nurse->gender) == 'Other' ? 'selected' : '' }}>
                                                                                    Other</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="#">Marital Status</label>
                                                                            <select class="js-example-basic-single select2"
                                                                                data-placeholder='Select Type'
                                                                                name="marital_status" required>
                                                                                <option value="" selected disabled>

                                                                                </option>
                                                                                <option value="Married"
                                                                                    {{ old('marital_status',$nurse->marital_status) == 'Married' ? 'selected' : '' }}>
                                                                                    Married</option>
                                                                                <option value="Unmarried"
                                                                                    {{ old('marital_status',$nurse->marital_status) == 'Unmarried' ? 'selected' : '' }}>
                                                                                    Unmarried</option>
                                                                                <option value="Single"
                                                                                    {{ old('marital_status',$nurse->marital_status) == 'Single' ? 'selected' : '' }}>
                                                                                    Single</option>
                                                                            </select>
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
                                                            <label for="#">Email</label>
                                                            <input type="email" id="name" class="form-control"
                                                                value="{{ old('email',$nurse->email ?? '') }}" name="email" required
                                                                autocomplete="off" pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$"
                                                                title="Please enter a valid email" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group position-relative">
                                                            <label for="#">Password <span>*</span></label>
                                                            <input type="password" class="form-control password-field"
                                                                placeholder="Enter Password here.." name="password"
                                                                >
                                                            <span class="toggle-password"
                                                                style="position:absolute; top:38px; right:15px; cursor:pointer;">
                                                                <iconify-icon icon="mdi:eye-off-outline"></iconify-icon>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Phone No.</label>
                                                            <input type="text" placeholder="Phone No." id="name"
                                                                class="form-control" name="phone"
                                                                value="{{ request('phone',$nurse->phone ?? '') }}" maxlength="13"
                                                                minlength="8"
                                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,13);"
                                                                pattern="\d{8,13}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">National ID</label>
                                                            <input type="text" placeholder="National ID"
                                                                id="name" class="form-control" name="national_id"
                                                                value = "{{ old('national_id',$nurse->national_id ?? '') }}">
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="ItemNewContainer1">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">

                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="#">Address 1</label>
                                                            <input type="text" placeholder="Address 1" id="name"
                                                                class="form-control" name="address1"
                                                                value="{{ old('address1',$nurse->address1 ?? '') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="#">Address 2 (Optional)</label>
                                                            <input type="text" placeholder="Address 1" id="name"
                                                                class="form-control" name="address2"
                                                                value="{{ old('address2',$nurse->address2 ?? '') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="#">Town/City</label>
                                                            <input type="text" placeholder="Town/City" id="name"
                                                                class="form-control" name="city"
                                                                value="{{ old('city',$nurse->city ?? '') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="#">Country</label>
                                                            <input type="text" placeholder="country" id="name"
                                                                class="form-control" name="country"
                                                                value="{{ old('country',$nurse->country ?? '') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="#">Postal Code</label>
                                                            <input type="text" placeholder="Postal Code"
                                                                id="name" class="form-control" name="postal_code"
                                                                value="{{ old('postal_code',$nurse->postal_code ?? '') }}" required>
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
                                <div class="col-lg-12">
                                    <div class="ItemNewContainer1 pe-2">
                                        <div class="row mb-3">
                                            <div class="col-lg-12">
                                                <h6 class="sectionTitle">Professional Details</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Qualification</label>
                                                            <input type="text"
                                                                placeholder="eg. Diploma, B.Sc Nursing, GNM, etc."
                                                                id="name" class="form-control" name="qualification"
                                                                value="{{ old('qualification',$nurse->qualification ?? '') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Select Doctor</label>
                                                            <select class="select" data-placeholder='Select Doctor'
                                                                name="doctor_id" required>
                                                                @if(count($doctors) > 0)
                                                                    <option value="" selected></option>
                                                                @foreach ($doctors as $doctor )
                                                                    <option value="{{ $doctor->id }}" {{ old('doctor_id' , $nurse->doctor_id) == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                                                                @endforeach
                                                                @else
                                                                    <option value="" selected>Add doctor</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">License Number</label>
                                                            <input type="text" placeholder="License Number"
                                                                id="name" class="form-control" name="license_no"
                                                                value="{{ old('license_no', $nurse->license_no ?? '') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="#">Valid From</label>
                                                            <input type="text" placeholder="Valid From" id="name"
                                                                class="form-control customdataPicker" name="valid_from"
                                                                value="{{ old('valid_from', $nurse->valid_from ?? '') }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="#">Valid To</label>
                                                            <input type="text" placeholder="Valid To" id="name"
                                                                class="form-control customdataPicker" name="valid_to"
                                                                value="{{ old('valid_to', $nurse->valid_to ?? '') }}" required>
                                                        </div>
                                                    </div>


                                                </div>


                                            </div>

                                            <div class="col-lg-6">
                                                <div class="row">

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="#">Areas of Expertise</label>
                                                            {{-- <input type="text"
                                                                placeholder="e.g., ICU, Pediatrics, Surgical ward"
                                                                id="name" class="form-control"> --}}
                                                            <select name="area_expertise_id[]" class="select"
                                                                id="" multiple required>
                                                                @if (count($areaExpertises) > 0)
                                                                    @foreach ($areaExpertises as $expertise)
                                                                        <option value="{{ $expertise->id }}"
                                                                                title="{{ $expertise->description }}"
                                                                                {{ in_array($expertise->id, old('area_expertise_id', $nurseExpertise ?? [])) ? 'selected' : '' }}
                                                                                >
                                                                            {{ $expertise->name }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Years of Experience</label>
                                                            <input type="number" min=1 placeholder="" id="name"
                                                                class="form-control" name="year_of_experience"
                                                                value="{{ old('year_of_experience', $nurse->year_of_experience ?? '') }}" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="#">Languages Spoken</label>
                                                            <input type="text" placeholder="eg. Hindi,English etc."
                                                                id="name" class="form-control" name="language"
                                                                value="{{ old('language' , $nurse->language ?? '') }}" required>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-6">
                                        <div class="ItemNewContainer1">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h6 class="sectionTitle">Upload Clinic Document Images</h6>
                                                </div>

                                                <input type="file" id="finalImageInput" name="documents[]" multiple
                                                    hidden>
                                                <input type="hidden" id="removed_files" name="removed_files" hidden>

                                                <div class="col-lg-12">
                                                    <div class="card selected">

                                                        <div class="card-body">
                                                            <div class="adding_fildswrap multipleimage_wrap">
                                                                <div class="image-gallery" id="imageGalleryNew"
                                                                    style="display: none;">
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
                            </div> --}}
                        </div>

                        <div class="FormSubmit_fix_container">

                            <button type="submit" class="btn btn-primary commonUpdateButton">
                                <iconify-icon icon="mynaui:save"></iconify-icon> Submit & Save
                            </button>


                            <a href="{{ route('clinic.nurse.index') }}">
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
    </div>


    </div>
    </div>
    {{-- <div class="modal fade" id="uploadModalNew" tabindex="-1" aria-hidden="true">
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
    </div> --}}

@endsection

@push('custom_scripts')
    <script src="{{ asset('common/js/form-validation.js') }}"></script>
    <script>
        /******************************* clinic profile image ***********************/
        $(document).on("change", ".uploadProfileInput", function() {
            const triggerInput = $(this);
            const wrapper = triggerInput.closest(".profile-pic-wrapper");
            const holder = triggerInput.closest(".pic-holder");
            const pic = holder.find(".pic");
            const currentImg = pic.attr("src");
            const file = this.files[0];

            // Remove old alerts/snackbars
            wrapper.find('[role="alert"]').remove();

            if (!file || !window.FileReader) return;

            // Validate file type
            if (!file.type.match(/^image/)) {
                wrapper.append(
                    '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose a valid image.</div>'
                );
                setTimeout(() => {
                    wrapper.find('[role="alert"]').remove();
                }, 3000);
                return;
            }

            // Validate file size (5MB max)
            if (file.size > 5 * 1024 * 1024) {
                wrapper.append(
                    '<div class="alert alert-danger d-inline-block p-2 small" role="alert">File size must be less than 5MB.</div>'
                );
                setTimeout(() => {
                    wrapper.find('[role="alert"]').remove();
                }, 3000);
                return;
            }

            const reader = new FileReader();
            reader.onloadend = function() {
                holder.addClass("uploadInProgress");
                pic.attr("src", this.result);

                const loader = $('<div class="upload-loader"></div>').html(
                    '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>'
                );
                holder.append(loader);

                setTimeout(() => {
                    holder.removeClass("uploadInProgress");
                    loader.remove();

                    // Simulate random success/failure
                    const random = Math.random();
                    if (random < 0.9) {
                        // wrapper.append(
                        //     '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Image uploaded successfully</div>'
                        // );
                        // triggerInput.val("");
                        wrapper.find(".upload-file-block").css("opacity", "0");

                        setTimeout(() => {
                            wrapper.find('[role="alert"]').remove();
                        }, 3000);
                    } else {
                        pic.attr("src", currentImg);
                        wrapper.append(
                            '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There was an error while uploading! Please try again later.</div>'
                        );
                        triggerInput.val("");
                        setTimeout(() => {
                            wrapper.find('[role="alert"]').remove();
                        }, 3000);
                    }
                }, 1500);
            };

            reader.readAsDataURL(file);
        });


        /********************************* gallery/documents ************************/
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

        /*********************** edit gallery ***************************/
        const existingFiles = @json($documents ?? []);
        const removedFileIds = [];
        document.addEventListener("DOMContentLoaded", function() {
            if (!existingFiles || !Array.isArray(existingFiles)) return;

            const imageGalleryNew = document.getElementById("imageGalleryNew");


            existingFiles.forEach(file => {
                if (!file || !file.name || !file.url || !file.id) return;

                const container = document.createElement("div");
                container.classList.add("image-container");
                container.setAttribute("data-id", file.id);

                const isImage = file.name.match(/\.(jpg|jpeg|png|gif)$/i);
                const isPDF = file.name.match(/\.pdf$/i);
                const isDoc = file.name.match(/\.(doc|docx)$/i);

                if (isImage) {
                    const img = document.createElement("img");
                    img.src = file.url;
                    img.style.width = "100px";
                    img.style.marginRight = "10px";

                    const removeBtn = document.createElement("button");
                    removeBtn.classList.add("remove-btn");
                    removeBtn.innerHTML = "×";
                    removeBtn.addEventListener("click", () => {
                        container.remove();
                        removedFileIds.push(file.id);
                    });

                    container.appendChild(img);
                    container.appendChild(removeBtn);
                } else {
                    const fileWrapper = document.createElement("div");
                    fileWrapper.style.display = "flex";
                    fileWrapper.style.alignItems = "center";
                    fileWrapper.style.border = "1px solid #ccc";
                    fileWrapper.style.padding = "5px";
                    fileWrapper.style.flexDirection = "column";
                    fileWrapper.style.textAlign = "center";

                    const icon = document.createElement("img");
                    icon.style.width = "60px";
                    icon.src = isPDF ?
                        "{{ asset('common/img/file.png') }}" :
                        "{{ asset('common/img/docx-file.png') }}";

                    // const fileText = document.createElement("span");
                    // fileText.textContent = file.name;
                    // fileText.style.fontSize = "12px";
                    // fileText.style.lineHeight = "13px";
                    // fileText.style.marginTop = "10px";

                    const removeBtn = document.createElement("button");
                    removeBtn.classList.add("remove-btn");
                    removeBtn.innerHTML = "×";
                    removeBtn.style.marginLeft = "10px";
                    removeBtn.addEventListener("click", () => {
                        container.remove();
                        removedFileIds.push(file.id);
                    });

                    fileWrapper.appendChild(icon);
                    // fileWrapper.appendChild(fileText);
                    container.appendChild(fileWrapper);
                    container.appendChild(removeBtn);
                }

                imageGalleryNew.appendChild(container);
                imageGalleryNew.style.display = "flex";
            });
        });

        // Append removed IDs and files to the form on submit
        $('form').on('submit', function(e) {
            const dataTransfer = new DataTransfer();
            finalImagesArray.forEach((file) => {
                dataTransfer.items.add(file);
            });
            document.getElementById("finalImageInput").files = dataTransfer.files;
            document.getElementById("removed_files").value = JSON.stringify(removedFileIds);
        });
    </script>
    <script>
        $(document).on('click', '.toggle-password', function() {
            const input = $(this).siblings('.password-field');
            const type = input.attr('type') === 'password' ? 'text' : 'password';
            input.attr('type', type);

            const icon = type === 'password' ? 'mdi:eye-off-outline' : 'mdi:eye-outline';
            $(this).html(`<iconify-icon icon="${icon}"></iconify-icon>`);
        });
    </script>
    <!-----------------------------------
        Password Hide and show js End here
        ------------------------------------->
@endpush
