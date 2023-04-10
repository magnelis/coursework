@extends('layouts.admin_app')

@section('title', 'Создание секции')

@section('content')
    <section class="section__for__mainPage__admin">

        <div class="block__for__header__for__mainPage__admin">
            <div class="header__section__for__content__sizes__admin"> Создание секции </div>
            <a href="{{route('admin.mainPage')}}" class="btn__return__to__back_admin">Назад</a>
        </div>

        <div class="content__section__for__styles__admin">
            <form method="POST" action="{{route('admin.mainPage.store')}}" class="form__section__for__styles__admin" enctype="multipart/form-data" autocomplete="off">
                @csrf

                <div class="block__custom__input__styles__admin">
                    <label for="header" class="label__custom__input__styles__admin"
                           style="margin-top: 0">Заголовок</label>
                    <input type="text" class="custom__input__styles__admin @error('header') is-invalid @enderror"
                           name="header" id="header" value="{{old('header')}}">
                    @error('header')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="block__custom__input__styles__admin">
                    <label for="text" class="label__custom__input__styles__admin">Текст</label>
                    <textarea class="custom__input__styles__admin @error('text') is-invalid @enderror"
                              name="text" id="text">{{old('text')}}</textarea>
                    @error('text')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" id="submit" class="btn__for__save__admin">Добавить</button>
            </form>
        </div>
    </section>
@endsection
