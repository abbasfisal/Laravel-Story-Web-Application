<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()
            ->create([
                'name'     => 'admin',
                'email'    => 'admin@a.b',
                'username' => 'admin',
                'type'     => User::TYPE_ADMIN,
                'avatar'   => '',
                'password' => Hash::make('123456'),
            ]);
    }
}
