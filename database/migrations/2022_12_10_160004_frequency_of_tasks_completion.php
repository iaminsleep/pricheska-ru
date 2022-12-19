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
            CREATE VIEW frequency_of_tasks_completion AS
                SELECT
                    `date_of_every_completion`.`performer_id` AS `performer_id`,
                    AVG(CAST(DATEDIFF(`order_number_edit`.`completion_date`, `date_of_every_completion`.`completion_date`) AS DEC(7, 4))) AS `frequency_of_tasks_completion`
                FROM
                    (`date_of_every_completion`
                    JOIN `order_number_edit` ON ((`date_of_every_completion`.`performer_id` = `order_number_edit`.`performer_id`) AND
                    `date_of_every_completion`.`order_number` = `order_number_edit`.`order_number_edit`))
                GROUP BY `date_of_every_completion`.`performer_id`
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

            DROP VIEW IF EXISTS `frequency_of_tasks_completion`;

            SQL;
    }
};
