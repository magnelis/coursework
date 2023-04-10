@extends('layouts.admin_app')

@section('title', 'Авторизация')

@section('content')
    <section class="section__auth__for__admin">

        <div class="block__for__form__section__auth__for__admin">

            <div class="content__for__block__for__form__section__auth__for__admin">
                <form class="form__section__auth__for__admin" method="POST" action="{{route('admin.login.check')}}" autocomplete="off">
                    @csrf

                    <div class="block__for__input__form__section__auth__for__admin">
                        <label for="loginAuth">Логин</label>
                        <input type="text"
                               class="custom__input__form__section__auth__for__admin @error('login') is-invalid @enderror"
                               name="login" id="loginAuth" placeholder="Логин">
                        @error('login')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="block__for__input__form__section__auth__for__admin" style="margin-top: 20px">
                        <label for="passwordAuth">Пароль</label>
                        <input type="password"
                               class="custom__input__form__section__auth__for__admin @error('password') is-invalid @enderror"
                               name="password"
                               id="passwordAuth" placeholder="Пароль">
                        @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn__form__section__auth__for__admin">Войти</button>

                    @error('errorLogin')
                    <div class="alert__danger__custom__for__auth__for__admin" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </form>
            </div>
        </div>
    </section>

@endsection
