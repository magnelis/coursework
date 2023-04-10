@extends('layouts.app')

@section('title', 'О студии')

@section('content')

    <section class="section__for__content__about">

        <div class="section__for__block__content__about block__spacing__section__for__block__content__about">
            <div class="text__section__for__block__content__about">
                @foreach($sections->where('id', 5) as $section)
                    <div class="header__section__for__content__about">{{$section->header}}</div>
                @endforeach
                @foreach($contents->where('section_id', 5) as $content)
                    <div class="description__section__for__block__content__about">{{ $content->text }}</div>
                @endforeach
            </div>
            <div class="imgs__one__section__for__block__content__about">
                @foreach($photos->where('id', 1) as $photo)
                    <img src="{{$photo->media}}" class="img__one__one__section__for__block__content__about"
                         alt="{{$photo->section->header}}">
                @endforeach
                @foreach($photos->where('id', 2) as $photo)
                    <img src="{{$photo->media}}" class="img__two__one__section__for__block__content__about"
                         alt="{{$photo->section->header}}">
                @endforeach
                @foreach($photos->where('id', 3) as $photo)
                    <img src="{{$photo->media}}" class="img__three__one__section__for__block__content__about"
                         alt="{{$photo->section->header}}">
                @endforeach
                @foreach($photos->where('id', 4) as $photo)
                    <img src="{{$photo->media}}" class="img__four__one__section__for__block__content__about"
                         alt="{{$photo->section->header}}">
                @endforeach
            </div>
        </div>

        <div class="section__for__block__content__about">
            <div class="text__section__for__block__content__about">
                @foreach($sections->where('id', 6) as $section)
                    <div class="header__section__for__content__about">{{$section->header}}</div>
                @endforeach
                @foreach($contents->where('section_id', 6) as $content)
                    <div class="description__section__for__block__content__about">{{ $content->text }}</div>
                @endforeach
            </div>
            <div class="imgs__second__section__for__block__content__about">
                @foreach($photos->where('id', 5) as $photo)
                    <img src="{{$photo->media}}" class="img__second__section__for__block__content__about"
                         alt="{{$photo->section->header}}">
                @endforeach
                @foreach($photos->where('id', 6) as $photo)
                    <img src="{{$photo->media}}" class="img__second__section__for__block__content__about"
                         alt="{{$photo->section->header}}">
                @endforeach
            </div>
        </div>
    </section>

@endsection



