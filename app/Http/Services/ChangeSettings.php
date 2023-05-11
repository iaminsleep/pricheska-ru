<?php

namespace App\Http\Services;

use App\Models\User;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Image;

class ChangeSettings
{
    public function execute(array $data)
    {
        $user = auth()->user();

        $user->update($data);
    }
}
