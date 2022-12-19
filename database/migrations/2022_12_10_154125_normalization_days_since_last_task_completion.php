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
            CREATE VIEW normalization_days_since_last_task_completion AS
                SELECT `days_since_last_task_completion`.`user_id`,
                `days_since_last_task_completion`.`days_since_last_task_completion` / `max_days_since_last_task_completion`.`max_days_since_last_task_completion` AS `normalization_days_since_last_task_completion`
                FROM `days_since_last_task_completion` CROSS JOIN `max_days_since_last_task_completion`
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

            DROP VIEW IF EXISTS `normalization_days_since_last_task_completion`;

            SQL;
    }
};
