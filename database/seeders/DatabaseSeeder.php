<?php

namespace Database\Seeders;

use App\Models\Story;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $this->Seed_Admin_NormalUser();

        $this->call(CategorySeeder::class);

        $this->createUserWithDummyStories();

        Schema::enableForeignKeyConstraints();

    }

    /*
     |------------------------------
     | PRIVATE METHODS
     |------------------------------
     |
     |
     |
     */


    private function Seed_Admin_NormalUser()
    {
        User::query()
            ->truncate();

        $this->call(UserSeeder::class);
    }


    private function createUserWithDummyStories(): void
    {
        Story::query()
             ->truncate();

        User::factory(rand(3, 5))
            ->hasStories(rand(5, 10))
            ->create();
    }


}
