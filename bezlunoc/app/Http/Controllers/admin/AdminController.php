<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Record;
use App\Models\Tattoo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function login()
    {
        return view('admin.auth');
    }

    public function loginCheck(Request $request)
    {
        if (auth('admin')->attempt($request->only(['login', 'password']))) {
            $request->session()->regenerate();
            return to_route('admin.index');
        }
        return back()->withErrors([
            'errorLogin' => 'Пользователь не найден'
        ]);
    }

    public function logout()
    {
        auth('admin')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('index');
    }

    public function index()
    {
        $records = Record::select('records.*')->where('status_id', 1)
            ->join('working_days', 'working_days.id', '=', 'records.date_id')->where('working_days.date', '>', Carbon::now()->format('Y-m-d'))->orWhere('working_days.date', '=', Carbon::now()->format('Y-m-d'))->orderBy('working_days.date')
            ->join('working_times', 'working_times.id', '=', 'records.time_id')->where('working_times.time', '>', Carbon::now()->format('H:i:s'))->orderBy('working_times.time')
            ->take(3)->get();

        $users = User::latest()->take(3)->get();
        $tattoos = Tattoo::latest()->take(5)->get();

        return view('admin.index', compact('records', 'users', 'tattoos'));
    }
}
