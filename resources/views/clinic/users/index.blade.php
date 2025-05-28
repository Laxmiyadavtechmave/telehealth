@extends('clinic.layouts.app')
@section('title', 'Tele Health Clinic Admin | dashboard')
@section('content')

<div class="page-wrapper">
    <div class="content">

        <div class="rightSideWrapper">
            <div
                class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                <div class="my-0">
                    <h2 class="PageTitle">All Users</h2>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                    <div class="ActionWrapper">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#user_add" class="btn btn-primary d-flex align-items-center cmnaddbtn">
                        <iconify-icon icon="icons8:plus"></iconify-icon> Add New User
                        </a>
                        <!-- <a href="sales-return-new.php" class="btn btn-info d-flex align-items-center cmnaddbtn">
                     <iconify-icon icon="carbon:return"></iconify-icon> Sales Return
                    </a> -->
                    </div>
                    <div class="head-icons ms-2 headicon_innerpage">
                        <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-original-title="Collapse" id="collapse-header">
                            <i class="ti ti-chevrons-up"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card tablemaincard_nopaddingleftright">
                <div id="tablefiltesa_container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="leftprFilters">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="input-blocks InputFilter">
                                            <i data-feather="search" class="info-img"></i>
                                            <input type="text" class="form-control"
                                                placeholder="Search by User Name & Id">
                                        </div>
                                    </div>


                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="input-blocks">
                            <iconify-icon icon="ic:baseline-mode-standby" class="info-img"></iconify-icon>
                                <select class="select">
                                    <option disabled selected>Select Status</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-12">
                                        <div class="input-icon position-relative">
                                            <span class="input-icon-addon">
                                                <iconify-icon icon="iconoir:calendar" width="15" height="15">
                                                </iconify-icon>
                                            </span>
                                            <input type="text" class="form-control date-range bookingrange"
                                                placeholder="dd/mm/yyyy - dd/mm/yyyy">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Filter -->
                </div>
                <div class="custom-datatable-filter">
                    <div class="TableMainWrap">
                        <table class="table common-datatable nowrap w-100">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Mobile No.</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <!-- <th>Location</th> -->
                                    <th>Added On</th>
                                    <th>Status</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user )
                                <tr>
                                    <td><a href="#">#{{ $user->custom_id }}</a></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('m F,y') }}</td>
                                    <td>
                                       <div class="dropdown status-dropdown d-inline-block" data-user-id="{{ $user->id }}">
                                            <button class="badge {{ $user->status === 'Active' ? 'bg-soft-success' : 'bg-soft-danger' }} dropdown-toggle border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ $user->status }}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item status-option" href="#" data-status="Active">Active</a></li>
                                                <li><a class="dropdown-item status-option" href="#" data-status="Inactive">Inactive</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center ActionDropdown">
                                            <div class="d-flex">


                                                <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                      data-bs-toggle="modal" data-bs-target="#user_edit" href="#"
                                                        data-id="{{ $user->id }}"
                                                        data-name="{{ $user->name }}"
                                                        data-email="{{ $user->email }}"
                                                        data-mobile="{{ $user->phone }}"
                                                        data-role="{{ $user->role_name }}"
                                                        data-status="{{ $user->status }}">
                                                        <span class="icon"><span class="feather-icon"><iconify-icon icon="hugeicons:view"></iconify-icon></span></span>
                                                    </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>


    </div>
</div>

<!---------------------------------------------
 Window Style Add System User Modal End Here
---------------------------------------------->
<div class="WindowsStyleModal">
    <form action="{{ route('superadmin.user.store') }}" id="newUser" method="POST" novalidate>
     @csrf
        <div class="modal fade" id="user_add" tabindex="-1" aria-labelledby="HelpPopupLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="HelpPopupLabel">
                            <div class="iconModal">
                              <iconify-icon icon="uil:user"></iconify-icon>
                            </div>
                            Add User
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control"
                                        placeholder="Enter Name" name="name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Mobile No.</label>
                                    <input type="text" class="form-control" name="phone"
                                        placeholder="+90 **** *** ***"
                                        value="{{ request('phone') }}"
                                        maxlength="13" minlength="8"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,13);"
                                        pattern="\d{8,13}"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control"
                                        placeholder="Enter Email" name="email" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group position-relative">
                                    <label for="#">Password <span>*</span></label>
                                    <input type="password" class="form-control password-field" placeholder="Enter Password here.." name="password" required>
                                    <span class="toggle-password" style="position:absolute; top:38px; right:15px; cursor:pointer;">
                                        <iconify-icon icon="mdi:eye-off-outline"></iconify-icon>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="#">Select Role</label>
                                    <select class="select" name="role_name" required>
                                    @if($roles->isNotEmpty())
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role )
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="" disabled selected>No Role exist</option>
                                     @endif
								</select>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btnClose" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btnSave addUser">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!---------------------------------------------
 Window Style Add System User Modal End Here
