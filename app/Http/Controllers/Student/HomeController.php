<?php

declare(strict_types=1);

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $program = auth()->user()->userable?->registration->sortByDesc('tanggal')->first()?->program;

        $payment = auth()->user()->userable?->registration->sortByDesc('tanggal')->first()?->payment;

        return view('home', compact('program', 'payment'));
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
