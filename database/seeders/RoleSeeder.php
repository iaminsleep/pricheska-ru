<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = 'Админ';
        $admin->slug = 'admin';
        $admin->save();

        $user = new Role();
        $user->name = 'Пользователь';
        $user->slug = 'polzovatel';
        $user->save();

        $hairdresser = new Role();
        $hairdresser->name = 'Парикмахер';
        $hairdresser->slug = 'parikmaher';
        $hairdresser->save();
    }
}
