@extends('layouts.admin_app')

@section('title', 'Стили')

@section('content')
    <section class="section__for__styles__admin">

        <div class="block__for__header__for__style__admin">
            <div class="header__section__for__content__style__admin">Cтили работ</div>
            <div> @include('include.flash_admin') </div>
        </div>

        <div class="block__for__btn__for__add__size__admin">
            <a href="{{ route('admin.style.create')  }}" class="btn__for__add__admin"> Добавить стиль </a>
        </div>

        <table class="table__custom__styles__for__admin">
            <thead>
            <tr>
                <th>Размер</th>
                <th>Цена</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach((old('styles') ?? $styles) as $style)
                <tr>
                    <td>{{$style->style}}</td>
                    <td>{{number_format($style->price, 0, '', ' ')}} ₽</td>
                    <td style="width: 170px;">
                        <a href="{{route('admin.style.edit', $style)}}" class="btn__for__edit__admin">Изменить</a>
                    </td>
                    <td style="width: 136px;">
                        <form method="POST" action="{{route('admin.style.destroy', $style->id)}}">
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
