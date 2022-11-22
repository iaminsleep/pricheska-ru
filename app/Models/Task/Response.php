<?php

namespace App\Models\Task;

use App\Models\User;
use App\Models\Task\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Response extends Model
{
    use HasFactory;

    // /**
    //  * The database table used by the model.
    //  *
    //  * @var string
    //  */
    // protected $table = 'responses';

    protected $fillable = [
        'user_id',
        'task_id',
        'payment',
        'comment'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class)->select([
            'id',
            'title',
            'creator_id',
            'performer_id',
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->select([
            'id',
            'name',
            'avatar',
            'rating',
        ]);
    }
}
