<?php

namespace App\Models\Task;

use Image;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Task\StoreService;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'user_id',
        'price',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function uploadImage(StoreService $request, $previousImage = null)
    {
        if ($request->hasFile('image')) {
            // if ($previousImage) {
            //     Storage::delete($previousImage);
            // }

            $imgFile = $request->file('image');

            $folder = date('Y-m-d');
            $path = $imgFile->store("task/images/{$folder}");

            Image::make(public_path('uploads/'.$path))->resize(300, 300, function ($const) {
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
}
