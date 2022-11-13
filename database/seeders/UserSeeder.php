<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('slug', 'admin')->first();
        $user = Role::where('slug', 'user')->first();
        $hairdresser = Role::where('slug', 'hairdresser')->first();

        $manageEverything = Permission::where('slug', 'manage-everything')->first();
        $createTasks = Permission::where('slug', 'create-task')->first();
        $createBlog = Permission::where('slug', 'create-blog')->first();

        $user0 = new User();
        $user0->name = 'Admin';
        $user0->email = 'admin@email.com';
        $user0->password = bcrypt('admin');
        $user0->save();
        $user0->roles()->attach($admin);
        $user0->permissions()->attach($manageEverything);

        $user1 = new User();
        $user1->name = 'John Doe';
        $user1->email = 'johndoe@email.com';
        $user1->password = bcrypt('johndoe');
        $user1->save();
        $user1->roles()->attach($user);
        $user1->permissions()->attach($createTasks);

        $user2 = new User();
        $user2->name = 'Mike Thomas';
        $user2->email = 'mikethomas@email.com';
        $user2->password = bcrypt('mikethomas');
        $user2->save();
        $user2->roles()->attach($hairdresser);
        $user2->permissions()->attach($createBlog);
    }
}