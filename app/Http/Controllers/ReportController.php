<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Payment;
use App\Models\Program;
use App\Models\Registration;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function createRegistrationsReport()
    {
        $programs = Program::all();
        $branches = Branch::all();

        return view('reports.registration.index', compact('programs', 'branches'));
    }

    public function generateRegistrationsReport(Request $request)
    {
        $query = Registration::with(['student', 'program', 'payment', 'branch']);
        $branch = null;
        $program = null;

        if ($request->filled('branch_id')) {
            $query->where('branch_id', $request->get('branch_id'));
            $branch = Branch::find($request->get('branch_id'));
        }

        if ($request->filled('program_id')) {
            $query->where('program_id', $request->get('program_id'));
            $program = Program::find($request->get('program_id'));
        }

        if ($request->filled('since')) {
            $query->where('created_at', '>=', $request->get('since'));
        }

        if ($request->filled('until')) {
            $query->where('created_at', '<=', $request->get('until'));
        }

        $data = $query->latest()->get();

        try {
            $pdf = Pdf::loadView('reports.registration.pdf', compact('data', 'branch', 'program', 'request'));

            return $pdf->download(
                sprintf('registration_%s.pdf', now()->format('Y-m-d'))
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Generate data gagal.'.$th->getMessage())->withInput();
        }
    }

    public function createPaymentsReport()
    {
        $programs = Program::all();
        $branches = Branch::all();

        return view('reports.payment.index', compact('programs', 'branches'));
    }

    public function generatePaymentsReport(Request $request)
    {
        $query = Payment::with(['registration.student', 'registration.program', 'registration.payment', 'registration.branch']);
        $branch = null;
        $program = null;

        if ($request->filled('branch_id')) {
            $query->whereHas('registration', function ($builder) use ($request) {
                $builder->where('branch_id', $request->get('branch_id'));
            });
            $branch = Branch::find($request->get('branch_id'));
        }

        if ($request->filled('program_id')) {
            $query->whereHas('registration', function ($builder) use ($request) {
                $builder->where('program_id', $request->get('program_id'));
            });
            $program = Program::find($request->get('program_id'));
        }

        if ($request->filled('since')) {
            $query->where('created_at', '>=', $request->get('since'));
        }

        if ($request->filled('until')) {
            $query->where('created_at', '<=', $request->get('until'));
        }

        $data = $query->latest()->get();

        try {
            $pdf = Pdf::loadView('reports.payment.pdf', compact('data', 'branch', 'program', 'request'));

            return $pdf->download(
                sprintf('payments_%s.pdf', now()->format('Y-m-d'))
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Generate data gagal.'.$th->getMessage())->withInput();
        }
    }
}
