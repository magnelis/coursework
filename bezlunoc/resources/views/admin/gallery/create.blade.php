@extends('layouts.admin_app')

@section('title', 'Добавление работы')

@section('content')
    <section class="section__for__gallery__admin">

        <div class="block__for__header__section__for__content__edit__gallery__admin">
            <div class="header__section__for__content__gallery__admin">Добавление работы</div>
            <a href="{{route('admin.gallery')}}" class="btn__return__to__back_admin">Назад</a>
        </div>

        <div class="content__section__add__for__gallery__admin">

            <form method="POST" action="{{route('admin.gallery.store')}}" class="form__section__for__gallery__admin"
                  enctype="multipart/form-data" autocomplete="off">
                @csrf

                <div class="block__custom__input__add__tattoo__admin">
                    <label for="name" class="label__custom__input__add__tattoo__admin"
                           style="margin-top: 0">Название</label>
                    <input type="text" class="custom__input__add__tattoo__admin @error('name') is-invalid @enderror"
                           name="name" id="name" value="{{old('name')}}">
                    @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="block__input__file__add__custom__wrapper">
                    <input name="photo" type="file" id="photo__add__admin"
                           class="input__file__add__custom__wrapper @error('photo') is-invalid @enderror"
                           accept="image/*">
                    <label for="photo__add__admin" class="label__for__input__file__add__custom__wrapper">
                        <span class="span__for__input__file__add__custom__wrapper">
                            <img class="img__for__input__file__add__custom__wrapper"
                                 src="{{ asset('image/icons/download.png') }}" alt="Выбрать файл">
                        </span>
                        <span class="text__for__input__file__add__custom__wrapper">Выберите файл</span>
                    </label>
                    @error('photo')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div id="prev__img__create__tattoo__admin"></div>

                <div class="block__custom__input__add__tattoo__admin">
                    <label for="style" class="label__custom__input__add__tattoo__admin">Стиль</label>
                    <select name="style_id" id="style"
                            class="custom__input__add__tattoo__admin">
                        @foreach($styles as $style)
                            <option value="{{$style->id}}">{{$style->style}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" id="submit" class="btn__for__save__admin">Добавить</button>
            </form>
        </div>
    </section>
@endsection

@push('script')
    <script>
        let inputFile = document.getElementById('photo__add__admin');
        let prevImg = document.getElementById('prev__img__create__tattoo__admin');
        let figure = document.createElement('figure');
        let img = document.createElement('img');

        inputFile.addEventListener('change', (e) => {
            let fr = new FileReader();
            fr.readAsDataURL(inputFile.files[0]);
            fr.onload = () => {
                img.src = fr.result;
                img.classList.add('prev__img__create__tattoo__admin');
                figure.append(img);
                prevImg.append(figure);
            }
        });
    </script>
@endpush
