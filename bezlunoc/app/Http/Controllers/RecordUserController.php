<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordUserRequest;
use App\Models\Record;
use App\Models\Size;
use App\Models\Style;
use App\Models\Timeline;
use App\Models\Working_day;
use App\Models\Working_time;
use Illuminate\Http\Request;

class RecordUserController extends Controller
{
    public function index()
    {
        $timelines = Timeline::all();
        $styles = Style::all();
        $sizes = Size::all();

        return view('users.record', compact('timelines', 'styles', 'sizes'));
    }

    public function storeRecord(RecordUserRequest $request)
    {
        $day = Working_day::where('date', $request->date)->first();

        $findTimeline = $day->timelines()->where('date_id', $day->id)->where('time_id', $request->time_id)->first();
        $findTimeline->update(['freely' => 1]);

        Record::create([
            'date_id' => $day->id,
            'time_id' => $request->time_id,
            'user_id' => auth()->id(),
            'size_id' => $request->size_id,
            'style_id' => $request->style_id,
            'status_id' => 1,
        ]);

        return to_route('user.profile');
    }

    public function deleteRecord(Record $record)
    {
        $recordStatus = Record::where('id', $record->id)->first();
        $recordStatus->update(['status_id' => 2]);

        $findTimeline = Timeline::where('date_id', $record->date_id)->where('time_id', $record->time_id)->first();
        $findTimeline->update(['freely' => 0]);

        return back()->with(['message' => 'Ваша запись отменена']);
    }

    public function getNumberDay(Request $request)
    {
        $day = Working_day::where('date', $request->date)->first();
        if ($day != null && count($day->timelines) > 0) {
            $freeDays = $day->timelines()->where('freely', 0)->pluck('time_id');
            $times = Working_time::whereIn('id', $freeDays)->get();
            return response()->json($times);
        }
        return response()->json('no');
    }

}
