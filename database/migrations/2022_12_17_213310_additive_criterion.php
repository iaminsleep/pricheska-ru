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
        $average_rating_importance = 2;
        $completed_tasks_count_importance = 0.3;
        $frequency_importance = -0.2;
        $feedbacks_count_importance = 0.3;
        $days_importance = -0.1;

        return <<<SQL
            CREATE VIEW additive_criterion AS
                SELECT `users`.`id` as `user_id`, (
                    ($average_rating_importance * `normalization_average_rating`.`normalization_average_rating`) +
                    ($completed_tasks_count_importance * `normalization_completed_tasks_count`.`normalization_completed_tasks_count`) +
                    ($frequency_importance * `normalization_frequency_of_tasks_completion`.`normalization_frequency_of_tasks_completion`) +
                    ($feedbacks_count_importance * `normalization_feedbacks_count`.`normalization_feedbacks_count`) +
                    ($days_importance * `normalization_days_since_last_task_completion`.`normalization_days_since_last_task_completion`)
                ) AS `additive_criterion`
                FROM (`users`
                    LEFT JOIN `normalization_average_rating` ON (`normalization_average_rating`.`user_id` = `users`.`id`)
                    LEFT JOIN `normalization_completed_tasks_count` ON (`normalization_completed_tasks_count`.`user_id` = `users`.`id`)
                    LEFT JOIN `normalization_frequency_of_tasks_completion` ON (`normalization_frequency_of_tasks_completion`.`user_id` = `users`.`id`)
                    LEFT JOIN `normalization_feedbacks_count` ON (`normalization_feedbacks_count`.`user_id` = `users`.`id`)
                    LEFT JOIN `normalization_days_since_last_task_completion` ON (`normalization_days_since_last_task_completion`.`user_id` = `users`.`id`)
                )
                ORDER BY `users`.`id`
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

            DROP VIEW IF EXISTS `additive_criterion`;

            SQL;
    }
};
