@extends('layouts.app')

@section('title', 'Тату-студия Bezlunoc')

@section('content')

    <section class="start__section__main">
        <div class="video__start__section__main">
            <video class="video__media__start__section__main" src="{{asset('/image/video.mp4')}}" autoplay muted loop></video>
        </div>
        <section class="content__start__section__main">
            <div class="header__content__start__section__main">Bezlunoc | Tattoo studio</div>
            <div class="description__content__start__section__main">Место, где творится настоящее искусство.</div>
            @guest()
                <a href="{{ route('user.auth') }}" class="btn__content__start__section__main">Записаться на консультацию</a>
            @endguest
            @auth()
                <a href="{{ route('user.profile') }}" class="btn__content__start__section__main">Записаться на консультацию</a>
            @endauth
        </section>
    </section>

    <section class="section__for__content__main">
        @foreach($sections->where('id', 1) as $section)
            <div class="header__section__for__content__main">{{$section->header}}</div>
        @endforeach
        <div class="content__galleryOfWork__section__main">
            @foreach($photosTattoo as $photo)
                <img src="{{$photo->photo}}" class="image__galleryOfWork__section__main" alt="НАЗВАНИЕ">
            @endforeach
        </div>
        <a href="{{route('page.gallery')}}" class="btn__gallery__of__work__main__main">Посмотреть все работы</a>
    </section>

    <section class="section__for__content__main">
        @foreach($sections->where('id', 2) as $section)
            <div class="header__section__for__content__main">{{$section->header}}</div>
        @endforeach
        <div class="items__importantToUs__section__main">
            @foreach($contents->where('section_id', 2) as $content)
                <div class="item__importantToUs__section__main">
                    <div class="header__item__importantToUs__section__main">
                        <span class="content__header__item__importantToUs__section__main">{{$content->header}}</span>
                    </div>
                    <div class = "text__item__importantToUs__section__main">{{$content->text}}</div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="section__for__content__main">
        @foreach($sections->where('id', 3) as $section)
            <div class="header__qaa__section__for__content__main">{{$section->header}}</div>
        @endforeach
        <div class="accordion__qaa__section__main">
            @foreach($contents->where('section_id', 3) as $content)
                <div class="content__accordion__qaa__section__main">
                    <input class="input__content__accordion__qaa__section__main" type="checkbox" id="{{$content->id}}" aria-labelledby="{{$content->id}}">
                    <label class="label__content__accordion__qaa__section__main" for="{{$content->id}}">
                        {{$content->header}}
                        <img class = "image__accordion__qaa__section__main" src="{{ asset('image/icons/downArrow.png') }}" alt="Подробнее">
                    </label>
                    <div class="text__content__accordion__qaa__section__main">
                        {{$content->text}}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@push('script')
    <script>
           document.querySelectorAll('.label__content__accordion__qaa__section__main').forEach((btn) => {
                btn.addEventListener('click', e => {
                    const currentImg = e.target.querySelector('.image__accordion__qaa__section__main')
                    currentImg.classList.toggle('down__arrow')
                })
            })
    </script>
@endpush
