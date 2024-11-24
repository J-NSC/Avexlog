<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

class ImpersonateController extends Controller
{
    public function __invoke(User $user)
    {
        abort_if(!auth()->user()->hasRole('super_admin'), 404);

        session()->put('impersonate', $user->id);

        return to_route('dashboard');
    }
}
