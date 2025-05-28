<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index() {
        if ( Role::where( 'name', "Superadmin" )->exists() ) {
            $this->assignAdminPermissions();
        }

        $roles = Role::where('name','!=','Superadmin')->where('guard_name','web')->orderByDesc('created_at')->get();
        return view('admin.role.role-permission', compact( 'roles' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {

        $permissions = Permission::where('guard_name','web')->get();
        return view('admin.role.create-role-permission',compact('permissions') );

    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request )
    {
        // dd($request->all());
        try {

            $validator = Validator::make( $request->all(), [
                'name' => 'required|string|max:255|unique:roles,name',
                'status' => 'required|in:Active,Inactive',
                'permissions' => 'required|array|min:1',
                'permissions.*' => 'exists:permissions,name',
            ], [
                'name.required' => 'Role name is required.',
                'name.unique' => 'This role name is already taken.',
                'status.required' => 'Status is required.',
                'status.in' => 'Status must be either Active or Inactive.',
                'permissions.required' => 'At least one permission must be selected.',
                'permissions.*.exists' => 'One or more selected permissions are invalid.',
            ] );
            if ( $validator->fails() ) {
                return redirect()->back()
                ->withErrors( $validator )
                ->withInput();
            }

            DB::beginTransaction();
            $admin_id = Auth::guard('web')->id();
            // Create the role
            $role = Role::create( [
                'name' => trim($request->name),
                'status' => $request->status,
                'created_by' => $admin_id ?? 1,
            ] );

            // Sync permissions if any
            if ( $request->has( 'permissions' ) && !empty( $request->permissions ) ) {
                $role->syncPermissions( $request->permissions );
            }

            // Commit transaction
            DB::commit();

            // Redirect with success message
            return redirect()->route( 'superadmin.role.index' )
            ->with('success', 'Role and permissions saved successfully!' );

        } catch ( \Exception $e ) {
            // Rollback transaction on error
            DB::rollBack();

            // Redirect back with error message
            return redirect()->back()
            ->with( 'error', $e->getMessage() )
            ->withInput();
        }
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( $id ) {
        // dd($id);
        $roleId = decrypt($id);
        $role = Role::where('guard_name','web')->findOrFail( $roleId );
        $permissions = Permission::where('guard_name','web')->get();
        // dd($permissions);
        return view('admin.role.edit-role-permission', compact( 'role', 'permissions' ) );
    }

    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, $id)
    {
        try {
            // Decrypt the role ID
            $roleId = decrypt($id);
            $role = Role::where('guard_name','web')->findOrFail($roleId);

            // Single validation rule for all roles
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
                'status' => 'required|in:Active,Inactive',
                'permissions' => 'required|array|min:1',
                'permissions.*' => 'exists:permissions,name',
            ], [
                'name.required' => 'Role name is required.',
                'name.unique' => 'This role name is already taken.',
                'status.required' => 'Status is required.',
                'status.in' => 'Status must be either Active or Inactive.',
                'permissions.required' => 'At least one permission must be selected.',
                'permissions.*.exists' => 'One or more selected permissions are invalid.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            DB::beginTransaction();
            $updated_by = Auth::guard('web')->id();
            $updateData = [
                'name' => trim($request->name),
                'status' => $request->status,
                'modified_by' => $updated_by ?? 1,
            ];

            $role->update($updateData);

            $role->syncPermissions($request->permissions ?? []);

            DB::commit();

            return redirect()->route('superadmin.role.index')
                ->with('success', 'Role and permissions updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
    }


    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        //
    }

    function assignAdminPermissions()
    {
        $adminRole = Role::where('guard_name','web')->where( 'name', "Superadmin" )->first();

        if ( !$adminRole ) {
            throw new \Exception('Superadmin role not found.');
        }

        $adminPermissions = Permission::where('guard_name','web')->pluck('name')->toArray();

        $adminRole->syncPermissions( $adminPermissions );
    }

}
