<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactsPageRequest;
use App\Models\Content;
use App\Models\Section;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contentContacts = Content::where('section_id', 7)->get();

        return view('admin.contacts.index', compact( 'contentContacts'));
    }

    public function edit(Content $content)
    {
        return view('admin.contacts.update', ['content' => $content]);
    }

    public function update(ContactsPageRequest $request, Content $content)
    {
        if ($content->update($request->except('_token', '_method'))) {
            return to_route('admin.contactsPage');
        }
        return back()->withErrors(['error' => 'Произошла ошибка при обновлении...']);
    }
}
