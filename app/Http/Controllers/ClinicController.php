<?php

namespace App\Http\Controllers;

use App\Models\Clinic;

class ClinicController extends Controller
{
    public function __invoke(Clinic $clinic)
    {
        $this->authorize('update', $clinic);

        return view('clinics.edit', compact('clinic'));
    }
}
