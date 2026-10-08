<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    public function index() {
        $patients = Patient::all();

        return view('patients.index',
        compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|unique:patients,student_id',
            'name' => 'required',
            'course' => 'required',
            'year_level' => 'required'
        ]);

        Patient::create($request->only(['student_id','name','course','year_level']));

        return redirect()->route('patients.index')
            ->with('success', 'Patient created successfully.');
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'student_id' => ['required', Rule::unique('patients','student_id')->ignore($patient->id)],
            'name' => 'required',
            'course' => 'required',
            'year_level' => 'required'
        ]);

        $patient->update($request->only(['student_id','name','course','year_level']));

        return redirect()->route('patients.index')
            ->with('success', 'Patient updated successfully.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')
            ->with('success', 'Patient deleted successfully.');
    }
}