---------------------------------------------->

<!---------------------------------------------
 Window Style Edit System User Modal End Here
---------------------------------------------->
<div class="WindowsStyleModal">
    <form action="{{ route('superadmin.user.update') }}" id="updateUser" method="POST" novalidate>
     @csrf
        <div class="modal fade" id="user_edit" tabindex="-1" aria-labelledby="HelpPopupLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="HelpPopupLabel">
                            <div class="iconModal">
                              <iconify-icon icon="uil:user"></iconify-icon>
                            </div>
                            Edit User Detail
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="user_id">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control"
                                        placeholder="Enter Name" name="name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Mobile No.</label>
                                    <input type="text" class="form-control" name="phone"
                                        placeholder="+90 **** *** ***"
                                        value="{{ request('phone') }}"
                                        maxlength="13" minlength="8"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,13);"
                                        pattern="\d{8,13}"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control"
                                        placeholder="Enter Email" name="email" required>
                                </div>
                            </div>
                            {{-- <div class="col-lg-6">
                                <div class="form-group position-relative">
                                    <label for="#">Password <span>*</span></label>
                                    <input type="password" class="form-control password-field" placeholder="Enter Password here.." name="password" required>
                                    <span class="toggle-password" style="position:absolute; top:38px; right:15px; cursor:pointer;">
                                        <iconify-icon icon="mdi:eye-off-outline"></iconify-icon>
                                    </span>
                                </div>
                            </div> --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="#">Select Role</label>
                                    <select class="select" name="role_name" id="role_name" required>
                                    @if($roles->isNotEmpty())
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role )
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    @else
                                        <option value="" disabled selected>No Role exist</option>
                                     @endif
								</select>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btnClose" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btnSave" data-bs-dismiss="modal">Save & Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!---------------------------------------------
 Window Style Edit System User Modal End Here
---------------------------------------------->
@endsection
@push('custom_scripts')

<script>
    $(document).ready(function () {
        // Initialize Select
        $('.select').select2();

        $('.addUser').on('click', function (e) {
            e.preventDefault(); // Prevent default behavior

            let form = $('#newUser');
            let formData = new FormData(form[0]);
            let isValid = true;

            // Remove all previous error messages
            form.find('.invalid-feedback').remove();
            form.find('.is-invalid').removeClass('is-invalid');

            // Validate required fields
            form.find('input[required], select[required], textarea[required]').each(function () {
                let field = $(this);
                let value = field.val() ? field.val().trim() : '';
                let isFieldValid = true;

                if (field.attr('type') === 'file') {
                    isFieldValid = field[0].files.length > 0;
                    console.log('File input value:', field[0].files); // Debug: Check if file is selected
                } else if (field.is('select')) {
                    isFieldValid = value !== '' && value !== null;
                } else {
                    isFieldValid = value !== '';
                }

                if (!isFieldValid) {
                    isValid = false;
                    field.addClass('is-invalid');

                    if (field.hasClass('select-hidden-accessible')) {
                        let selectContainer = field.next('.select');
                        selectContainer.next('.invalid-feedback').remove();
                        selectContainer.after('<div class="invalid-feedback" style="display: block;">This field is required.</div>');
                        selectContainer.find('.select-selection').addClass('is-invalid');
                    } else if (field.attr('type') === 'file') {
                        let uploadArea = field.closest('.categoryimageUpload');
                        uploadArea.find('.invalid-feedback').remove();
                        uploadArea.append('<div class="invalid-feedback" style="display: block;">This field is required.</div>');
                    } else {
                        field.next('.invalid-feedback').remove();
                        field.after('<div class="invalid-feedback" style="display: block;">This field is required.</div>');
                    }
                } else {
                    if (field.hasClass('select-hidden-accessible')) {
                        field.next('.select').find('.select-selection').removeClass('is-invalid');
                    }
                }
            });

            // Scroll to first invalid field if validation fails
            if (!isValid) {
                let firstInvalid = form.find('.is-invalid').first();
                let scrollTarget = firstInvalid.hasClass('select-hidden-accessible')
                    ? firstInvalid.next('.select')
                    : firstInvalid.closest('.categoryimageUpload').length
                    ? firstInvalid.closest('.categoryimageUpload')
                    : firstInvalid;
                $('html, body').animate({
                    scrollTop: scrollTarget.offset().top - 100
                }, 'smooth');
                return;
            }

            // Submit form via AJAX
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: formData,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Let the browser set the content type
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(() => {
                            window.location.href = response.url;
                        });
                        form[0].reset();
                        form.find('.select').val('').trigger('change'); // Reset Select
                    } else {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function (xhr) {
                    let response = xhr.responseJSON;
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: response.error || 'An unexpected error occurred!',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    console.log('Error response:', response); // Debug: Check server response
                }
            });
        });
    });
