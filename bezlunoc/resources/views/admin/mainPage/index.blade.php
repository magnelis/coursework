@extends('layouts.admin_app')

@section('title', 'Главная')

@section('content')
    <section class="section__for__mainPage__admin">

        <div class="block__for__header__for__mainPage__admin">
            <div class="header__section__for__content__mainPage__index__admin">Главная страница</div>
            <div> @include('include.flash_admin') </div>
        </div>

        <div>
            <div class="header__section__for__content__mainPage__admin"> Секция - {{$sectionImportantToUs->header}}</div>

            <table class="table__custom__mainPage__for__admin">
                <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Текст</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach((old('contentImportantToUs') ?? $contentImportantToUs) as $item)
                    <tr>
                        <td style="padding-right: 20px;"
                            class="td__custom__header__mainPage__for__admin">{{$item->header}}</td>
                        <td style="padding-right: 20px; border-right: 1px solid rgba(208, 208, 208, 0.7);">{{$item->text}}</td>
                        <td style="width: 60px;">
                            <a href="{{route('admin.mainPage.edit', $item->id)}}">
                                <div class="btn__mainPage__edit"></div>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <div class="header__section__for__content__mainPage__admin" style="margin-top: 60px"> Секция - {{$sectionFAQ->header}}</div>

            <div class="block__for__btn__for__add__mainPage__admin">
                <a href="{{route('admin.mainPage.create')}}" class="btn__for__add__admin"> Добавить пункт </a>
            </div>

            <table class="table__custom__mainPage__for__admin" style="margin-top: 30px">
                <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Текст</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach((old('contentFAQ') ?? $contentFAQ) as $item)
                    <tr>
                        <td style="padding-right: 20px;"
                            class="td__custom__header__mainPage__for__admin">{{$item->header}}</td>
                        <td style="padding-right: 20px; border-right: 1px solid rgba(208, 208, 208, 0.7);">{{$item->text}}</td>
                        <td style="width: 60px;">
                            <a href="{{route('admin.mainPage.edit', $item)}}">
                                <div class="btn__mainPage__edit"></div>
                            </a>
                        </td>
                        <td style="width: 60px;">
                            <form method="POST" action="{{route('admin.mainPage.destroy', $item->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn__mainPage__delete"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </section>
@endsection
