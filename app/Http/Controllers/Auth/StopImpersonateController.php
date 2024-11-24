<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class StopImpersonateController extends Controller
{
    public function __invoke()
    {
        session()->forget('impersonate');

        return to_route('dashboard');
    }
}
