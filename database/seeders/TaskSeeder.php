<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $tasks = [
            [
                'id' => 1,
                'title' => 'Перевести войну и мир на клингонский',
                'description' => 'Перевести книгу, срок - месяц.',
                'category_id' => 3,
                'city_id' => 1,
                'user_id' => 1,
                'location' => 'Востряковский проезд, 17 к 4',
                'budget' => 35000,
                'performer_id' => 4,
                'deadline' => now()->addSeconds(2592000), //30 days
                'status_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Убраться в квартире после вписки',
                'description' => 'Предупреждаю, вас будет ждать не самое приятное зрелище. Щедрая оплата за выполненую работу.',
                'category_id' => 1,
                'city_id' => 2,
                'user_id' => 2,
                'location' => 'Улица Салова, 57 к 5',
                'budget' => 3500,
                'performer_id' => 3,
                'deadline' => now()->addSeconds(86400), //1 day
                'status_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'title' => 'Перевезти груз на новое место',
                'description' => 'Срочно! Товары должны быть в полной сохранности по время перевозки! Возможны чаевые! Потребуется грузовик с вместимостью не меньше 750кг.',
                'category_id' => 4,
                'city_id' => 3,
                'user_id' => 5,
                'location' => 'Российская улица, 72/1 к 1',
                'budget' => 4000,
                'performer_id' => 2,
                'deadline' => now()->addSeconds(86400), //1 day
                'status_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 4,
                'title' => 'Удалить вирусы на ноутбуке',
                'description' => 'На сайте увидела, что я выиграла в лотерею. Для получения выигрыша нужно было скачать программу, я её скачала, но после этого у ноутбука намертво завис экран. Есть здесь программисты которые смогут помочь?!',
                'category_id' => 2,
                'city_id' => 4,
                'user_id' => 3,
                'location' => 'Улица Карла Либкнехта, 153',
                'budget' => 1700,
                'performer_id' => 1,
                'deadline' => now()->addSeconds(2592000), //30 days
                'status_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 5,
                'title' => 'Провести фотосессию на день рождения',
                'description' => 'Требуется опытный фотограф на день рождения моего сына, со стажем работы не меньше 3-ёх лет. За идеальную работу возможна доплата.',
                'category_id' => 5,
                'city_id' => 5,
                'user_id' => 5,
                'location' => 'Проспект Красного Знамени, 114',
                'budget' => 4500,
                'performer_id' => null,
                'deadline' => now()->addSeconds(604800), //7 days
                'status_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 6,
                'title' => 'Починить дверь в автомобиле',
                'description' => 'Попал в небольшое ДТП, отвалилась дверь. Сдавать в сервисный центр будет дорого, может кто-то сможет прикрутить её обратно? Деньгами не обижу!',
                'category_id' => 6,
                'city_id' => 6,
                'user_id' => 6,
                'location' => 'Улица Фрунзе, 38',
                'budget' => 10000,
                'performer_id' => null,
                'deadline' => now()->addSeconds(604800), //7 days
                'status_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 7,
                'title' => 'Покрасить стены в комнате',
                'description' => 'Требуется опытный маляр, который сможет покрасить стены в небольшой комнатке.',
                'category_id' => 7,
                'city_id' => 7,
                'user_id' => 7,
                'location' => 'Переулок Островского, 1 А',
                'budget' => 6000,
                'performer_id' => null,
                'deadline' => now()->addSeconds(432000), //5 days
                'status_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 8,
                'title' => 'Сделать маникюр',
                'description' => 'Делаю маникюр в первый раз, хочу покрасить ногти в цвет малахита.',
                'category_id' => 8,
                'city_id' => 8,
                'user_id' => 3,
                'location' => 'Путевая улица, 8 В',
                'budget' => 1900,
                'performer_id' => null,
                'deadline' => now()->addSeconds(259200), //3 days
                'status_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 9,
                'title' => 'Доставить пряники в детский сад',
                'description' => 'Внимание! Очень хрупкий товар. Требуется аккуратный пеший курьер, который сможет доставить посылку без повреждений. Можно доставить и на велосипеде, но с гарантией безопасности от курьера.',
                'category_id' => 9,
                'city_id' => 2,
                'user_id' => 2,
                'location' => 'Гатчинское шоссе, 6 к 3',
                'budget' => 800,
                'performer_id' => null,
                'deadline' => now()->addSeconds(86400), //1 day
                'status_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 10,
                'title' => 'Тамада на свадьбу',
                'description' => 'Ищу весёлого, энергичного и обаятельного ведущего на свадьбу, который будет проводить конкурсы, говорить тосты и развлекать гостей! Деньги плачу большие, с вас главное - выложиться на все 100% и провести идеальную свадьбу!',
                'category_id' => 5,
                'city_id' => 1,
                'user_id' => 1,
                'location' => 'Михневская улица, 8',
                'budget' => 19000,
                'performer_id' => null,
                'deadline' => now()->addSeconds(2592000), //30 days
                'status_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 11,
                'title' => 'Привезти мебель на дом',
                'description' => 'Заказали товары из Leroy Merlen, но своей машины нет, да и если бы была, то два дивана и шкаф не поместились бы. Ищем водителя с грузовиком, который сможет доставить всё это в наш дом.',
                'category_id' => 4,
                'city_id' => 4,
                'user_id' => 4,
                'location' => 'Улица Набережная Иркута, 1',
                'budget' => 3400,
                'performer_id' => null,
                'deadline' => now()->addSeconds(172800), //2 days
                'status_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 12,
                'title' => 'Празднование ДР',
                'description' => 'Моему другу нужно устроить день рождения, который он никогда не забудет.',
                'category_id' => 5,
                'city_id' => 5,
                'user_id' => 5,
                'location' => 'Улица Адмирала Кузнецова, 92',
                'budget' => 8100,
                'performer_id' => 1,
                'deadline' => now()->addSeconds(2592000), //30 days
                'status_id' => 2,
                'created_at' => now(),
            ],
            [
                'id' => 13,
                'title' => 'Убраться в квартире',
                'description' => 'Моей хате давно нужна генеральная уборка. В наличии есть только пылесос.',
                'category_id' => 1,
                'city_id' => 6,
                'user_id' => 6,
                'location' => 'Улица Героев Рыбачьего, 9',
                'budget' => 4480,
                'performer_id' => 2,
                'deadline' => now()->addSeconds(432000), //5 days
                'status_id' => 3,
                'created_at' => now(),
            ],
            [
                'id' => 14,
                'title' => 'Офисный переезд',
                'description' => 'Требуется перевезти офисную мебель и технику из расчета 5 сотрудников',
                'category_id' => 4,
                'city_id' => 7,
                'user_id' => 7,
                'location' => 'Улица Вересаева, 101/3 с 1',
                'budget' => 12200,
                'performer_id' => 3,
                'deadline' => now()->addSeconds(259200), //3 days
                'status_id' => 2,
                'created_at' => now(),
            ],
            [
                'id' => 15,
                'title' => 'Подключить принтер',
                'description' => 'Необходимо подключить старый матричный принтер, у него еще LPT порт…',
                'category_id' => 2,
                'city_id' => 8,
                'user_id' => 4,
                'location' => 'Отрадный переулок, 19 Б',
                'budget' => 3850,
                'performer_id' => 6,
                'deadline' => now()->addSeconds(86400), //1 day
                'status_id' => 2,
                'created_at' => now(),
            ],
        ];
        DB::table('tasks')->insert($tasks);
    }
}
