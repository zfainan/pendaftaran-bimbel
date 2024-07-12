<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::with('user')->latest()->paginate();

        return view('students.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'gender' => 'required|string|max:10',
            'kelas' => 'required|integer',
            'asal_sekolah' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'nama_ortu' => 'required|string|max:255',
            'pekerjaan_ortu' => 'required|string|max:255',
            'no_telp_ortu' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $student = Student::create($request->all());

                $user = new User();
                $user->fill([
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                ]);
                $user->userable()->associate($student);
                $user->save();
            });

            return redirect(route('students.index'))->with('success', 'Tambah data berhasil.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Tambah data gagal.'.$th->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'gender' => 'required|string|max:10',
            'kelas' => 'required|integer',
            'asal_sekolah' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'nama_ortu' => 'required|string|max:255',
            'pekerjaan_ortu' => 'required|string|max:255',
            'no_telp_ortu' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users,email,'.$student->user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        try {
            DB::transaction(function () use ($request, $student) {
                $student->update($request->all());

                $student->user->update([
                    'email' => $request->input('email', $student->user->email),
                ]);

                if ($request->filled('password')) {
                    $student->user->update([
                        'password' => Hash::make($request->input('password')),
                    ]);
                }
            });

            return redirect(route('students.index'))->with('success', 'Ubah data berhasil.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ubah data gagal.'.$th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            DB::transaction(function () use ($student) {
                $student->user->delete();
                $student->delete();
            });

            return redirect(route('students.index'))->with('success', 'Hapus data berhasil.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Hapus data gagal.'.$th->getMessage())->withInput();
        }
    }
}
