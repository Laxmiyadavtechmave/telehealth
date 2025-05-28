<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\GeneratesCustomId;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // public function __construct() {
    //     $this->middleware('permission:add_users', ['only'=>['store']]);
    //     $this->middleware('permission:edit_users', ['only'=>['update']]);
    //     $this->middleware('permission:view_users', ['only'=>['index']]);
    // }

    use GeneratesCustomId;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role_name','!=' ,'Superadmin')
                    ->orderByDesc('created_at')->get();

        $roles = Role::where( 'name' , '!=' ,'Superadmin')
                        ->where('status','Active')
                            ->where('guard_name','web')
                                ->get();
        return view('admin.users.index',compact('users' ,'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        // dd($request->all());
       try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|digits_between:8,13|unique:users,phone',
                'password' => 'nullable|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
                'role_name' => 'required|exists:roles,name',
            ],[
                'password.regex' => 'The new password must be at least 8 characters long and include uppercase, lowercase, numbers, and special characters.',
            ]);

        $data = $request->except('password');
        $data['password'] = Hash::make($request->password);


        DB::beginTransaction();
        $customId = $this->generateCustomUniqueId('users','custom_id','US', 6);
        $data['custom_id'] = $customId;
        $data['status'] = 'Active';
        $user = User::create($data); // Use appropriate model based on role
        $user->assignRole($request->role_name);
        DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'User Created successfully',
                'url' => route('superadmin.user.index'),
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'error' => collect($e->errors())->flatten()->first(),
            ], 422);

        } catch (\Exception $e) {
            DB::rollBack();
            // dd($e->getMessage());
            Log::error('Error in updating system user: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while adding the user. Please try again.',
            ], 400);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $user = User::findOrFail($request->user_id);
        try {
          $data =  $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'phone' => 'required|digits_between:8,13|unique:users,phone,' . $user->id,
                // 'password' => 'nullable|string|min:6',
                'role_name' => 'required|exists:roles,name',

            ]);

            // $data = $request->except('password');

            // if ($request->filled('password')) {
            //     $data['password'] = Hash::make($request->password);
            // }

            DB::beginTransaction();
            $user->update($data);
            $user->assignRole($request->role_name);
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'User updated successfully',
                'url' => route('superadmin.user.index'),
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'error' => collect($e->errors())->flatten()->first(),
            ], 422);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in updating system user: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while updating the user. Please try again.',
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateStatus(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:Active,Inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        try {
            // Find the user
            $user = User::findOrFail($request->user_id);

            // Update the user's status
            $user->status = $request->status;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update status: ' . $e->getMessage(),
            ], 500);
        }
    }

}
