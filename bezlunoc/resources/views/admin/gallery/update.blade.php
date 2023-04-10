@extends('layouts.admin_app')

@section('title', $tattoo->name)

@section('content')

    <section class="section__for__gallery__admin">

        <div class="block__for__header__section__for__content__edit__gallery__admin">
            <div class="header__section__for__content__gallery__admin">Редактирование работы - {{$tattoo->name}}</div>
            <a href="{{route('admin.gallery')}}" class="btn__return__to__back_admin">Назад</a>
        </div>

        <div class="content__section__for__gallery__admin">

            <img src="{{$tattoo->photo}}" class="img__edit__tattoo_admin" alt="{{$tattoo->name}}">

            <form method="POST" action="{{ route('admin.gallery.update', $tattoo)}}"
                  class="form__section__for__gallery__admin" enctype="multipart/form-data" autocomplete="off">
                @csrf
                @method('PATCH')

                <div class="block__custom__input__edit__tattoo__admin">
                    <label for="name" class="label__custom__input__edit__tattoo__admin"
                           style="margin-top: 0">Название</label>
                    <input type="text" class="custom__input__edit__tattoo__admin @error('name') is-invalid @enderror"
                           name="name" id="name" value= "{{old('name') ?? $tattoo->name}}">
                    @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="block__input__file__custom__wrapper">
                    <input type="file" name="photo" id="photo__edit__admin" class="input__file__custom__wrapper"
                           accept="image/*">
                    <label for="photo__edit__admin" class="label__for__input__file__custom__wrapper">
                        <span class="span__for__input__file__custom__wrapper">
                            <img class="img__for__input__file__custom__wrapper"
                                 src="{{ asset('image/icons/download.png') }}" alt="Выбрать файл">
                        </span>
                        <span class="text__for__input__file__custom__wrapper">Выберите файл</span>
                    </label>
                </div>

                <div class="block__custom__input__edit__tattoo__admin">
                    <label for="style" class="label__custom__input__edit__tattoo__admin">Стиль</label>
                    <select name="style_id" id="style"
                            class="custom__input__edit__tattoo__admin">
                        @foreach($styles as $style)
                            <option
                                value="{{$style->id}}" {{old('style', $tattoo->style_id) == $style->id ? 'selected' : ''}}>{{$style->style}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" id="submit" class="btn__for__save__admin">Изменить</button>
            </form>
        </div>
    </section>
@endsection

@push('script')
    <script>
        let inputFile = document.getElementById('photo__edit__admin');

        inputFile.addEventListener('change', () => {
            let fr = new FileReader();
            fr.readAsDataURL(inputFile.files[0]);
            fr.onload = () => {
                document.querySelector('.img__edit__tattoo_admin').src = fr.result;
            }
        });
    </script>
@endpush
