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
            CREATE VIEW completed_tasks_count AS
                SELECT
                    `users`.`id` AS `user_id`,
                    COUNT(`tasks`.`id`) AS `completed_tasks_count`
                FROM
                    (`tasks`
                    JOIN `users` ON ((`tasks`.`performer_id` = `users`.`id`)))
                WHERE `tasks`.`status_id` = 2
                GROUP BY `users`.`id`
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

            DROP VIEW IF EXISTS `completed_tasks_count`;

            SQL;
    }
};
