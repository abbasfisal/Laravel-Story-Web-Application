<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->createAdmin();

    }

    private function createAdmin()
    {

        $this->DeleteAdmin();

        $this->call(UserSeeder::class);

        $this->createAdminTableCommand();

    }

    private function DeleteAdmin(): void
    {
        $u = User::query()
                 ->where([
                     'name'     => 'admin',
                     'email'    => 'admin@a.b',
                     'username' => 'admin',
                     'avatar'   => '',
                 ])
                 ->first();
        $u->delete();
    }

    private function createAdminTableCommand(): void
    {
        $header = ['#', 'email', 'password', 'type'];
        $body = ['#' => '1', 'email' => 'admin@a.b', 'password' => '123456', 'type' => 'admin'];

        $this->command->table($header, [$body]);
    }
}
