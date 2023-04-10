@extends('layouts.app')

@section('title', 'Смена пароля')

@section('content')
    <section class="section__profile__for__user">

        <div class="block__for__header__profile__for__user">
            <div class="header__profile__for__user">Смена пароля</div>
            <a href="{{route('user.profile.update')}}" class="btn__return__to__back__profile">Назад</a>
        </div>

        <div class = "block__for__error__section__profile__for__user">
            @include('include.flash')
        </div>

        <div class="info__about__user__profile__for__user">

            <form method="POST" class="form__info__about__user__profile__for__user"
                  action="{{route('user.update.password', auth()->user()->id)}}" autocomplete="off">
                @csrf
                @method('PATCH')

                <div class="block__for__input__form__section__profile__for__user">
                    <label for="oldPasswordProfile" class="label__custom__input__form__section__profile__for__user">Старый
                        пароль</label>
                    <input type="password"
                           class="custom__input__form__section__profile__for__user @error('oldPassword') is-invalid @enderror"
                           name="oldPassword" id="oldPasswordProfile">
                    @error('oldPassword')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="block__for__input__form__section__profile__for__user" style="margin-top: 20px">

                    <div class="block__for__label__input__form__section__reg__for__user">
                        <label for="passwordProfile">Новый
                            пароль</label>
                        <button class="btn__info__profile__for__user" data-bs-toggle="tooltip" data-bs-html="true"
                                data-bs-title="Пароль должен содержать латинские буквы, цифры. Не менее 8 символов.">
                            <img class="img__btn__profile__for__user"
                                 src="{{asset('image/icons/information.png')}}" alt="Информация">
                        </button>
                    </div>

                    <input type="password"
                           class="custom__input__form__section__profile__for__user @error('password') is-invalid @enderror"
                           name="password" id="passwordProfile">
                    @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn__for__edit__save__user"> Сохранить</button>

            </form>
        </div>
    </section>
@endsection

@push('script')
    <script src="https://unpkg.com/imask"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        let phoneMask = IMask(
            document.getElementById('numberOfPhoneReg'), {
                mask: '+{7}(000)000-00-00'
            });
    </script>
@endpush
