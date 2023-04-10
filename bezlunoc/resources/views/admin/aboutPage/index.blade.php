@extends('layouts.admin_app')

@section('title', 'О студии')

@section('content')
    <section class="section__for__aboutPage__admin">

        <div class="block__for__header__for__mainPage__admin">
            <div class="header__section__for__content__mainPage__index__admin">О студии</div>
            <div> @include('include.flash_admin') </div>
        </div>

        <div>

            <div class="header__section__for__content__aboutPage__admin"> Секция - {{$sectionAboutFirst->header}}</div>

            <table class="table__custom__aboutPage__for__admin">
                <thead>
                <tr>
                    <th>Текст</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach((old('contentAboutFirst') ?? $contentAboutFirst) as $item)
                    <tr>
                        <td style="padding-right: 20px; border-right: 1px solid rgba(208, 208, 208, 0.7);">{{$item->text}}</td>
                        <td style="width: 60px;">
                            <a href="{{route('admin.aboutPage.edit', $item->id)}}">
                                <div class="btn__aboutPage__edit"></div>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <table class="table__custom__aboutPage__for__admin" style="margin-top: 30px">
                <thead>
                <tr>
                    <th>Фотографии</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach((old('imageAboutFirst') ?? $imageAboutFirst) as $item)
                    <tr>
                        <td style="padding: 10px 10px 10px 0; border-right: 1px solid rgba(208, 208, 208, 0.7);"><img
                                class="img__table__custom__aboutPage__for__admin" src="{{asset($item->media)}}"
                                alt="{{$sectionAboutFirst->header}}"></td>
                        <td style="width: 60px;">
                            <a href="{{route('admin.aboutPage.media.edit', $item->id)}}">
                                <div class="btn__aboutPage__edit"></div>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <div class="header__section__for__content__aboutPage__admin" style="margin-top: 60px"> Секция - {{$sectionAboutSecond->header}}</div>

            <table class="table__custom__aboutPage__for__admin">
                <thead>
                <tr>
                    <th>Текст</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach((old('contentAboutSecond') ?? $contentAboutSecond) as $item)
                    <tr>
                        <td style="padding-right: 20px; border-right: 1px solid rgba(208, 208, 208, 0.7);">{{$item->text}}</td>
                        <td style="width: 60px;">
                            <a href="{{route('admin.aboutPage.edit', $item->id)}}">
                                <div class="btn__aboutPage__edit"></div>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <table class="table__custom__aboutPage__for__admin" style="margin-top: 30px">
                <thead>
                <tr>
                    <th>Фотографии</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach((old('imageAboutFirst') ?? $imageAboutSecond) as $item)
                    <tr>
                        <td style="padding: 10px 10px 10px 0; border-right: 1px solid rgba(208, 208, 208, 0.7);"><img
                                class="img__table__custom__aboutPage__for__admin" src="{{asset($item->media)}}"
                                alt="{{$sectionAboutFirst->header}}"></td>
                        <td style="width: 60px;">
                            <a href="{{route('admin.aboutPage.media.edit', $item->id)}}">
                                <div class="btn__aboutPage__edit"></div>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </section>
@endsection
