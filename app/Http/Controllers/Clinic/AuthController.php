<?php

namespace App\Http\Controllers\Clinic;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('clinic.auth.login');
    }

    public function login(Request $request)
    {
        $request->session()->forget('url.intended');
        // Validate input
        $request->validate([
            'email' => 'required|email|exists:clinics',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('clinic')->attempt($credentials, $request->has('remember'))) {
            return redirect()->intended('/clinic/dashboard');
        }

        return redirect()->back()->with('error', 'Invalid email and password')->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('clinic')->logout();
        // $request->session()->invalidate();
        $request->session()->forget(['error', 'success']);
        $request->session()->regenerateToken();

        return redirect()->route('clinic.login')->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')->header('Pragma', 'no-cache')->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
    }

    // public function profile(Request $request)
    // {
    //     $user = Auth::guard('clinic')->user();

    //     if (!$user) {
    //         return redirect()->route('clinic.dashboard')->with('error', 'User not found');
    //     }

    //     if ($request->isMethod('get')) {
    //         return view('clinic.auth.profile', compact('user'));
    //     }
    //     // Validation rules
    //     $rules = [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255|unique:clinics,email,' . $user->id,
    //         'phone' => 'nullable|string|min:8|max:15',
    //         'address_line_1' => 'nullable|string|max:255',
    //         'address_line_2' => 'nullable|string|max:255',
    //         'country' => 'nullable|string|max:100',
    //         'state' => 'nullable|string|max:100',
    //         'city' => 'nullable|string|max:100',
    //         'pin_code' => 'nullable|string|max:20',
    //         'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'old_password' => 'nullable|string|min:8',
    //         'new_password' => 'nullable|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
    //         'password_confirmation' => 'nullable|string|same:new_password',
    //     ];

    //     // Custom validation messages
    //     $messages = [
    //         'new_password.regex' => 'The new password must be at least 8 characters long and include uppercase, lowercase, numbers, and special characters.',
    //         'password_confirmation.same' => 'The confirm password must match the new password.',
    //         'profile_pic.image' => 'The profile picture must be an image.',
    //         'profile_pic.mimes' => 'The profile picture must be a file of type: jpeg, png, jpg, gif.',
    //         'profile_pic.max' => 'The profile picture may not be larger than 2MB.',
    //     ];

    //     $validator = Validator::make($request->all(), $rules, $messages);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     // Update user data
    //     $data = $request->only(['name', 'email', 'phone', 'address_line_1', 'address_line_2', 'country', 'state', 'city', 'pin_code']);

    //     // Handle profile picture upload
    //     if ($request->hasFile('profile_pic')) {
    //         // Delete old image if exists
    //         if ($user->img && Storage::exists('public/' . $user->img)) {
    //             Storage::delete('public/' . $user->img);
    //         }
    //         $path = $request->file('profile_pic')->store('profile_pics', 'public');
    //         $data['img'] = $path;
    //     }

    //     // Handle password update
    //     if ($request->filled('old_password') && $request->filled('new_password')) {
    //         if (!Hash::check($request->old_password, $user->password)) {
    //             return redirect()->back()->with('error', 'The old password is incorrect.')->withInput();
    //         }
    //         $data['password'] = Hash::make($request->new_password);
    //     }

    //     // Update user
    //     $user->update($data);

    //     return redirect()->back()->with('success', 'Profile updated successfully.');
    // }


    public function profile(Request $request)
    {
        try {
            $clinic = Auth::guard('clinic')->user();
            if (!$clinic) {
                return redirect()->route('clinic.dashboard')->with('error', 'User not found');
            }

            if ($request->isMethod('get')) {
                $clinic = Auth::guard('clinic')->user();
                $extra = !empty($clinic->extra) ? json_decode($clinic->extra, true) : [];
                $schedules = $clinic->schedules->groupBy('day');
                $documents = $clinic->documents->sortByDesc('id');
                return view('clinic.auth.profile', compact('clinic', 'extra', 'schedules', 'documents'));
            }

        } catch (Exception $e) {
            return redirect()->route('superadmin.clinic.index')->with('error', 'Something went wrong');
        }
    }
}
