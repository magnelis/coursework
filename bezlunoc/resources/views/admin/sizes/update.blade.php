@extends('layouts.admin_app')

@section('title', $size->size)

@section('content')

    <section class="section__for__sizes__admin">

        <div class="block__for__header__section__for__content__sizes__admin">
            <div class="header__section__for__content__sizes__admin">Редактирование размера - {{$size->size}}</div>
            <a href="{{ route('admin.size') }}" class="btn__return__to__back_admin">Назад</a>
        </div>

        <div class="content__section__for__sizes__admin">
            <form method="POST" action="{{ route('admin.size.update', $size) }}"
                  class="form__section__for__sizes__admin"
                  enctype="multipart/form-data" autocomplete="off">
                @csrf
                @method('PATCH')

                <div class="block__custom__input__sizes__admin">
                    <label for="size" class="label__custom__input__sizes__admin"
                           style="margin-top: 0">Название</label>
                    <input type="text" class="custom__input__sizes__admin @error('size') is-invalid @enderror"
                           name="size" id="size" value= "{{ old('size') ?? $size->size }}">
                    @error('size')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="block__custom__input__sizes__admin">
                    <label for="price" class="label__custom__input__sizes__admin">Цена</label>
                    <input type="text" class="custom__input__sizes__admin @error('price') is-invalid @enderror"
                           name="price" id="price" value= {{ old('price') ?? round($size->price) }}>
                    @error('price')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" id="submit" class="btn__for__save__admin">Изменить</button>

            </form>
        </div>
    </section>

@endsection
