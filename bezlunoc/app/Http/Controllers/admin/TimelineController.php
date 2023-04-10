<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimelineRequest;
use App\Models\Timeline;
use App\Models\Working_day;
use App\Models\Working_time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimelineController extends Controller
{
    public function index()
    {
        $timelines = Timeline::all();
        return view('admin.timeline.index', compact('timelines'));
    }

    public function checkDate(Request $request)
    {
        $timelines = Timeline::where('id', '>', 0);
        $date = Working_day::where('date', $request->checkDate)->first();

        if($date) {
            $timelines = $timelines->where('date_id', $date->id)->get();
            return back()->withInput($request->all() + ['timelines' => $timelines]);
        }

        $timelines = Timeline::all();
        return back()->withErrors(['error' => 'На данный день нет расписания']);

    }

    public function create()
    {
        return view('admin.timeline.create', ['times' => Working_time::all()]);
    }

    public function store(TimelineRequest $request)
    {
        if (isset($request->time) != 0){
            $date = Working_day::where('date', $request->only(['date']))->first();

            if (!$date) {
                $date = Working_day::create($request->only(['date']));
            }

            foreach ($request->time as $time) {
                $timeDate = Timeline::where('time_id', 'like', $time)->where('date_id', 'like', $date->id)->first();

                if ($timeDate) {
                    return back()->withErrors(['error' => 'Расписание уже существует'])->withInput($request->all());
                }

                Timeline::create([
                    'date_id' => $date->id,
                    'time_id' => $time
                ]);
            }
            return to_route('admin.timeline');
        }
        return back()->withErrors(['error' => 'Выберите время'])->withInput($request->all());
    }

    public function destroy($date, $time)
    {
        $timeline = Timeline::where('date_id', $date)->where('time_id', $time);
        if ($timeline->delete()) {
            return back()->with(['message' => 'Дата успешна удалена']);
        }
        return back()->withErrors(['error' => 'Ошибка удаления...']);
    }
}
