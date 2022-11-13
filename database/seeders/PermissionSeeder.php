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
        $manageEverything->slug = 'manage-everything';
        $manageEverything->save();

        $manageUser = new Permission();
        $manageUser->name = 'Создать задание';
        $manageUser->slug = 'create-task';
        $manageUser->save();

        $createTasks = new Permission();
        $createTasks->name = 'Создать блог';
        $createTasks->slug = 'create-blog';
        $createTasks->save();
    }
}