</script>

{{-- <script>
   document.addEventListener('DOMContentLoaded', function () {
        // Listen for click on any element that triggers the edit modal
        document.querySelectorAll('[data-bs-target="#user_edit"]').forEach(function (editButton) {
            editButton.addEventListener('click', function () {
                // Get the modal
                const modal = document.getElementById('user_edit');
                // Get form elements
                const userIdInput = modal.querySelector('input[name="user_id"]');
                const nameInput = modal.querySelector('input[name="name"]');
                const emailInput = modal.querySelector('input[name="email"]');
                const phoneInput = modal.querySelector('input[name="phone"]');
                const roleSelect = modal.querySelector('select[name="role_name"]');

                // Populate the fields
                userIdInput.value = this.getAttribute('data-id') || '';
                nameInput.value = this.getAttribute('data-name') || '';
                emailInput.value = this.getAttribute('data-email') || '';
                phoneInput.value = this.getAttribute('data-mobile') || '';

                // Get the role value
                const roleValue = this.getAttribute('data-role') || '';

                // Ensure the role dropdown has the correct value
                if (roleValue) {
                    // Find the matching option
                    const optionExists = Array.from(roleSelect.options).some(option => option.value === roleValue);
                    if (optionExists) {
                        roleSelect.value = roleValue;
                    } else {
                        // Optionally reset to default if role doesn't exist
                        roleSelect.value = '';
                        console.warn(`Role "${roleValue}" not found in dropdown options.`);
                    }
                } else {
                    roleSelect.value = ''; // Reset to default if no role provided
                }
            });
        });
    });
</script> --}}.

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Listen for click on any element that triggers the edit modal
    document.querySelectorAll('[data-bs-target="#user_edit"]').forEach(function (editButton) {
        editButton.addEventListener('click', function () {
            // Get the modal
            const modal = document.getElementById('user_edit');
            // Get form elements
            const userIdInput = modal.querySelector('input[name="user_id"]');
            const nameInput = modal.querySelector('input[name="name"]');
            const emailInput = modal.querySelector('input[name="email"]');
            const phoneInput = modal.querySelector('input[name="phone"]');
            const roleSelect = modal.querySelector('select[name="role_name"]');

            // Populate the fields
            userIdInput.value = this.getAttribute('data-id') || '';
            nameInput.value = this.getAttribute('data-name') || '';
            emailInput.value = this.getAttribute('data-email') || '';
            phoneInput.value = this.getAttribute('data-mobile') || '';

            // Get the role value
            const roleValue = this.getAttribute('data-role') || '';

            // Ensure the role dropdown has the correct value
            if (roleValue) {
                // Find the matching option
                const optionExists = Array.from(roleSelect.options).some(option => option.value === roleValue);
                if (optionExists) {
                    roleSelect.value = roleValue;
                    // Trigger the change event on roleSelect
                    triggerChangeEvent(roleSelect);
                } else {
                    // Optionally reset to default if role doesn't exist
                    roleSelect.value = '';
                    console.warn(`Role "${roleValue}" not found in dropdown options.`);
                    // Trigger the change event even if reset
                    triggerChangeEvent(roleSelect);
                }
            } else {
                roleSelect.value = ''; // Reset to default if no role provided
                // Trigger the change event
                triggerChangeEvent(roleSelect);
            }
        });
    });

    // Function to trigger a change event on an element
    function triggerChangeEvent(element) {
        const event = new Event('change', { bubbles: true });
        element.dispatchEvent(event);
    }
});
</script>

