<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Record;
use App\Models\Working_day;
use App\Models\Working_time;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RecordsController extends Controller
{
    public function index()
    {
        $recordsImmediate = Record::select('records.*')->where('status_id', 1)
            ->join('working_days', 'working_days.id', '=', 'records.date_id')->where('working_days.date', '>', Carbon::now()->format('Y-m-d'))->orWhere('working_days.date', '=', Carbon::now()->format('Y-m-d'))->orderBy('working_days.date')
            ->join('working_times', 'working_times.id', '=', 'records.time_id')->where('working_times.time', '>', Carbon::now()->format('H:i:s'))->orderBy('working_times.time')
            ->get();

        $recordsPast = Record::select('records.*')->where('status_id', 1)
            ->join('working_days', 'working_days.id', '=', 'records.date_id')->where('working_days.date', '<=', Carbon::now()->format('Y-m-d'))->orderBy('working_days.date', 'desc')
            ->join('working_times', 'working_times.id', '=', 'records.time_id')->where('working_times.time', '<', Carbon::now()->format('H:i:s'))->orderBy('working_times.time', 'desc')
            ->get();

        $recordsCanceled = Record::select('records.*')->where('status_id', 2)
            ->join('working_days', 'working_days.id', '=', 'records.date_id')->orderBy('working_days.date', 'desc')
            ->join('working_times', 'working_times.id', '=', 'records.time_id')->orderBy('working_times.time', 'desc')
            ->get();

        return view('admin.records.index', compact('recordsImmediate', 'recordsPast', 'recordsCanceled'));
    }

    public function cancelRecord(Request $request, Record $record)
    {
        $recordStatus = Record::where('id', $record->id)->first();
        $day = Working_day::where('id', $recordStatus->date_id)->first();
        $time = Working_time::where('id', $recordStatus->time_id)->first();

        $findTimeline = $day->timelines()->where('date_id', $day->id)->where('time_id', $time->id)->first();

        $recordStatus->update(['status_id' => 2]);
        $findTimeline->update(['freely' => 0]);

        return back()->with(['message' => 'Запись отменена']);
    }

}
