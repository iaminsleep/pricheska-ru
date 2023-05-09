<?php

namespace App\Http\Services;

use App\Models\User;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Image;

class ChangeSettings {
  public function execute(array $data) {
    $user = auth()->user();

    if(isset($data['avatar'])) {
        $avatarName = $user->id.'_avatar'.time().'.'.$data['avatar']->getClientOriginalExtension();

        $avatar_resize = Image::make($data['avatar']->getRealPath());
        $avatar_resize->resize(156, 156);

        $avatar_resize->save('img/avatars/'. $avatarName);

        if(File::exists('img/avatars/'.$user->avatar)) {
            File::delete('img/avatars/'.$user->avatar);
        }

        $data['avatar'] = $avatarName;
    }

    $user->update($data);
  }
}
