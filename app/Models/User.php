<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\HasRoles;
use App\Models\Task\Task;
use App\Models\Task\Response;
use App\Models\Task\Favourite;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
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

    public function tasks()
    {
        return $this->hasMany(Task::class, 'creator_id');
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }

    public function getImage()
    {
        if (!$this->avatar) {
            return asset('/public/no-avatar.png');
        }

        return asset('/public/uploads/user/avatars/'.$this->avatar);
    }

    public function deleteImage()
    {
        if ($this->avatar) {
            Storage::delete($this->avatar);
        }
    }
}
