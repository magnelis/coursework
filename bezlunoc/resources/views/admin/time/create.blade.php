@extends('layouts.admin_app')

@section('title', 'Добавление времени')

@section('content')
    <section class="section__for__time__admin">

        <div class="block__for__header__section__for__content__time__admin">
            <div class="header__section__for__content__time__admin">Добавление времени</div>
            <a href="{{route('admin.time')}}" class="btn__return__to__back_admin">Назад</a>
        </div>

        <div class="block__for__content__time__admin">

            <img src="{{ asset('image/timelines.png') }}" alt="Просто картинка^^"
                 class="img__section__for__time__admin">

            <div class="content__section__for__time__admin">
                <div class = "error__content__section__time__for__timeline__admin"> @include('include.flash_admin') </div>
                <form method="POST" action="{{ route('admin.time.store') }}" class="form__section__for__time__admin">
                    @csrf
                    <div class = "block__for__custom__input__time__admin">
                        <input name="time" type="time" class="custom__input__time__admin @error('time') is-invalid @enderror" value = "{{ old('time') }}">
                        @error('time')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" id="submit" class="btn__for__save__admin btn__for__time__admin">Добавить
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
