<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegRequest;
use App\Http\Requests\UpdateDataUserRequest;
use App\Http\Requests\UpdatePasswordUserRequest;
use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registration()
    {
        return view('users.reg');
    }

    public function authorization()
    {
        return view('users.auth');
    }

    public function store(RegRequest $request)
    {
        $user = User::create(array_merge(
            ['password' => Hash::make($request->password)],
            ['numberOfPhone' => preg_replace('/[^0-9]/', '', $request->numberOfPhone)],
            $request->only(['name', 'email'])
        ));

        auth()->login($user);

        return to_route('user.profile');
    }

    public function loginCheck(AuthRequest $request)
    {
        if (Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ], ($request->get('remember_me') == 'on' ? true : false))) {
            if (Auth::check() || Auth::viaRemember()) {
                $request->session()->regenerate();
                return to_route('user.profile');
            }
        }
        return back()->withErrors(['errorLogin' => 'Пользователь не найден']);
    }

    public function profile()
    {
        $records = Record::select('records.*')->where('user_id', auth()->id())->join('working_days', 'working_days.id', '=', 'records.date_id')->orderBy('working_days.date')->get();

        return view('users.profile', compact('records'));
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('index');
    }

    // Работа с данными пользователя

    public function profileUpdate()
    {
        return view('users.update_data');
    }

    public function update(UpdateDataUserRequest $request, User $user)
    {
        $numberOfPhone = preg_replace('/[^0-9]/', '', $request->numberOfPhone);

        $values = array_merge(
            ['numberOfPhone' => $numberOfPhone],
            $request->only(['name', 'email'])
        );

        $userFindLogin = User::where('email', 'like', $request->only('email'))->first();
        $userFindPhone = User::where('numberOfPhone', 'like', $numberOfPhone)->first();

        if ($userFindLogin && $userFindLogin->id !== $user->id) {
            return back()->withErrors(['error' => 'Пользователь с такими данными уже существует']);
        }
        if ($userFindPhone && $userFindPhone->id !== $user->id) {
            return back()->withErrors(['error' => 'Пользователь с такими данными уже существует']);
        }

        if ($user->update($values)) {
            return back()->with(['message' => 'Данные успешно обновлены']);
        }
        return back()->withErrors(['error' => 'Произошла ошибка при обновлении данных']);
    }

    public function profileUpdatePassword()
    {
        return view('users.update_password');
    }

    public function updatePassword(UpdatePasswordUserRequest $request)
    {
        if (Hash::check($request->oldPassword, auth()->user()->getAuthPassword())) {
            $user = User::where('id', auth()->id())->first();
            if (Hash::check($request->password, auth()->user()->getAuthPassword())) {
                return back()->withErrors(['error' => 'Пароли совпадают']);
            } else {
                if ($user->update(['password' => Hash::make($request->password)])) {
                    return to_route('user.profile.update')->with(['message' => 'Пароль успешно обновлен']);
                }
            }
        }
        return back()->withErrors(['error' => 'Введен неправильный пароль']);
    }
}
