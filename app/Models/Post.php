<?php

namespace App\Models;

use App\Http\Requests\Admin\StorePost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'description',
        'content',
        'category_id',
        'thumbnail',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps(); // при использовании $post->tags()->sync() автоматически заполняется таблица post_tag, но при этом не сохраняется время. Функция withTimestamps() исправляет это дело.
    } // пост может иметь много тэгов

    public function category()
    {
        return $this->belongsTo(Category::class);
    } // одному посту - одна категория

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

    public static function uploadImage(StorePost $request, $previousImage = null)
    {
        if ($request->hasFile('thumbnail')) {
            if ($previousImage) {
                Storage::delete($previousImage);
            }

            $folder = date('Y-m-d');
            return $data['thumbnail'] = $request->file('thumbnail')->store("images/{$folder}");
        }
        return null;
    }

    public function getImage()
    {
        if (!$this->thumbnail) {
            return asset('/public/no-image.jpg');
        }

        return asset('/public/uploads/'.$this->thumbnail);
    }

    public function deleteImage()
    {
        if ($this->thumbnail) {
            Storage::delete($this->thumbnail);
        }
    }
}
