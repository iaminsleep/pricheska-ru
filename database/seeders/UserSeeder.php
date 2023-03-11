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
        $user0->name = 'Миронов Алексей';
        $user0->email = 'admin@email.com';
        $user0->password = bcrypt('admin');
        $user0->avatar = 'avatar-1.png';
        $user0->last_seen = (new \DateTime())->format("Y-m-d H:i:s");
        $user0->save();
        $user0->roles()->attach($admin);
        // $user0->permissions()->attach($manageEverything);

        $user1 = new User();
        $user1->name = 'Астахов Павел';
        $user1->email = 'pavel@email.com';
        $user1->password = bcrypt('password@');
        $user1->avatar = 'avatar-2.png';
        $user1->last_seen = (new \DateTime())->format("Y-m-d H:i:s");
        $user1->save();
        $user1->roles()->attach($hairdresser);
        // $user1->permissions()->attach($createTasks);

        $user2 = new User();
        $user2->name = 'Диана Волкова';
        $user2->email = 'diana@email.com';
        $user2->password = bcrypt('password@');
        $user2->avatar = 'avatar-3.png';
        $user2->last_seen = (new \DateTime())->format("Y-m-d H:i:s");
        $user2->save();
        $user2->roles()->attach($customer);
        // $user2->permissions()->attach($createBlog);

        $user3 = new User();
        $user3->name = 'Кирилл Крючков';
        $user3->email = 'kirill@email.com';
        $user3->password = bcrypt('password@');
        $user3->avatar = 'avatar-4.png';
        $user3->last_seen = (new \DateTime())->format("Y-m-d H:i:s");
        $user3->save();
        $user3->roles()->attach($customer);
        // $user2->permissions()->attach($createBlog);

        $user4 = new User();
        $user4->name = 'Стас Устинов';
        $user4->email = 'stas@email.com';
        $user4->password = bcrypt('password@');
        $user4->avatar = 'avatar-5.png';
        $user4->last_seen = (new \DateTime())->format("Y-m-d H:i:s");
        $user4->save();
        $user4->roles()->attach($hairdresser);

        $user5 = new User();
        $user5->name = 'Морозова Евгения';
        $user5->email = 'evgeniya@email.com';
        $user5->password = bcrypt('password@');
        $user5->avatar = 'avatar-6.png';
        $user5->last_seen = (new \DateTime())->format("Y-m-d H:i:s");
        $user5->save();
        $user5->roles()->attach($hairdresser);

        // if (Storage::exists('users')) {
        //     $path = public_path('uploads').'/users';
        //     delete_folder($path);
        // }

        // $roles_id = Role::whereNot('codename', 'admin')->pluck('id');
        // // $users = User::factory(20)->create();

        // $users->each(function ($user) use ($roles_id) {
        //     $user->roles()->attach($roles_id->random(1));
        // });
    }
}
