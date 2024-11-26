<?php

namespace App\Services\User;

use App\Models\Advance\AdvanceRequest;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function getFilteredAdvanceRequests()
    {
        $user = Auth::user();

        $query = AdvanceRequest::query();

        if ($user && $user->hasRole('delivery_driver')) {
            $query->where('user_id', $user->id);
        }

        return $query;
    }
}
