<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $programs = Program::all();

        return view('landing', compact('programs'));
    }
}
