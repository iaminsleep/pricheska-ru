<?php

namespace App\Models\Task;

use App\Models\User;
use App\Models\Task\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'author_id',
        'receiver_id',
        'comment',
        'rating',
    ];

    protected $table = 'feedbacks';

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
