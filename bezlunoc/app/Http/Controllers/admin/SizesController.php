<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSizesRequest;
use App\Http\Requests\EditSizesRequest;
use App\Http\Requests\EditTattooRequest;
use App\Models\Section;
use App\Models\Size;
use Illuminate\Http\Request;

class SizesController extends Controller
{
    public function index()
    {
        $sizes = Size::all();
        return view('admin.sizes.index', compact('sizes'));
    }

    public function create()
    {
        return view('admin.sizes.create', ['sizes' => Size::all()]);
    }

    public function store(CreateSizesRequest $request)
    {
        Size::create($request->except(['_token']));
        return to_route('admin.size')->with(['message' => 'Размер успешно добавлен']);
    }

    public function edit(Size $size)
    {
        return view('admin.sizes.update', ['size' => $size]);
    }

    public function update(EditSizesRequest $request, Size $size)
    {
        if ($size->update($request->except('_token', '_method'))) {
            return to_route('admin.size');
        }
        return back()->withErrors(['error' => 'Произошла ошибка при обновлении...']);
    }

    public function destroy(Size $size)
    {
        if ($size->delete()) {
            return back()->with(['message' => 'Размер успешно удален']);
        }
        return back()->withErrors(['error' => 'Ошибка удаления...']);
    }
}
