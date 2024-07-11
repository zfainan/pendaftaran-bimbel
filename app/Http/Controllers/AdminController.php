<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Admin::with('user')->latest()->paginate();

        return view('admins.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $admin = Admin::create([
                    'nama' => $request->input('nama'),
                    'no_telp' => $request->input('no_telp'),
                ]);

                $user = new User();
                $user->fill([
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                ]);
                $user->userable()->associate($admin);
                $user->save();
            });

            return redirect(route('admins.index'))->with('success', 'Tambah data berhasil.');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', 'Tambah data gagal.' . $th->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        try {
            DB::transaction(function () use ($request, $admin) {
                $admin->update([
                    'nama' => $request->input('nama', $admin->nama),
                    'no_telp' => $request->input('no_telp', $admin->no_telp),
                ]);

                $admin->user->update([
                    'email' => $request->input('email', $admin->user->email),
                ]);

                if ($request->filled('password')) {
                    $admin->user->update([
                        'password' => Hash::make($request->input('password')),
                    ]);
                }
            });

            return redirect(route('admins.index'))->with('success', 'Ubah data berhasil.');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', 'Ubah data gagal.' . $th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        try {
            DB::transaction(function () use ($admin) {
                $admin->user->delete();
                $admin->delete();
            });

            return redirect(route('admins.index'))->with('success', 'Hapus data berhasil.');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', 'Hapus data gagal.' . $th->getMessage())->withInput();
        }
    }
}
