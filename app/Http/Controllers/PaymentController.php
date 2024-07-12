<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LogicException;

class PaymentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'registration_id' => 'required|exists:registrations,id',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
            'status' => 'required|string|max:255',
            'attachments' => 'nullable|array',
            'attachments.*' => 'required|file|max:4100',
        ]);

        try {
            $registration = Registration::find($request->registration_id);

            if ($registration->payment) {
                throw new LogicException('Pendaftaran telah dibayar.');
            }

            DB::transaction(function () use ($request) {
                $payment = new Payment($request->all());
                $payment->save();

                if ($request->hasFile('attachments')) {
                    foreach ($request->file('attachments') as $attachment) {
                        $payment->addMedia($attachment)->toMediaCollection('attachments', 'local');
                    }
                }
            });

            return redirect()->back()->with('success', 'Tambah data pembayaran berhasil. ');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Tambah data pembayaran gagal. '.$th->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return response()->json($payment->load('registration', 'media'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'registration_id' => 'required|exists:registrations,id',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|datetime',
            'status' => 'nullable|string|max:255',
            'attachments' => 'nullable|array',
            'attachments.*' => 'required|file|max:4100',
        ]);

        try {
            DB::transaction(function () use ($request, $payment) {
                $payment->update($request->all());

                $newAttachments = collect();

                if ($request->hasFile('attachments')) {
                    foreach ($request->file('attachments') as $attachment) {
                        $media = $payment->addMedia($attachment)->toMediaCollection('attachments', 'local');

                        $newAttachments->push($media);
                    }
                }

                $payment->clearMediaCollectionExcept('attachments', $newAttachments);
            });

            return redirect()->back()->with('success', 'Ubah data pembayaran berhasil. ');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ubah data pembayaran gagal. '.$th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->back()->with('success', 'Hapus data pembayaran berhasil. ');
    }
}
