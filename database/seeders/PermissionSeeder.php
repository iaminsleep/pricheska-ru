<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manageEverything = new Permission();
        $manageEverything->name = 'Управлять всем';
        $manageEverything->slug = 'upravlyat-vsem';
        $manageEverything->save();

        $manageUser = new Permission();
        $manageUser->name = 'Создать задание';
        $manageUser->slug = 'sozdat-zadanie';
        $manageUser->save();

        $createTasks = new Permission();
        $createTasks->name = 'Создать блог';
        $createTasks->slug = 'sozdat-blog';
        $createTasks->save();
    }
}
