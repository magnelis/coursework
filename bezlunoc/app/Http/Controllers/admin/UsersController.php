<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->get();
        return view('admin.users.index', compact('users'));
    }

    public function searchUser(Request $request)
    {
        $users = User::all();

        if ($request->search != null) {
            $users = User::where('name', 'like', $request->search . '%')->get();
        }

        return back()->withInput(
            $request->all() + ['users' => $users]
        );
    }

    public function show(User $user)
    {
        $records = Record::select('records.*')->where('user_id', $user->id)->join('working_days', 'working_days.id', '=', 'records.date_id')->orderBy('working_days.date', 'desc')->get();

        return view('admin.users.show', ['user' => $user, 'records' => $records]);
    }

    public function destroy(User $user)
    {
        if ($user->delete()) {
            return back()->with(['message' => 'Пользователь успешно удален']);
        }
        return back()->withErrors(['error' => 'Ошибка удаления...']);
    }
}
