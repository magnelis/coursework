@extends('layouts.admin_app')

@section('title', 'Размеры')

@section('content')
    <section class="section__for__sizes__admin">

        <div class="block__for__header__for__sizes__admin">
            <div class="header__section__for__content__sizes__admin">Размеры работ</div>
            <div> @include('include.flash_admin') </div>
        </div>

        <div class="block__for__btn__for__add__size__admin">
            <a href="{{route('admin.size.create')}}" class="btn__for__add__admin"> Добавить размер </a>
        </div>

        <table class="table__custom__sizes__for__admin">
            <thead>
            <tr>
                <th>Размер</th>
                <th>Цена</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach((old('sizes') ?? $sizes) as $size)
                <tr>
                    <td>{{$size->size}}</td>
                    <td>{{number_format($size->price, 0, '', ' ')}} ₽</td>
                    <td style="width: 170px;">
                        <a href="{{route('admin.size.edit', $size)}}" class="btn__for__edit__admin">Изменить</a>
                    </td>
                    <td style="width: 130px;">
                        <form method="POST" action="{{route('admin.size.destroy', $size->id)}}">
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
