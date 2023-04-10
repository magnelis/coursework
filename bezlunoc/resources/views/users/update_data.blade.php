@extends('layouts.app')

@section('title', 'Изменение данных')

@section('content')
    <section class="section__profile__for__user">

        <div class="block__for__header__profile__for__user">
            <div class="header__profile__for__user">Редактирование профиля</div>
            <a href="{{route('user.profile')}}" class="btn__return__to__back__profile">Назад</a>
        </div>

        <div class = "block__for__error__section__profile__for__user">
            @include('include.flash')
        </div>


        <div class="info__about__user__profile__for__user">

            <form method="POST" action="{{route('user.update', auth()->user()->id)}}" autocomplete="off">
                @csrf
                @method('PATCH')

                <div class="form__info__about__user__profile__for__user">

                    <div class="block__for__input__form__section__profile__for__user">
                        <label for="nameProfile"
                               class="label__custom__input__form__section__profile__for__user">Имя</label>
                        <input type="text"
                               class="custom__input__form__section__profile__for__user @error('name') is-invalid @enderror"
                               name="name" id="nameProfile" value= {{auth()->user()->name}}>
                        @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="block__for__input__form__section__profile__for__user" style="margin-top: 20px">
                        <label for="emailProfile"
                               class="label__custom__input__form__section__profile__for__user">Email</label>
                        <input type="email"
                               class="custom__input__form__section__profile__for__user @error('email') is-invalid @enderror"
                               name="email" id="emailProfile" value= {{auth()->user()->email}}>
                        @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="block__for__input__form__section__profile__for__user" style="margin-top: 20px">
                        <label for="numberOfPhoneProfile"
                               class="label__custom__input__form__section__profile__for__user">Номер телефона</label>
                        <input type="text"
                               class="custom__input__form__section__profile__for__user @error('numberOfPhone') is-invalid @enderror"
                               name="numberOfPhone" id="numberOfPhoneProfile" value= {{auth()->user()->numberOfPhone}}>
                        @error('numberOfPhone')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="btns__btn__for__edit__save__user">
                    <a href="{{route('user.profile.update.password')}}" class="btn__for__edit__save__user">Сменить пароль</a>
                    <button type="submit" class="btn__for__edit__save__user"> Сохранить</button>
                </div>
            </form>
        </div>
    </section>

@endsection

@push('script')
    <script src="https://unpkg.com/imask"></script>
    <script>
        let phoneMask = IMask(
            document.getElementById('numberOfPhoneProfile'), {
                mask: '+{7}(000)000-00-00'
            });
    </script>
@endpush
