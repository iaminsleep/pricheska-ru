<?php

namespace App\Http\Services;

use App\Models\User;

use App\Models\Task\Response;
use App\Http\Services\DeleteResponse;
use App\Notifications\UserNotification;

class AcceptResponse
{
    public function execute(Response $response)
    {
        $task = $response->task;

        if ($task->creator_id === auth()->user()->id) {
            $task->fill([
                'performer_id' => $response->user_id,
                'budget' => $response->payment
            ])->save();

            foreach($task->responses as $hairdresserResponse) {
                // Create a new notification instance for other hairdressers
                $notification = new UserNotification([
                    "message" => 'Выбран исполнитель для',
                    "task_name" => $task->title,
                    'task_id' => $task->id,
                    "type" => 'executor',
                ]);
                $notification->notifiable_type = 'App\Models\User';

                $hairdresserResponse->user->notify($notification);
            }

            // Create a new notification instance for the barber that was chosen for this job
            $performerNotification = new UserNotification([
                "message" => 'Вас выбрали исполнителем для',
                "task_name" => $task->title,
                'task_id' => $task->id,
                "type" => 'executor',
            ]);
            $performerNotification->notifiable_type = 'App\Models\User';
            $performer = User::find($response->user_id);
            $performer->notify($performerNotification);

            $deleteResponse = new DeleteResponse();
            $deleteResponse->execute($response);

            return true;
        }

        return false;
    }
}
