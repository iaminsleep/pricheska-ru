<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AuthUser;
use App\Http\Requests\StoreUser;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        $roles = Role::whereNot('codename', 'admin')->pluck('name', 'codename')->all();
        return view('front.user.create', ['roles' => $roles]);
    }

    public function store(StoreUser $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $role = Role::where('codename', $request->role)->first();
        $user->roles()->attach($role);

        session()->flash('success', 'Регистрация пройдена.');

        return redirect()->route('login.create');
    }

     public function loginForm()
     {
         return view('front.user.login');
     }

    public function login(AuthUser $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember_me)) { // if remember me checkbox is checked, passes as second argument
            session()->flash('success', 'Вы успешно вошли в систему.');
            if (Auth::user()->hasRole('admin')) {
                // если пользователь - администратор, его перенесёт на страницу админки
                return redirect()->route('admin.index');
            } else {
                return redirect()->home();
            }
        } else {
            return redirect()->back()->with('error', 'Логин или пароль введён неправильно');
        };
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.create');
    }
}
