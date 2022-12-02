<?php

namespace App\Models;

use App\Models\User;
use App\Scopes\HairdresserScope;
use App\Traits\HasHairdresserRole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hairdresser extends User
{
    use HasHairdresserRole;

    protected $table = 'users';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new HairdresserScope());
    }

    protected $appends = [
        'additive_criterion'
    ];

    public function getAdditiveCriterionAttribute()
    {
        return $this->scopeAdditiveCriterion();
    }
}
