<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimeRequest;
use App\Models\Working_time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index()
    {
        $times = Working_time::select('working_times.*')->orderBy('time')->get();
        return view('admin.time.index', compact('times'));
    }

    public function create()
    {
        return view('admin.time.create');
    }

    public function store(TimeRequest $request)
    {
        $time2 = $request->time . ':00';
        $time = Working_time::where('time', 'like', $time2)->first();

        if ($time) {
            return back()->withErrors(['error' => 'Время уже существует'])->withInput($request->all());
        }

        Working_time::create($request->except(['_token']));
        return to_route('admin.time')->with(['message' => 'Время успешно добавлено']);
    }

    public function destroy(Working_time $time)
    {
        if ($time->delete()) {
            return back()->with(['message' => 'Время успешно удалено']);
        }
        return back()->withErrors(['error' => 'Ошибка удаления...']);
    }
}
