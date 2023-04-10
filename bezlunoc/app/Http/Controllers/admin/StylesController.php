<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStylesRequest;
use App\Http\Requests\EditStylesRequest;
use App\Http\Requests\StyleRequest;
use App\Models\Section;
use App\Models\Style;
use Illuminate\Http\Request;

class StylesController extends Controller
{
    public function index()
    {
        $styles = Style::all();
        return view('admin.styles.index', compact('styles'));
    }

    public function create()
    {
        return view('admin.styles.create', ['styles' => Style::all()]);
    }

    public function store(CreateStylesRequest $request)
    {
        Style::create($request->except(['_token']));
        return to_route('admin.style')->with(['message' => 'Стиль успешно добавлен']);
    }

    public function edit(Style $style)
    {
        return view('admin.styles.update', ['style' => $style]);
    }

    public function update(EditStylesRequest $request, Style $style)
    {
        if ($style->update($request->except('_token', '_method'))) {
            return to_route('admin.style');
        }
        return back()->withErrors(['error' => 'Произошла ошибка при обновлении...']);
    }

    public function destroy(Style $style)
    {
        if ($style->delete()) {
            return back()->with(['message' => 'Стиль успешно удален']);
        }
        return back()->withErrors(['error' => 'Ошибка удаления...']);
    }
}
