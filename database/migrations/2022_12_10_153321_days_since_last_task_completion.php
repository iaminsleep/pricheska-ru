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
            CREATE VIEW days_since_last_task_completion AS
                SELECT
                    `users`.`id` AS `user_id`,
                    MIN(`days_since_every_task_completion`) AS `days_since_last_task_completion`
                FROM
                    (`days_since_every_task_completion`
                        JOIN `tasks` ON ((`tasks`.`id` = `days_since_every_task_completion`.`task_id`))
                        JOIN `users` ON ((`tasks`.`performer_id` = `users`.`id`))
                    )
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

            DROP VIEW IF EXISTS `days_since_last_task_completion`;

            SQL;
    }
};
