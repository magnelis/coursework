@extends('layouts.app')

@section('title', 'Контакты')

@section('content')

    <section class="section__for__content__contacts">
        <div class="block__spacing__section__for__block__content__contacts">
            <div class="text__section__for__block__content__contacts">
                @foreach($sections->where('id', 7) as $section)
                    <div class="header__section__for__content__contacts">{{$section->header}}</div>
                @endforeach
                <div>
                    @foreach($contents->where('id', 10) as $content)
                        <div class="contacts__section__for__block__content__contacts">{{ $content->text }}</div>
                    @endforeach
                    @foreach($contents->where('id', 11) as $content)
                        <div class="contacts__section__for__block__content__contacts">{{ $content->text }}</div>
                    @endforeach
                    <div class="links__content__contacts">
                        Социальные сети:
                        <div class="block__for__links__content__contacts">
                            @foreach($contents->where('id', 12) as $content)
                                <a href="{{$content->text}}" style="margin-bottom: 5px;"
                                   class="link__custom__for__links__content__contacts"
                                   target="_blank">{{$content->header}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="map__section__contacts">
        @foreach($contents->where('id', 13) as $content)
            <script type="text/javascript" charset="utf-8" async src="{{$content->text}}"></script>
        @endforeach
    </div>

@endsection


