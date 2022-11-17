<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Main
        $this->call(RoleSeeder::class);
        // $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TagSeeder::class);
        // Service Section
        $this->call(CategorySeeder::class);
        // Blog Section
        $this->call(BlogCategorySeeder::class);
    }
}
