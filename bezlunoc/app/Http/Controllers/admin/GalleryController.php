<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\FileService;
use App\Http\Requests\CreateTattooRequest;
use App\Http\Requests\EditTattooRequest;
use App\Http\Requests\GalleryRequest;
use App\Models\Section;
use App\Models\Style;
use App\Models\Tattoo;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $tattoos = Tattoo::latest()->get();
        $styles = Style::all();
        return view('admin.gallery.index', compact('tattoos', 'styles'));
    }

    public function filter_by_gallery(Request $request)
    {
        $tattoos = Tattoo::where('id', '>', 0);
        if ($request->style != 'all') {
            $tattoos = $tattoos->where('style_id', $request->style);
        }
        return back()->withInput(
            $request->all() + ['tattoos' => $tattoos->latest()->get()]
        );
    }

    public function create()
    {
        return view('admin.gallery.create', ['tattoos' => Tattoo::all(), 'styles' => Style::all()]);
    }

    public function store(CreateTattooRequest $request)
    {
        $path = FileService::upload($request->file('photo'), '/tattoos');
        Tattoo::create(array_merge(
            ['photo' => $path],
            $request->except(['_token', 'photo'])
        ));
        return to_route('admin.gallery')->with(['message' => 'Работа успешно добавлена']);
    }

    public function edit(Tattoo $tattoo)
    {
        return view('admin.gallery.update', ['tattoo' => $tattoo, 'styles' => Style::all()]);
    }

    public function update(EditTattooRequest $request, Tattoo $tattoo)
    {
        $values = $request->except(['_token', 'photo']);
        if (isset($request->photo)) {
            $path = FileService::update($tattoo->photo, $request->file('photo'), '/tattoos');
            if ($path) {
                $values += ['photo' => $path];
            }
        }
        if ($tattoo->update($values)) {
            return to_route('admin.gallery');
        }
        return to_route('admin.gallery')->withErrors(['error' => 'Произошла ошибка при обновлении...']);
    }

    public function destroy(Tattoo $tattoo)
    {
        FileService::delete($tattoo->photo);
        if ($tattoo->delete()) {
            return to_route('admin.gallery')->with(['message' => 'Работа успешно удалена']);
        }
        return to_route('admin.gallery')->withErrors(['error' => 'Ошибка удаления...']);
    }
}
