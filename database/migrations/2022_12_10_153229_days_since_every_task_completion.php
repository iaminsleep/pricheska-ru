<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->dropView());
        \DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->dropView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function createView(): string
    {
        return <<<SQL
            CREATE VIEW days_since_every_task_completion AS
                SELECT
                    `tasks`.`id` AS `task_id`,
                    `tasks`.`completed_at` AS `completion_date`,
                    DATEDIFF({ fn NOW() }, tasks.completed_at) AS `days_since_every_task_completion`
                FROM
                    (`tasks`
                    JOIN `users` ON ((`tasks`.`performer_id` = `users`.`id`)))
                WHERE `tasks`.`status_id` = 2
                GROUP BY `tasks`.`id`, `tasks`.`completed_at`
            SQL;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function dropView(): string
    {
        return <<<SQL

            DROP VIEW IF EXISTS `days_since_every_task_completion`;

            SQL;
    }
};
