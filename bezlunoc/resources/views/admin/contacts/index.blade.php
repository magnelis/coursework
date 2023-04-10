@extends('layouts.admin_app')

@section('title', 'Контакты')

@section('content')
    <section class="section__for__contacts__admin">

        <div class="block__for__header__for__contacts__admin">
            <div class="header__section__for__content__contacts__index__admin">Контакты</div>
            <div> @include('include.flash_admin') </div>
        </div>

        <div>
            <table class="table__custom__contacts__for__admin">
                <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach((old('contentContacts') ?? $contentContacts) as $item)
                    @if($item->header === null)
                        <tr>
                            <td style="padding-right: 20px; border-right: 1px solid rgba(208, 208, 208, 0.7);">{{$item->text}}</td>
                            <td style="width: 60px;">
                                <a href="{{route('admin.contactsPage.edit', $item->id)}}">
                                    <div class="btn__mainPage__edit"></div>
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <table class="table__custom__contacts__for__admin" style="margin-top: 30px">
                <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach((old('contentContacts') ?? $contentContacts) as $item)
                    @if($item->header != null)
                        <tr>
                            <td style="padding-right: 20px; border-right: 1px solid rgba(208, 208, 208, 0.7);">{{$item->header}}</td>
                            <td style="width: 60px;">
                                <a href="{{route('admin.contactsPage.edit', $item->id)}}">
                                    <div class="btn__mainPage__edit"></div>
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>

    </section>
@endsection
