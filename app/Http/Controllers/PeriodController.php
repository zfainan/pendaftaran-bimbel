<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Period;
use App\Models\Program;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Program $program)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Program $program)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Program $program)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program, Period $period)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program, Period $period)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program, Period $period)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program, Period $period)
    {
        //
    }
}
