<?php

namespace App\Action\User;
use App\Actions\User\GetDeliveryUser;
use App\Actions\User\GetUsers;
use App\Actions\User\GetUsersAll;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Role;
use function Pest\Laravel\get;

abstract class GetUser
{
    protected abstract function get(): Builder;

    protected static function getInstance(): GetUser{
        return match (auth()->user()->roles[0]->name) {
            User::role('super_admin') , User::role('admin') => new GetUsersAll(),
            User::role('delivery_driver') => new GetDeliveryUser()

        };
    }
}
