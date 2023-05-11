<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Image;
use App\Traits\HasRoles;
use App\Models\Task\Task;
use App\Models\Task\Service;
use App\Models\Task\Feedback;
use App\Models\Task\Response;

use App\Models\Task\Favourite;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Services\ChangeSettings;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use App\Http\Requests\ChangeSettingsRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles; // New trait

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'description',
        'birth_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function performing_tasks()
    {
        return $this->hasMany(Task::class, 'performer_id');
    }

    public function received_feedbacks()
    {
        return $this->hasMany(Feedback::class, 'receiver_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'creator_id');
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'user_id');
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }

    public function isHairdresser()
    {
        return $this->roles()->where('codename', 'hairdresser')->exists();
    }

    public function getImage()
    {
        if (!$this->avatar) {
            return asset('/public/no-avatar.png');
        }

        return asset('/public/uploads/user/avatars/'.$this->avatar);
    }

    public static function uploadAvatar(ChangeSettingsRequest $request, $previousImage = null)
    {
        if ($request->hasFile('avatar')) {
            // if ($previousImage) {
            //     Storage::delete($previousImage);
            // }

            $imgFile = $request->file('avatar');

            $folder = date('Y-m-d');
            $path = $imgFile->store("user/avatars/{$folder}");

            Image::make(public_path('uploads/'.$path))->resize(300, 300, function ($const) {
                $const->aspectRatio();
            })->save();

            return $data['avatar'] = str_replace("user/avatars/", "", $path);
        }
        return null;
    }

    public function deleteImage()
    {
        if ($this->avatar) {
            Storage::delete($this->avatar);
        }
    }
}
