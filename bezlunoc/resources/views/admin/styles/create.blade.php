@extends('layouts.admin_app')

@section('title', 'Добавление стиля')

@section('content')
    <section class="section__for__styles__admin">

        <div class="block__for__header__section__for__content__styles__admin">
            <div class="header__section__for__content__sizes__admin">Добавление стиля</div>
            <a href="{{route('admin.style')}}" class="btn__return__to__back_admin">Назад</a>
        </div>

        <div class="content__section__for__styles__admin">

            <form method="POST" action="{{ route('admin.style.store') }}" class="form__section__for__styles__admin"
                  enctype="multipart/form-data" autocomplete="off">
                @csrf

                <div class="block__custom__input__styles__admin">
                    <label for="style" class="label__custom__input__styles__admin"
                           style="margin-top: 0">Название</label>
                    <input type="text" class="custom__input__styles__admin @error('style') is-invalid @enderror"
                           name="style" id="style" value = "{{ old('style') }}">
                    @error('style')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="block__custom__input__styles__admin">
                    <label for="price" class="label__custom__input__styles__admin">Цена</label>
                    <input type="text" class="custom__input__styles__admin @error('price') is-invalid @enderror"
                           name="price" id="price" value = "{{ old('price') }}">
                    @error('price')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" id="submit" class="btn__for__save__admin">Добавить</button>
            </form>
        </div>
    </section>
@endsection
