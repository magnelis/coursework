@extends('layouts.admin_app')

@section('title', 'Редактирование контактной информации')

@section('content')
    <section class="section__for__contacts__admin">

        <div class="block__for__header__for__contacts__admin">
            <div class="header__section__for__content__contacts__index__admin">Редактирование контактной информации
            </div>
            <a href="{{route('admin.contactsPage')}}" class="btn__return__to__back_admin">Назад</a>
        </div>

        <div class="content__section__for__contacts__admin">
            <form method="POST" action="{{route('admin.contactsPage.update', $content)}}"
                  class="form__section__for__contacts__admin" enctype="multipart/form-data" autocomplete="off">
                @csrf
                @method('PATCH')

                <div class="block__custom__input__contacts__admin">
                    <textarea class="custom__input__contacts__admin @error('text') is-invalid @enderror"
                              name="text" id="text" style="height: 200px;">{{ $content->text }}</textarea>
                    @error('text')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" id="submit" class="btn__for__save__admin">Изменить</button>
            </form>
        </div>
    </section>
@endsection

