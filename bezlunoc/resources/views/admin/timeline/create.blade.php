@extends('layouts.admin_app')

@section('title', 'Добавление расписания')

@section('content')

    <section class="section__for__timeline__admin">

        <div class="block__for__header__section__for__content__timeline__admin">
            <div class="header__section__for__content__create__timeline__admin">Добавление расписания</div>
            <a href="{{route('admin.timeline')}}" class="btn__return__to__back_admin">Назад</a>
        </div>

        <div class="block__for__content__timeline__admin">

            <img src="{{ asset('image/timelines.png') }}" alt="Просто картинка^^"
                 class="img__section__for__timeline__admin">

            <div class="content__section__timeline__for__timeline__admin">
                <div class = "error__content__section__timeline__for__timeline__admin"> @include('include.flash_admin') </div>
                <form method="POST" action="{{route('admin.timeline.store')}}"
                      class="form__section__for__timeline__admin"
                      enctype="multipart/form-data">
                    @csrf

                    <div class = "block__for__custom__input__timeline__admin">
                        <input type="date" class="custom__input__timeline__admin @error('date') is-invalid @enderror" value = "{{ old('date') }}" name="date">
                        @error('date')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <div class="block__custom__checkbox__all__timeline__admin">
                            <input id="select_all" type="checkbox" class="custom__checkbox__timeline__admin">
                            <label id="labelSelectAll" for="select_all" class="custom__label__timeline__admin">Выделить
                                все</label>
                        </div>

                        @foreach($times as $time)
                            <div class="block__custom__checkbox__timeline__admin">
                                <input name="time[]" class="custom__checkbox__timeline__admin checkbox__time__admin" type="checkbox" id="{{$time->id}}" value="{{$time->id}}">
                                <label for="{{$time->id}}" class="custom__label__timeline__admin">{{$time->time}}</label>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" id="submit" class="btn__for__save__admin btn__for__timeline__admin">Добавить
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        let labelSelectAll = document.getElementById('labelSelectAll');
        let count = 0;
        let els = document.querySelectorAll('input[name="time[]"]');

        document.getElementById('select_all').addEventListener('click', function (e) {
            count++;
            Array.prototype.forEach.call(els, function (cb) {
                cb.checked = e.target.checked;
                if (count % 2 === 0) {
                    labelSelectAll.textContent = "Выделить все"
                } else {
                    labelSelectAll.textContent = "Снять все"
                }
            });
        });
    </script>
@endpush
