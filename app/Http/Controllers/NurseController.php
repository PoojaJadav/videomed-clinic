<?php

namespace App\Http\Controllers;

use App\Models\User;

class NurseController extends Controller
{
    public function index()
    {
        $this->authorize('nurseViewAny', User::class);

        return view('nurses.index');
    }

    public function show(User $user)
    {
        $this->authorize('nurseView', $user);

        return view('nurses.show', compact('user'));
    }
}
