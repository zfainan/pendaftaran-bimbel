<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Http\Request;
use LogicException;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Registration::with(['student', 'program'])->latest()->paginate();

        return view('registrations.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $students = Student::all();
        $programs = Program::all();

        $selectedStudent = $request->filled('student_id') ? Student::find($request->input('student_id')) : null;
        $selectedProgram = $request->filled('program_id') ? Program::find($request->input('program_id')) : null;

        return view('registrations.create', compact('students', 'programs', 'selectedStudent', 'selectedProgram'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'program_id' => 'required|exists:programs,id',
            'tanggal' => 'required|date',
        ]);

        try {
            $registration = Registration::firstWhere(
                $request->only(['student_id', 'program_id'])
            );
            if ($registration?->id) {
                throw new LogicException("Siswa {$registration->student->nama} sudah terdaftar pada program {$registration->program->nama}.");
            }

            Registration::create($validated);

            return redirect(route('registrations.index'))->with('success', 'Tambah data berhasil.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Tambah data gagal. '.$th->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        return view('registrations.show', compact('registration'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Registration $registration)
    {
        $students = Student::all();
        $programs = Program::all();

        $selectedProgram = $request->filled('program_id') ? Program::find($request->input('program_id')) : $registration->program;

        return view('registrations.edit', compact('registration', 'students', 'programs', 'selectedProgram'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'program_id' => 'required|exists:programs,id',
            'tanggal' => 'required|date',
        ]);

        try {
            $registration->update($validated);

            return redirect(route('registrations.index'))->with('success', 'Ubah data berhasil.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ubah data gagal.'.$th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        try {
            $registration->delete();

            return redirect(route('registrations.index'))->with('success', 'Hapus data berhasil.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Hapus data gagal.'.$th->getMessage())->withInput();
        }
    }
}
