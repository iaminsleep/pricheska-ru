<?php

namespace App\Models\Task;

use App\Http\Requests\Task\StoreTask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'creator_id',
        'budget',
        'deadline',
        'location',
        'performer_id',
        'image',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps(); // при использовании $task->tags()->sync() автоматически заполняется таблица task_tag, но при этом не сохраняется время. Функция withTimestamps() исправляет это дело.
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function uploadImage(StoreTask $request, $previousImage = null)
    {
        if ($request->hasFile('image')) {
            if ($previousImage) {
                Storage::delete($previousImage);
            }

            $imgFile = $request->file('image');

            $folder = date('Y-m-d');
            $path = $imgFile->store("images/task/{$folder}");

            Image::make(public_path('uploads/'.$path))->resize(800, 460, function ($const) {
                $const->aspectRatio();
            })->save();

            return $data['image'] = $path;
        }
        return null;
    }

    public function getImage()
    {
        if (!$this->image) {
            return asset('/public/no-image.jpg');
        }

        return asset('/public/uploads/'.$this->image);
    }

    public function deleteImage()
    {
        if ($this->image) {
            Storage::delete($this->image);
        }
    }

    public function getDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d F, Y');
    }
}
