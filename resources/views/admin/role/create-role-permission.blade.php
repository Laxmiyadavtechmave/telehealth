@extends('admin.layouts.app')
@section('title', 'Tele Health Super Admin | Add-Role')
@section('content')
    <style>
        .card-header {
            border-bottom: 1px solid #ececec;
            background: #f8f8f8;
            padding: 10px 15px;
        }

        .secTitle {
            font-size: 18px;
            margin-bottom: 20px;
            background: #eceef1;
            padding: 5px 15px;
            border-radius: 5px;
        }

        .rolePermission .accordion-button {
            padding: 10px;
        }

        .accordion-button {
            color: #000 !important;
            font-size: 15px !important;
        }

        .advance-list {
            padding-left: 0;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .advance-list>li {
            margin-bottom: 5px;
        }

        .advance-list-item {
            padding: 10px 1.25rem;
            /* min-height: 50px; */
            border: 1px solid #d8d8d8;
            border-radius: 0.5rem;
            list-style: none;
            background: #fff;
            position: relative;
            -moz-transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            -o-transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            -webkit-transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            line-height: unset;
            display: flex;
            align-items: center;
            width: calc(50% - 10px);
        }

        .prroleBox {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .moduleNM h5 {
            font-size: 15px;
        }

        .prmission {
            display: flex;
            gap: 15px;
        }

        .RolePermission_container .size-4 {
            width: 1rem;
            height: 1rem;
        }

        .RolePermission_container .prmission .flex.items-center.gap-2 {
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .flex.items-center.gap-2 {
            align-items: center;
            display: flex;
        }
    </style>
    <div class="page-wrapper">
        <div class="content">

            <div class="rightSideWrapper">
                <div
                    class="d-md-flex pagetop_headercmntb d-block align-items-center justify-content-between page-breadcrumb ">
                    <div class="my-0">
                        <h2 class="mb-1 flexpagetitle">
                            <div class="backbtnwrap">
                                <a href="{{ route('superadmin.role.index') }}">
                                    <iconify-icon icon="octicon:arrow-left-24"></iconify-icon>
                                </a>
                            </div>
                            Create Role & Permission
                        </h2>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                        <!-- <div class="ActionWrapper"> -->
                        <!-- <a href="create-role-permission.php" class="btn btn-primary d-flex align-items-center cmnaddbtn">
                                <iconify-icon icon="icons8:plus"></iconify-icon> Create Role & permission
                                </a> -->
                        <!-- <a href="sales-return-new.php" class="btn btn-info d-flex align-items-center cmnaddbtn">
                             <iconify-icon icon="carbon:return"></iconify-icon> Sales Return
                            </a> -->
                        <!-- </div> -->
                        <div class="head-icons ms-2 headicon_innerpage">
                            <a href="javascript:void(0);" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="Collapse" id="collapse-header">
                                <i class="ti ti-chevrons-up"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card tablemaincard_nopaddingleftright">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 mx-auto">
                                <form action="{{ route('superadmin.role.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 mt-3 mb-3">
                                            <div class="card mb-0">
                                                <div class="card-header cardflex_header">
                                                    <h5 class="card-title">
                                                        <div class="cardheader_TITIcon">
                                                            <iconify-icon icon="si:shield-duotone"></iconify-icon>
                                                        </div>
                                                        Role Details
                                                    </h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Role Name</label>
                                                                <input type="text" class="form-control" id="roleName"
                                                                    name="name" placeholder="Enter Role Name"
                                                                    value="{{ old('name') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="#">Select Status</label>
                                                                <select id="selectStatus" name="status" class="select">
                                                                    <option disabled>Select Status</option>
                                                                    <option value="Active"
                                                                        {{ old('status') == 'Active' ? 'selected' : '' }}>
                                                                        Active</option>
                                                                    <option value="Inactive"
                                                                        {{ old('status') == 'Inactive' ? 'selected' : '' }}>
                                                                        Inactive</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-lg-12">
                                            <h1 class="secTitle titleBtn">User Permission</h1>
                                        </div>

                                        <div class="col-lg-12 mb-5">
                                            <div class="accordion rolePermission" id="accordionExample">
                                                @php
                                                    $permissions = Spatie\Permission\Models\Permission::all()
                                                        ->groupBy('category')
                                                        ->map(function ($category) {
                                                            return $category->groupBy('subcategory');
                                                        });
                                                @endphp
                                                @foreach ($permissions as $category => $subcategories)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header"
                                                            id="heading{{ \Illuminate\Support\Str::slug($category) }}">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapse{{ \Illuminate\Support\Str::slug($category) }}"
                                                                aria-expanded="false"
                                                                aria-controls="collapse{{ \Illuminate\Support\Str::slug($category) }}">
                                                                <h6>{{ $category }}</h6>
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{ \Illuminate\Support\Str::slug($category) }}"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="heading{{ \Illuminate\Support\Str::slug($category) }}"
                                                            data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <ul id="todo_list" class="advance-list">
                                                                    @foreach ($subcategories as $subcategory => $perms)
                                                                        <li
                                                                            class="advance-list-item single-task-list {{ in_array($subcategory, ['Direct Sale', 'Warehouse Return', 'Manage Client', 'Site']) ? 'width-100' : '' }}">
                                                                            <div class="prroleBox">
                                                                                <div class="moduleNM">
                                                                                    <h5>{{ $subcategory }}</h5>
                                                                                </div>
                                                                                <div class="prmission">
                                                                                    @foreach ($perms as $permission)
                                                                                        <div
                                                                                            class="checkboxPM flex items-center gap-2">
                                                                                            <input
                                                                                                class="form-check-input mt-0"
                                                                                                type="checkbox"
                                                                                                name="permissions[]"
                                                                                                value="{{ $permission->name }}"
                                                                                                id="perm-{{ $permission->name }}"
                                                                                                {{ in_array($permission->name, old('permissions', [])) ? 'checked' : '' }}>
                                                                                            <label
                                                                                                for="perm-{{ $permission->name }}"
                                                                                                class="align-middle">
                                                                                                {{ $permission->display_name ?? \Illuminate\Support\Str::title(str_replace('-', ' ', $permission->name)) }}
                                                                                            </label>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                            <div class="FormSubmit_fix_container">

                                                    <button type="submit" class="btn btn-primary commonUpdateButton">
                                                        <i class="ti-save-alt"></i> Save Changes
                                                    </button>


                                                <a href="{{ route('superadmin.role.index') }}">
                                                    <button type="button" class="btn commonCancleButton">
                                                        Cancel
                                                    </button>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


        </div>
    </div>


@endsection
