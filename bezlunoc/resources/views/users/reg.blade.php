@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <section class="section__reg__for__user">

        <div class="block__for__form__section__reg__for__user">

            <div class="nav__form__section__reg__for__user">
                <a href="{{route('user.auth')}}" class="link__active__nav__form__section__reg__for__user">Вход</a>
                <span class="link__nav__form__section__reg__for__user">Регистрация</span>
            </div>

            <div class="content__for__block__for__form__section__reg__for__user">

                <form class="form__section__reg__for__user" method="POST" action="{{route('reg.store')}}"
                      autocomplete="off">
                    @csrf

                    <div class="block__for__input__form__section__reg__for__user">
                        <div class="block__for__label__input__form__section__reg__for__user">
                            <label for="nameReg">Имя</label>
                            <button class="btn__info__reg__for__user" data-bs-toggle="tooltip" data-bs-html="true"
                                    data-bs-title="Имя должно содержать только русские буквы">
                                <img class="img__btn__info__reg__for__user"
                                     src="{{asset('image/icons/information.png')}}" alt="Информация">
                            </button>
                        </div>
                        <input type="text"
                               class="custom__input__form__section__reg__for__user @error('name') is-invalid @enderror"
                               name="name"
                               id="nameReg" placeholder="Имя" value="{{old('name')}}">
                        @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="block__for__input__form__section__reg__for__user" style="margin-top: 20px">
                        <label for="emailReg">Email</label>
                        <input type="email"
                               class="custom__input__form__section__reg__for__user @error('email') is-invalid @enderror"
                               name="email"
                               id="emailReg" placeholder="Email" value="{{old('email')}}">
                        @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="block__for__input__form__section__reg__for__user" style="margin-top: 20px">

                        <div class="block__for__label__input__form__section__reg__for__user">
                            <label for="passwordReg">Пароль</label>
                            <button class="btn__info__reg__for__user" data-bs-toggle="tooltip" data-bs-html="true"
                                    data-bs-title="Пароль должен содержать латинские буквы, цифры. Не менее 8 символов.">
                                <img class="img__btn__info__reg__for__user"
                                     src="{{asset('image/icons/information.png')}}" alt="">
                            </button>
                        </div>

                        <input type="password"
                               class="custom__input__form__section__reg__for__user @error('password') is-invalid @enderror"
                               name="password"
                               id="passwordReg" placeholder="Пароль">
                        @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="block__for__input__form__section__reg__for__user" style="margin-top: 20px">
                        <label for="numberOfPhoneReg">Номер телефона</label>
                        <input type="text" id="numberOfPhoneReg" class="custom__input__form__section__reg__for__user @error('numberOfPhone') is-invalid @enderror" name="numberOfPhone"  placeholder="Номер телефона" value="{{old('numberOfPhone')}}">
                        @error('numberOfPhone')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn__form__section__reg__for__user">Регистрация</button>
                </form>
            </div>
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
