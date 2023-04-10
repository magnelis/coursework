<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\MediaPage;
use App\Models\Section;
use App\Models\Style;
use App\Models\Tattoo;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // index
    public function index()
    {
        $sections = Section::all();
        $contents = Content::all();
        $photosTattoo = Tattoo::latest()->take(4)->get();
        return view('index', compact('sections', 'contents', 'photosTattoo'));
    }

    // gallery
    public function gallery()
    {
        $sections = Section::all();
        $styles = Style::all();
        $tattoos = Tattoo::latest();

        if(request('style')){
            $tattoos = $tattoos->whereIn('style_id', request('style'));
        }

        $tattoos = $tattoos->paginate(9);

        return view('pages.gallery', compact('sections','tattoos', 'styles'));
    }

    // about
    public function about()
    {
        $sections = Section::all();
        $contents = Content::all();
        $photos = MediaPage::all();
        return view('pages.about', compact('sections', 'contents', 'photos'));
    }

    // contacts
    public function contacts()
    {
        $sections = Section::all();
        $contents = Content::all();
        return view('pages.contacts', compact('sections', 'contents'));
    }
}
