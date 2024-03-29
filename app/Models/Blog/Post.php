<?php

namespace App\Models\Blog;

use Image;
use Carbon\Carbon;
use App\Models\Tag;

use App\Models\User;
use App\Models\Blog\Like;
use App\Models\Blog\Comment;

use App\Models\Blog\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Blog\StorePost;
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
        'creator_id',
        'thumbnail',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps(); // при использовании $post->tags()->sync() автоматически заполняется таблица post_tag, но при этом не сохраняется время. Функция withTimestamps() исправляет это дело.
    } // пост может иметь много тэгов

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    } // одному посту - одна категория

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isAuthUserLiked()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
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

    public static function uploadImage(StorePost $request, $previousImage = null)
    {
        if ($request->hasFile('thumbnail')) {
            if ($previousImage) {
                Storage::delete($previousImage);
            }

            $imgFile = $request->file('thumbnail');

            $folder = date('Y-m-d');
            $path = $imgFile->store("blog/thumbnails/{$folder}");

            Image::make(public_path('uploads/'.$path))->resize(800, 460, function ($const) {
                $const->aspectRatio();
            })->save();

            return $data['thumbnail'] = str_replace('blog/thumbnails/', '', $path);
        }
        return null;
    }

    public function getImage()
    {
        if (!$this->thumbnail) {
            return asset('/public/no-image.jpg');
        }

        return asset('/public/uploads/blog/thumbnails/'.$this->thumbnail);
    }

    public function deleteImage()
    {
        if ($this->thumbnail) {
            Storage::delete($this->thumbnail);
        }
    }

    public function getDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d F, Y');
    }

    public function scopeLike($query, $field, $searchQuery)
    {
        return $query->where($field, 'LIKE', "%{$searchQuery}%");
    }
}
