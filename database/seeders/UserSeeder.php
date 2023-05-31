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
        // 2, 5, 6, 7, 8 - hairdressers

        $admin = Role::where('codename', 'admin')->first();
        $customer = Role::where('codename', 'customer')->first();
        $hairdresser = Role::where('codename', 'hairdresser')->first();

        // $manageEverything = Permission::where('codename', 'manage-everything')->first();
        // $createTasks = Permission::where('codename', 'create-task')->first();
        // $createBlog = Permission::where('codename', 'create-blog')->first();

        $user0 = new User();
        $user0->name = 'Миронов Алексей';
        $user0->description = 'Ничто так не стимулирует на уборку, как слова людей: ‘Через полчасика… Мы у тебя…’';
        $user0->email = 'admin@email.com';
        $user0->password = bcrypt('admin');
        $user0->avatar = 'avatar-1.png';
        $user0->last_seen = (new \DateTime())->format("Y-m-d H:i:s");
        $user0->save();
        $user0->roles()->attach($admin);
        // $user0->permissions()->attach($manageEverything);

        $user1 = new User();
        $user1->name = 'Астахов Павел';
        $user1->description = 'Всегда друзей душевно принимаю, мы праздник отмечаем на ура! Но лишь наутро понимаю, как упоительны в России вечера…';
        $user1->email = 'pavel@email.com';
        $user1->password = bcrypt('password@');
        $user1->avatar = 'avatar-2.png';
        $user1->last_seen = (new \DateTime())->format("Y-m-d H:i:s");
        $user1->save();
        $user1->roles()->attach($hairdresser);
        // $user1->permissions()->attach($createTasks);

        $user2 = new User();
        $user2->name = 'Диана Волкова';
        $user2->description = 'Только враги говорят друг другу правду. Друзья и возлюбленные, запутавшись в паутине взаимного долга, врут бесконечно…';
        $user2->email = 'diana@email.com';
        $user2->password = bcrypt('password@');
        $user2->avatar = 'avatar-3.png';
        $user2->last_seen = (new \DateTime())->format("Y-m-d H:i:s");
        $user2->save();
        $user2->roles()->attach($customer);
        // $user2->permissions()->attach($createBlog);

        $user3 = new User();
        $user3->name = 'Кирилл Крючков';
        $user3->description = 'Сегодня шеф собрал всeх и позвонил каждому со своeго мобильника. Внимательно прослушал мелодии, которыe мы установили на eго вызов… Премии не будет.';
        $user3->email = 'kirill@email.com';
        $user3->password = bcrypt('password@');
        $user3->avatar = 'avatar-4.png';
        $user3->last_seen = (new \DateTime())->format("Y-m-d H:i:s");
        $user3->save();
        $user3->roles()->attach($customer);
        // $user2->permissions()->attach($createBlog);

        $user4 = new User();
        $user4->name = 'Стас Устинов';
        $user4->description = 'Есть три ловушки, которые вoруют радость и миp: сoжаление о прошлом, тревога за будущeе и неблагодарность за настоящее.';
        $user4->email = 'stas@email.com';
        $user4->password = bcrypt('password@');
        $user4->avatar = 'avatar-5.png';
        $user4->last_seen = (new \DateTime())->format("Y-m-d H:i:s");
        $user4->save();
        $user4->roles()->attach($hairdresser);

        $user5 = new User();
        $user5->name = 'Макеева Юлия';
        $user5->description = 'Давать шансы человеку, который вас предал, наверное, тоже самое, что дать вторую пулю тому, кто первый раз в вас не попал.';
        $user5->email = 'yuliya@email.com';
        $user5->password = bcrypt('password@');
        $user5->avatar = 'avatar-6.png';
        $user5->last_seen = (new \DateTime())->format("Y-m-d H:i:s");
        $user5->save();
        $user5->roles()->attach($hairdresser);

        $user6 = new User();
        $user6->name = 'Титов Тимур';
        $user6->email = 'timur@email.com';
        $user6->description = 'Обидно, когда люди своим поведением, своими словами постепенно убивают в нас всё хорошее, что мы испытывали к ним.';
        $user6->password = bcrypt('password@');
        $user6->avatar = 'avatar-7.png';
        $user6->last_seen = (new \DateTime())->format("Y-m-d H:i:s");
        $user6->save();
        $user6->roles()->attach($hairdresser);

        $user7 = new User();
        $user7->name = 'Майорова Яна';
        $user7->description = 'Никто тебе не друг, никто тебе не враг, но каждый для тебя учитель.';
        $user7->email = 'yana@email.com';
        $user7->password = bcrypt('password@');
        $user7->avatar = 'avatar-8.png';
        $user7->last_seen = (new \DateTime())->format("Y-m-d H:i:s");
        $user7->save();
        $user7->roles()->attach($hairdresser);

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
