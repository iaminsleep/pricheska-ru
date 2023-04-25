<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            // 1st user
                [
                    'user_id' => 2,
                    'category_id' => 1,
                    'name' => 'Фейд',
                    'description' => 'Стрижка, при которой создается нечеткий переход от коротких волос на затылке до любой желаемой длины на макушке.',
                    'price' => 400,
                    'image' => 'task/images/1.jpg',
                    'created_at' => now(),
                ],
                [
                    'user_id' => 2,
                    'category_id' => 1,
                    'name' => 'Ястреб',
                    'description' => 'Фишка мужской стрижки “ястреб” — это многотекстурный вид и длина волос, которые идут от короткого до более длинного спереди.',
                    'price' => 700,
                    'image' => 'task/images/5.jpg',
                    'created_at' => now(),
                ],
                [
                    'user_id' => 2,
                    'category_id' => 1,
                    'name' => 'Андеркат',
                    'description' => 'Представляет собой короткие виски и удлинённый аккуратный верх. Но отличительная черта — отсутствие плавности. Верхние длинные волосы как бы шапкой накрывают короткую височную часть головы.',
                    'price' => 500,
                    'image' => 'task/images/7.jpg',
                    'created_at' => now(),
                ],
                [
                    'user_id' => 2,
                    'category_id' => 2,
                    'name' => 'Квифф',
                    'description' => 'Это причёска средней длины, благодаря объёму, необходимому на верхней части головы.',
                    'price' => 900,
                    'image' => 'task/images/10.jpg',
                    'created_at' => now(),
                ],
                // 2nd user
                [
                    'user_id' => 5,
                    'category_id' => 1,
                    'name' => 'Фейд',
                    'description' => 'Стрижка, при которой создается нечеткий переход от коротких волос на затылке до любой желаемой длины на макушке.',
                    'price' => 400,
                    'image' => 'task/images/1.jpg',
                    'created_at' => now(),
                ],
                [
                    'user_id' => 5,
                    'category_id' => 1,
                    'name' => 'Ястреб',
                    'description' => 'Фишка мужской стрижки “ястреб” — это многотекстурный вид и длина волос, которые идут от короткого до более длинного спереди.',
                    'price' => 700,
                    'image' => 'task/images/5.jpg',
                    'created_at' => now(),
                ],
                [
                    'user_id' => 5,
                    'category_id' => 1,
                    'name' => 'Андеркат',
                    'description' => 'Представляет собой короткие виски и удлинённый аккуратный верх. Но отличительная черта — отсутствие плавности. Верхние длинные волосы как бы шапкой накрывают короткую височную часть головы.',
                    'price' => 500,
                    'image' => 'task/images/7.jpg',
                    'created_at' => now(),
                ],
                [
                    'user_id' => 5,
                    'category_id' => 2,
                    'name' => 'Квифф',
                    'description' => 'Это причёска средней длины, благодаря объёму, необходимому на верхней части головы.',
                    'price' => 900,
                    'image' => 'task/images/10.jpg',
                    'created_at' => now(),
                ],
                // 3rd user
                [
                    'user_id' => 6,
                    'category_id' => 1,
                    'name' => 'Фейд',
                    'description' => 'Стрижка, при которой создается нечеткий переход от коротких волос на затылке до любой желаемой длины на макушке.',
                    'price' => 400,
                    'image' => 'task/images/1.jpg',
                    'created_at' => now(),
                ],
                [
                    'user_id' => 6,
                    'category_id' => 1,
                    'name' => 'Ястреб',
                    'description' => 'Фишка мужской стрижки “ястреб” — это многотекстурный вид и длина волос, которые идут от короткого до более длинного спереди.',
                    'price' => 700,
                    'image' => 'task/images/5.jpg',
                    'created_at' => now(),
                ],
                [
                    'user_id' => 6,
                    'category_id' => 1,
                    'name' => 'Андеркат',
                    'description' => 'Представляет собой короткие виски и удлинённый аккуратный верх. Но отличительная черта — отсутствие плавности. Верхние длинные волосы как бы шапкой накрывают короткую височную часть головы.',
                    'price' => 500,
                    'image' => 'task/images/7.jpg',
                    'created_at' => now(),
                ],
                [
                    'user_id' => 6,
                    'category_id' => 2,
                    'name' => 'Квифф',
                    'description' => 'Это причёска средней длины, благодаря объёму, необходимому на верхней части головы.',
                    'price' => 900,
                    'image' => 'task/images/10.jpg',
                    'created_at' => now(),
                ],
                // 4th user
                [
                    'user_id' => 7,
                    'category_id' => 1,
                    'name' => 'Фейд',
                    'description' => 'Стрижка, при которой создается нечеткий переход от коротких волос на затылке до любой желаемой длины на макушке.',
                    'price' => 400,
                    'image' => 'task/images/1.jpg',
                    'created_at' => now(),
                ],
                [
                    'user_id' => 7,
                    'name' => 'Ястреб',
                    'category_id' => 1,
                    'description' => 'Фишка мужской стрижки “ястреб” — это многотекстурный вид и длина волос, которые идут от короткого до более длинного спереди.',
                    'price' => 700,
                    'image' => 'task/images/5.jpg',
                    'created_at' => now(),
                ],
                [
                    'user_id' => 7,
                    'name' => 'Андеркат',
                    'category_id' => 1,
                    'description' => 'Представляет собой короткие виски и удлинённый аккуратный верх. Но отличительная черта — отсутствие плавности. Верхние длинные волосы как бы шапкой накрывают короткую височную часть головы.',
                    'price' => 500,
                    'image' => 'task/images/7.jpg',
                    'created_at' => now(),
                ],
                [
                    'user_id' => 7,
                    'name' => 'Квифф',
                    'category_id' => 2,
                    'description' => 'Это причёска средней длины, благодаря объёму, необходимому на верхней части головы.',
                    'price' => 900,
                    'image' => 'task/images/10.jpg',
                    'created_at' => now(),
                ],
                // 5th user
                [
                    'user_id' => 8,
                    'category_id' => 1,
                    'name' => 'Фейд',
                    'description' => 'Стрижка, при которой создается нечеткий переход от коротких волос на затылке до любой желаемой длины на макушке.',
                    'price' => 400,
                    'image' => 'task/images/1.jpg',
                    'created_at' => now(),
                ],
                [
                    'user_id' => 8,
                    'category_id' => 1,
                    'name' => 'Ястреб',
                    'description' => 'Фишка мужской стрижки “ястреб” — это многотекстурный вид и длина волос, которые идут от короткого до более длинного спереди.',
                    'price' => 700,
                    'image' => 'task/images/5.jpg',
                    'created_at' => now(),
                ],
                [
                    'user_id' => 8,
                    'category_id' => 1,
                    'name' => 'Андеркат',
                    'description' => 'Представляет собой короткие виски и удлинённый аккуратный верх. Но отличительная черта — отсутствие плавности. Верхние длинные волосы как бы шапкой накрывают короткую височную часть головы.',
                    'price' => 500,
                    'image' => 'task/images/7.jpg',
                    'created_at' => now(),
                ],
                [
                    'user_id' => 8,
                    'category_id' => 2,
                    'name' => 'Квифф',
                    'description' => 'Это причёска средней длины, благодаря объёму, необходимому на верхней части головы.',
                    'price' => 900,
                    'image' => 'task/images/10.jpg',
                    'created_at' => now(),
                ],
            ];

        DB::table('services')->insert($services);

    }
}
