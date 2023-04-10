@extends('layouts.admin_app')

@section('title', 'Редактирование секции - ' . $content->section->header)

@section('content')
    <section class="section__for__aboutPage__admin">

        <div class="block__for__header__for__aboutPage__admin">
            <div class="header__section__for__content__aboutPage__admin">Редактирование секции - {{ $content->section->header }} </div>
            <a href="{{route('admin.aboutPage')}}" class="btn__return__to__back_admin">Назад</a>
        </div>

        <div class="content__section__for__aboutPage__admin">
            <form method="POST" action="{{route('admin.aboutPage.update', $content)}}"
                  class="form__section__for__aboutPage__admin" enctype="multipart/form-data" autocomplete="off">
                @csrf
                @method('PATCH')

                <div class="block__custom__input__aboutPage__admin">
                    <label for="text" class="label__custom__input__aboutPage__admin">Текст</label>
                    <textarea class="custom__input__aboutPage__admin @error('text') is-invalid @enderror"
                              name="text" id="text" style="height: 200px;">{{ old('text') ?? $content->text }}</textarea>
                    @error('text')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" id="submit" class="btn__for__save__admin">Изменить</button>
            </form>
        </div>
    </section>
@endsection
