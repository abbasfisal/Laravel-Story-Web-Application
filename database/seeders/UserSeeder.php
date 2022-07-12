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
                'avatar'   => null,
                'email_verified_at' => now(),
                'password' => Hash::make('123456'),
            ]);

        User::query()
            ->create([
                'name'     => 'aliReza',
                'email'    => 'alireza@a.b',
                'username' => 'aliReza110',
                'type'     => User::TYPE_USER,
                'avatar'   => null,
                'email_verified_at' => now(),
                'password' => Hash::make('123456'),
            ]);


        $this->showSeedInTableCLI();
    }

    private function showSeedInTableCLI()
    {
        $header = ['#', 'email', 'password', 'type'];
        $body = ['#' => '1', 'email' => 'admin@a.b', 'password' => '123456', 'type' => 'admin'];
        $body = ['#' => '2', 'email' => 'alireza@a.b', 'password' => '123456', 'type' => 'user'];

        $this->command->table($header, [$body]);

    }
}
