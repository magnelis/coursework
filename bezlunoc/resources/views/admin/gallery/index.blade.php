@extends('layouts.admin_app')

@section('title', 'Галерея работ')

@section('content')
    <section class="section__for__gallery__admin">

        <div class="block__for__header__section__for__content__gallery__admin">
            <div class="header__section__for__content__gallery__admin">Галерея работ</div>
            @include('include.filter_in_gallery_admin')
        </div>

        <div class="block__for__btn__for__add__admin">
            <div> @include('include.flash_admin') </div>
            <a href="{{route('admin.gallery.create')}}" class="btn__for__add__admin"> Добавить работу </a>
        </div>

        <div class="block__for__count__tattoos">
            Количество работ: {{ count(old('tattoos') ?? $tattoos) }}
        </div>

        <table class="table__custom__gallery__for__admin">
            <thead>
            <tr>
                <th></th>
                <th>Название</th>
                <th>Стиль</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach((old('tattoos') ?? $tattoos) as $tattoo)
                <tr>
                    <td><img src="{{ asset($tattoo->photo) }}" alt="{{ $tattoo->name }}"
                             class="photo__work__section__gallery__admin"></td>
                    <td>{{$tattoo->name}}</td>
                    <td>{{$tattoo->style->style}}</td>
                    <td style="width: 170px;">
                        <a href="{{route('admin.gallery.edit', $tattoo)}}" class="btn__for__edit__admin">Изменить</a>
                    </td>
                    <td style="width: 130px;">
                        <form method="POST" action="{{route('admin.gallery.destroy', $tattoo->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn__for__destroy__admin">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection
