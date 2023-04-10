@extends('layouts.admin_app')

@section('title', 'Страницы')

@section('content')
    <section class="section__for__pages__admin">

        <div class="header__section__for__content__pages__index__admin">Доступные страницы для редактирования:</div>

        <div class = "block__for__btn__pages__admin">
            <a href="{{route('admin.mainPage')}}" class="btn__for__edit__admin btn__for__pages__admin">Главная</a>
            <a href="{{route('admin.aboutPage')}}" class="btn__for__edit__admin btn__for__pages__admin">О студии</a>
            <a href="{{route('admin.contactsPage')}}" class="btn__for__edit__admin">Контакты</a>
        </div>

    </section>
@endsection