<script>
    $(document).ready(function () {
        // Initialize Select
        $('.select').select2();

        $('.btnSave').on('click', function (e) {
            e.preventDefault(); // Prevent default form submit

            let form = $('#updateUser');
            let formData = new FormData(form[0]);
            let isValid = true;

            // Clear previous errors
            form.find('.invalid-feedback').remove();
            form.find('.is-invalid').removeClass('is-invalid');

            // Validate all required fields except image and password
            form.find('input[required], select[required], textarea[required]').not('[name="image"], [name="password"]').each(function () {
                let field = $(this);
                let value = field.val() ? field.val().trim() : '';
                let isFieldValid = true;

                if (field.is('select')) {
                    isFieldValid = value !== '' && value !== null;
                } else {
                    isFieldValid = value !== '';
                }

                if (!isFieldValid) {
                    isValid = false;
                    field.addClass('is-invalid');

                    if (field.hasClass('select-hidden-accessible')) {
                        let selectContainer = field.next('.select');
                        selectContainer.next('.invalid-feedback').remove();
                        selectContainer.after('<div class="invalid-feedback" style="display: block;">This field is required.</div>');
                        selectContainer.find('.select-selection').addClass('is-invalid');
                    } else {
                        field.next('.invalid-feedback').remove();
                        field.after('<div class="invalid-feedback" style="display: block;">This field is required.</div>');
                    }
                } else {
                    if (field.hasClass('select-hidden-accessible')) {
                        field.next('.select').find('.select-selection').removeClass('is-invalid');
                    }
                }
            });

            // Stop if invalid
            if (!isValid) {
                let firstInvalid = form.find('.is-invalid').first();
                let scrollTarget = firstInvalid.hasClass('select-hidden-accessible')
                    ? firstInvalid.next('.select')
                    : firstInvalid;
                $('html, body').animate({
                    scrollTop: scrollTarget.offset().top - 100
                }, 'smooth');
                return;
            }

            // Submit the form via AJAX
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(() => {
                            window.location.href = response.url;
                        });
                        $('#editbrand_modal').modal('hide');
                    } else {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function (xhr) {
                    let response = xhr.responseJSON;
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: response?.error || 'Something went wrong!',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    console.log('Error response:', response); // Debug
                }
            });
        });
    });
</script>




    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--------------------------
Status Dropdown Js Start here
----------------------------->

<script>
$(document).on('click', '.status-option', function (e) {
    e.preventDefault();
    var $this = $(this);
    var selectedStatus = $this.data('status');
    var $dropdown = $this.closest('.status-dropdown');
    var userId = $dropdown.data('user-id');
    var $btn = $dropdown.find('button');

    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to change the status to ' + selectedStatus + '?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, change it!',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("superadmin.user.update-status") }}',
                type: 'POST',
                data: {
                    user_id: userId,
                    status: selectedStatus,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        // Update button text and color
                        $btn.text(selectedStatus);
                        if (selectedStatus === 'Active') {
                            $btn.removeClass('bg-soft-danger').addClass('bg-soft-success');
                            Swal.fire({
                                icon: 'success',
                                title: 'Status Changed',
                                text: 'User is now Active.',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        } else {
                            $btn.removeClass('bg-soft-success').addClass('bg-soft-danger');
                            Swal.fire({
                                icon: 'warning',
                                title: 'Status Changed',
                                text: 'User is now Inactive.',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message || 'Failed to update status.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while updating the status.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        }
    });
});
</script>


{{-- <script>
  $(document).on('click', '.status-option', function () {
    var $this = $(this);
    var selectedStatus = $this.data('status');
    var $dropdown = $this.closest('.status-dropdown');
    var $btn = $dropdown.find('button');

    Swal.fire({
      title: 'Are you sure?',
      text: 'Do you want to change the status to ' + selectedStatus + '?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Yes, change it!',
      cancelButtonText: 'Cancel',
    }).then((result) => {
      if (result.isConfirmed) {
        // Update button text
        $btn.text(selectedStatus);

        // Toggle colors
        if (selectedStatus === 'Active') {
          $btn.removeClass('bg-soft-danger').addClass('bg-soft-success');

          // Success alert
          Swal.fire({
            icon: 'success',
            title: 'Status Changed',
            text: 'Doctor is now Active.',
            timer: 2000,
            showConfirmButton: false
          });

        } else {
          $btn.removeClass('bg-soft-success').addClass('bg-soft-danger');

          // Warning alert
          Swal.fire({
            icon: 'warning',
            title: 'Status Changed',
            text: 'Doctor is now Inactive.',
            timer: 2000,
            showConfirmButton: false
          });
        }
      }
    });
  });
</script> --}}

<!--------------------------
Status Dropdown Js End here
----------------------------->
     <!-----------------------------------
Password Hide and show js start here
------------------------------------->
<script>
    $(document).on('click', '.toggle-password', function () {
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
