<?php

namespace App\Models;

use App\Models\Blog\Post;
use App\Models\Task\Task;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title'];

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_tag');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
