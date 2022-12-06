<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
        $admin = Role::where('codename', 'admin')->first();
        $customer = Role::where('codename', 'customer')->first();
        $hairdresser = Role::where('codename', 'hairdresser')->first();

        // $manageEverything = Permission::where('codename', 'manage-everything')->first();
        // $createTasks = Permission::where('codename', 'create-task')->first();
        // $createBlog = Permission::where('codename', 'create-blog')->first();

        $user0 = new User();
        $user0->name = 'Admin';
        $user0->email = 'admin@email.com';
        $user0->password = bcrypt('admin');
        $user0->save();
        $user0->roles()->attach($admin);
        // $user0->permissions()->attach($manageEverything);

        $user1 = new User();
        $user1->name = 'John Doe';
        $user1->email = 'johndoe@email.com';
        $user1->password = bcrypt('johndoe');
        $user1->save();
        $user1->roles()->attach($customer);
        // $user1->permissions()->attach($createTasks);

        $user2 = new User();
        $user2->name = 'Mike Thomas';
        $user2->email = 'mikethomas@email.com';
        $user2->password = bcrypt('mikethomas');
        $user2->save();
        $user2->roles()->attach($hairdresser);
        // $user2->permissions()->attach($createBlog);

        $user3 = new User();
        $user3->name = 'David Bay';
        $user3->email = 'davidbay@email.com';
        $user3->password = bcrypt('davidbay');
        $user3->save();
        $user3->roles()->attach($hairdresser);
        // $user2->permissions()->attach($createBlog);

        if (Storage::exists('users')) {
            $path = public_path('uploads').'/users';
            delete_folder($path);
        }

        $roles_id = Role::whereNot('codename', 'admin')->pluck('id');
        $users = User::factory(20)->create();

        $users->each(function ($user) use ($roles_id) {
            $user->roles()->attach($roles_id->random(1));
        });
    }
}
