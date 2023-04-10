@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')

    <section class="section__auth__for__user">

        <div class="block__for__form__section__auth__for__user">

            <div class="nav__form__section__auth__for__user">
                <span class="link__nav__form__section__auth__for__user">Вход</span>
                <a href="{{route('user.reg')}}"
                   class="link__active__nav__form__section__auth__for__user">Регистрация</a>
            </div>

            <div class="content__for__block__for__form__section__auth__for__user">
                <form class="form__section__auth__for__user" method="POST" action="{{route('login.check')}}" autocomplete="off">
                    @csrf

                    <div class="block__for__input__form__section__auth__for__user">
                        <label for="emailAuth">Email</label>
                        <input type="text" class="custom__input__form__section__auth__for__user @error('email') is-invalid @enderror" name="email"
                               id="emailAuth"
                               placeholder="Email" value="{{old('email')}}">
                        @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="block__for__input__form__section__auth__for__user" style="margin-top: 20px">
                        <label for="passwordAuth">Пароль</label>
                        <input type="password" class="custom__input__form__section__auth__for__user @error('password') is-invalid @enderror" name="password"
                               id="passwordAuth" placeholder="Пароль">
                        @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-top: 12px">
                        <input type="checkbox" class="custom__checkbox__form__section__auth__for__user"
                               name="remember_me"
                               id="remember_me"/>
                        <label for="remember_me" class="custom__label__form__section__auth__for__user">Запомнить
                            меня</label>
                    </div>

                    <button type="submit" class="btn__form__section__auth__for__user">Войти</button>

                    @error('errorLogin')
                    <div class="alert__danger__custom__for__auth__for__user" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </form>
            </div>
        </div>
    </section>
@endsection
