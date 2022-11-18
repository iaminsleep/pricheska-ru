<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'codename'];

    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class, 'role_permission'); // ManyToMany relationship
    // }

    public function users()
    {
        return $this->hasMany(User::class); // у одной роли много пользователей
    }
}
