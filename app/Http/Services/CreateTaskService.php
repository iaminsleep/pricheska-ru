<?php

namespace App\Http\Services;

use App\Models\Task\Task;
use Illuminate\Support\Facades\Storage;

class CreateTaskService
{
    public function execute(array $data): Task
    {
        $task = Task::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'category_id' => $data['category_id'],
            'creator_id' => auth()->user()->id,
            'budget' => $data['budget'],
            'deadline' => $data['deadline'],
            'address' => $data['address'],
            'image' => $data['image'],
        ]);

        return $task;
    }
}
