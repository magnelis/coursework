<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatetMainPageRequest;
use App\Http\Requests\EditMainPageRequest;
use App\Models\Content;
use App\Models\Section;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $sectionImportantToUs = Section::where('id', 2)->first();
        $sectionFAQ = Section::where('id', 3)->first();
        $contentImportantToUs = Content::where('section_id', 2)->get();
        $contentFAQ = Content::where('section_id', 3)->get();

        return view('admin.mainPage.index', compact('sectionImportantToUs', 'sectionFAQ', 'contentImportantToUs', 'contentFAQ'));
    }

    public function edit(Content $content)
    {
        return view('admin.mainPage.update', ['content' => $content]);
    }

    public function update(EditMainPageRequest $request, Content $content)
    {
        $header = Content::where('header', 'like', $request->only('header'))->first();
        $text = Content::where('text', 'like', $request->only('text'))->first();

        if ($header && $header->id !== $content->id) {
            return back()->withErrors(['error' => 'Заголовок не должен повторятся']);
        }
        if ($text && $text->id !== $content->id) {
            return back()->withErrors(['error' => 'Текст не должен повторятся']);
        }
        if ($content->update($request->except('_token', '_method'))) {
            return to_route('admin.mainPage');
        }
        return back()->withErrors(['error' => 'Произошла ошибка при обновлении...']);
    }

    public function create()
    {
        return view('admin.mainPage.create');
    }

    public function store(CreatetMainPageRequest $request)
    {
        Content::create(array_merge(
            ['section_id' => 3],
            $request->except(['_token', 'section_id'])
        ));
        return to_route('admin.mainPage')->with(['message' => 'Пункт успешно добавлен']);
    }


    public function destroy(Content $content)
    {
        if ($content->delete()) {
            return back()->with(['message' => 'Пункт успешно удален']);
        }
        return back()->withErrors(['error' => 'Ошибка удаления...']);
    }
}
