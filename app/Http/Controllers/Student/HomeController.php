<?php

declare(strict_types=1);

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        /** @var Student $user */
        $user = auth()->user()->userable;

        $user->load('registrations');

        $program = $user?->registrations->sortByDesc('tanggal')->first()?->program;
        $payment = $user?->registrations->sortByDesc('tanggal')->first()?->payment;

        return view('student.home', compact('program', 'payment'));
    }

    public function completeRegistration(Request $request)
    {
        $validated = $request->validate([
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'gender' => 'required|string|max:10',
            'kelas' => 'required|integer',
            'asal_sekolah' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'nama_ortu' => 'required|string|max:255',
            'pekerjaan_ortu' => 'required|string|max:255',
            'no_telp_ortu' => 'required|string|max:20',
        ]);

        auth()->user()->userable->update($validated);

        return redirect()->route('student.home');
    }
}
