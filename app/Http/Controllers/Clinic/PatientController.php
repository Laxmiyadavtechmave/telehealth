<?php

namespace App\Http\Controllers\Clinic;

use Exception;
use App\Models\Nurse;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Traits\GeneratesCustomId;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ImageController;

class PatientController extends Controller
{
    use GeneratesCustomId;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('clinic')->user();
            $clinicId = $user->parent_id ?? $user->id;
        $patients = Patient::where('clinic_id', $clinicId)->get();
        return view('clinic.patient.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        try {

        return view('clinic.patient.create');
        } catch (Exception $e) {
            return redirect()->route('superadmin.clinic.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            // Step 1: Validate
            $request->validate([
                'ssn' => 'nullable|string',
                'name' => 'required|string|max:255',
                'dob' => 'required|date',
                'email' => 'required|email|unique:nurses',
                'phone' => 'required',
                'address1' => 'required|string',
                'city' => 'required|string',
                'country' => 'required|string',
                'postal_code' => 'required|string',
                'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
                'gender' => 'required|in:Male,Female,Other',
                'marital_status' => 'required|in:Married,Unmarried,Single',
                'national_id' => 'nullable|string|max:255',
            ]);

            // Step 2: Save nurse
            $customId = $this->generateCustomUniqueId('patients', 'patient_id', 'PA-', 6);

            $user = Auth::guard('clinic')->user();
            $clinicId = $user->parent_id ?? $user->id;

            $patient = new Patient();
            $patient->clinic_id =  $clinicId;
            $patient->patient_id = $customId;
            $patient->name = $request->name;
            $patient->ssn = $request->ssn;
            $patient->dob = $request->dob;
            $patient->email = $request->email;
            $patient->phone = $request->phone;
            $patient->address1 = $request->address1;
            $patient->address2 = $request->address2;
            $patient->city = $request->city;
            $patient->country = $request->country;
            $patient->postal_code = $request->postal_code;
            $patient->gender = $request->gender;
            $patient->marital_status = $request->marital_status;
            $patient->national_id = $request->national_id;
            $patient->extra = $request->filled('extra') ? json_encode($request->extra) : null;

            if ($request->hasFile('profile_pic')) {
                $patient->img = ImageController::upload($request->file('profile_pic'), 'patient');
            }

            $patient->save();
            DB::commit();
            return redirect()->route('clinic.patient.index')->with('success', 'Patient created successfully!');


        } catch (\Exception $e) {
            DB::rollback();
            // dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $patient = Patient::findorfail(decrypt($id));
            $extra = !empty($patient->extra) ? json_decode($patient->extra, true) : [];
            $documents = $patient->documents->map(function ($doc) {
                            return [
                                'title' => $doc->title,
                                'url' => env('IMAGE_ROOT') . $doc->img,
                            ];
                        });            return view('clinic.patient.detail', compact('patient', 'extra', 'documents'));
        } catch (Exception $e) {
            return redirect()->route('clinic.patient.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $patient = Patient::findorfail(decrypt($id));
            $extra = !empty($patient->extra) ? json_decode($patient->extra, true) : [];
            return view('clinic.patient.edit', compact('patient', 'extra'));
        } catch (Exception $e) {
            return redirect()->route('clinic.patient.index')->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        DB::beginTransaction();

        try {
            // Step 1: Decrypt ID and find the nurse
            $patient = Patient::findOrFail(decrypt($id));

            // Step 2: Validate
            $request->validate([
                'name' => 'required|string|max:255',
                'dob' => 'required|date',
                'ssn' => 'nullable|unique:patients,ssn,' . $patient->id,
                'email' => 'required|email|unique:patients,email,' . $patient->id,
                'phone' => 'required',
                'address1' => 'required|string',
                'city' => 'required|string',
                'country' => 'required|string',
                'postal_code' => 'required|string',
                'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
                'gender' => 'required|in:Male,Female,Other',
                'marital_status' => 'required|in:Married,Unmarried,Single',
                'national_id' => 'required|string|max:255',
            ]);

            // Step 3: Update nurse attributes
            $patient->name = $request->name;
            $patient->ssn = $request->ssn;
            $patient->dob = $request->dob;
            $patient->email = $request->email;
            $patient->phone = $request->phone;
            $patient->address1 = $request->address1;
            $patient->address2 = $request->address2;
            $patient->city = $request->city;
            $patient->country = $request->country;
            $patient->postal_code = $request->postal_code;
            $patient->gender = $request->gender;
            $patient->marital_status = $request->marital_status;
            $patient->national_id = $request->national_id;
            $patient->extra = $request->filled('extra') ? json_encode($request->extra) : null;


            // Handle profile picture upload
            if ($request->hasFile('profile_pic')) {
                // Replace old profile picture if it exists
                if ($patient->img && Storage::exists($patient->img)) {
                    Storage::delete($patient->img);
                }
                $patient->img = ImageController::upload($request->file('profile_pic'), 'patient');
            }

            $patient->save();


            DB::commit();
            return redirect()->route('clinic.patient.index')->with('success', 'Patient updated successfully!');

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in PatientController@update: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update patient: ' . $e->getMessage())->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function uploadDocument(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'patient_id' => 'required|exists:patients,id',
                'document' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
                'title' => 'required|string',
            ]);

            $patient = Patient::findOrFail($request->patient_id);

            if ($request->hasFile('document')) {
                $path = ImageController::upload($request->file('document'), '/patients/documents');
                $patient->documents()->create([
                    'img' => $path,
                    'title' => $request->title,
                ]);
            }

            return redirect()->back()->with('success', 'File uploaded successfully');

        } catch (\Exception $e) {
            // Log error if needed: Log::error($e);
            return redirect()->back()->with('error', 'Failed to upload document: ' . $e->getMessage());
        }
    }
}
