<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\FileService;
use App\Http\Requests\AboutPageRequest;
use App\Models\Content;
use App\Models\MediaPage;
use App\Models\Section;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $sectionAboutFirst = Section::where('id', 5)->first();
        $sectionAboutSecond = Section::where('id', 6)->first();
        $contentAboutFirst = Content::where('section_id', 5)->get();
        $contentAboutSecond = Content::where('section_id', 6)->get();

        $imageAboutFirst = MediaPage::where('section_id', 5)->get();
        $imageAboutSecond = MediaPage::where('section_id', 6)->get();

        return view('admin.aboutPage.index', compact('sectionAboutFirst', 'sectionAboutSecond', 'contentAboutFirst', 'contentAboutSecond', 'imageAboutFirst', 'imageAboutSecond'));
    }

    public function edit(Content $content)
    {
        return view('admin.aboutPage.update', ['content' => $content]);
    }

    public function update(AboutPageRequest $request, Content $content)
    {
        if ($content->update($request->except('_token', '_method'))) {
            return to_route('admin.aboutPage');
        }
        return back()->withErrors(['error' => 'Произошла ошибка при обновлении...']);
    }

    public function editMedia(MediaPage $media)
    {
        return view('admin.aboutPage.updateMedia', ['media' => $media]);
    }

    public function updateMedia(AboutPageRequest $request, MediaPage $media)
    {
        $values = $request->except(['_token', 'photo']);
        if (isset($request->photo)) {
            $path = FileService::update($media->photo, $request->file('photo'), '/pages');
            if ($path) {
                $values += ['media' => $path];
            }
        }
        if ($media->update($values)) {
            return to_route('admin.aboutPage');
        }
        return back()->withErrors(['error' => 'Произошла ошибка при обновлении...']);
    }
}
