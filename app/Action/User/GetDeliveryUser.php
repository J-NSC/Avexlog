<?php

namespace App\Actions\User;

use App\Action\User\GetUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class GetDeliveryUser extends GetUser
{
    public function get(): Builder
    {
        return User::query();
    }
}
