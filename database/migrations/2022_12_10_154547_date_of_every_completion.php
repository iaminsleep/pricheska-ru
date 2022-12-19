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
            CREATE VIEW date_of_every_completion AS
                SELECT
                    `tasks`.`performer_id` AS `performer_id`,
                    `tasks`.`completed_at` AS `completion_date`,
                    ROW_NUMBER() OVER (ORDER BY `tasks`.`performer_id`, `tasks`.`completed_at`) AS `order_number`
                FROM `tasks`
                ORDER BY `tasks`.`performer_id`, `tasks`.`completed_at`
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

            DROP VIEW IF EXISTS `date_of_every_completion`;

            SQL;
    }
};
