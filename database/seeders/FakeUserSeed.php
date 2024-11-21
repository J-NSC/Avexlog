<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FakeUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Teste',
            'email' => 'teste@user.com',
            'password' => Hash::make('password@'),
            'cpf' => '04321958441',
            'phone' => '93992198198'
        ])->assignRole('super_admin');
    }
}
