<?php

namespace App\Traits;

use App\Models\Task\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

trait HasHairdresserRole
{
    public function scopeAverageRating()
    {
        $result = DB::table('feedbacks')
            ->select(DB::raw('ROUND(AVG(feedbacks.rating), 1) as average_rating'))
            ->join('users', 'users.id', '=', 'feedbacks.receiver_id')
            ->where('users.id', $this->id)
            ->first();

        return $result->average_rating;
    }

    public function scopeCompletedTasksCount()
    {
        $status = Status::where('codename', 'completed')->take('id')->first();

        $result = DB::table('tasks')
            ->select(DB::raw('COUNT(tasks.id) as tasks_count'))
            ->join('users', 'tasks.performer_id', '=', 'users.id')
            ->where('users.id', $this->id)
            ->where('tasks.status_id', $status->id)
            ->first();

        return $result->tasks_count;
    }

    public function scopeFeedbacksCount()
    {
        $result = DB::table('feedbacks')
            ->select(DB::raw('COUNT(feedbacks.id) as feedbacks_count'))
            ->join('users', 'feedbacks.receiver_id', '=', 'users.id')
            ->where('users.id', $this->id)
            ->first();

        return $result->feedbacks_count;
    }

    public function scopeAveragePayment()
    {
        $status = Status::where('codename', 'completed')->take('id')->first();

        $result = DB::table('tasks')
            ->select(DB::raw('ROUND(AVG(tasks.budget)) as average_payment'))
            ->join('users', 'tasks.performer_id', '=', 'users.id')
            ->where('users.id', $this->id)
            ->where('tasks.status_id', $status->id)
            ->first();

        return $result->average_payment;
    }

    public function getDaysSinceEveryTaskCompletion() // helper function
    {
        $status = Status::where('codename', 'completed')->take('id')->first();

        $result = DB::table('tasks')
            ->select(DB::raw('DATEDIFF({ fn NOW() }, tasks.completed_at) as days_since_every_task_completion'))
            ->join('users', 'tasks.performer_id', '=', 'users.id')
            ->where('users.id', $this->id)
            ->where('tasks.status_id', $status->id);

        return $result;
    }

    public function scopeDaysSinceLastTaskCompletion()
    {
        $subQuery = $this->getDaysSinceEveryTaskCompletion();

        $result = DB::table(DB::raw("({$subQuery->toSql()}) as days"))
            ->mergeBindings($subQuery)
            ->select(DB::raw('MIN(days_since_every_task_completion) AS days_since_last_task_completion'))
            ->distinct()
            ->first();

        return $result->days_since_last_task_completion;
    }

    public function scopeFrequencyOfTaskCompletions()
    {
        $subQuery = $this->getDaysSinceEveryTaskCompletion();

        $result = DB::table(DB::raw("({$subQuery->toSql()}) as days"))
            ->mergeBindings($subQuery)
            ->select(DB::raw('ROUND((AVG(days_since_every_task_completion) / COUNT(days_since_every_task_completion)), 2) AS frequency_of_task_completions'))
            ->first();

        return $result->frequency_of_task_completions;
    }

    public function scopeAdditiveCriterion()
    {
        $averageRating = $this->scopeAverageRating();
        $averageRatingImportance = 1;
        $averageRatingValue = $averageRating * $averageRatingImportance;

        $tasksCount = $this->scopeCompletedTasksCount();
        $tasksCountImportance = 0.8;
        $tasksCountValue = $tasksCount * $tasksCountImportance;

        $feedbacksCount = $this->scopeFeedbacksCount();
        $feedbacksCountImportance = 0.8;
        $feedbacksCountValue = $feedbacksCount * $feedbacksCountImportance;

        $daysSinceLastTaskCompletion = $this->scopeDaysSinceLastTaskCompletion();
        $daysSinceLastTaskCompletionImportance = -0.4;
        $daysSinceLastTaskCompletionValue = $daysSinceLastTaskCompletion * $daysSinceLastTaskCompletionImportance;

        $frequencyOfTaskCompletions = $this->scopeFrequencyOfTaskCompletions();
        $frequencyOfTaskCompletionsImportance = -0.5;
        $frequencyOfTaskCompletionsValue = $frequencyOfTaskCompletions * $frequencyOfTaskCompletionsImportance;

        $additive_criterion = $averageRatingValue + $tasksCountValue + $feedbacksCountValue + $daysSinceLastTaskCompletionValue + $frequencyOfTaskCompletionsValue;

        return $additive_criterion;
    }
}
