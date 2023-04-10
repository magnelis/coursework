@extends('layouts.admin_app')

@section('title', 'Редактирование секции - ' . $media->section->header)

@section('content')
    <section class="section__for__aboutPage__admin">

        <div class="block__for__header__for__aboutPage__admin">
            <div class="header__section__for__content__aboutPage__admin">Редактирование секции
                - {{ $media->section->header }} </div>
            <a href="{{route('admin.aboutPage')}}" class="btn__return__to__back_admin">Назад</a>
        </div>

        <div class="content__section__for__edit__aboutPage__admin">

            <img src="{{asset($media->media)}}" class="img__edit__aboutPage__admin" alt="{{$media->name}}">

            <form method="POST" action="{{route('admin.aboutPage.media.update', $media)}}"
                  class="form__section__for__aboutPage__admin" enctype="multipart/form-data" autocomplete="off">
                @csrf
                @method('PATCH')

                <div class="block__input__file__custom__wrapper__aboutPage">
                    <input type="file" name="photo" id="photo__edit__aboutPage__admin"
                           class="input__file__custom__wrapper__aboutPage @error('photo') is-invalid @enderror"
                           accept="image/*">
                    <label for="photo__edit__aboutPage__admin"
                           class="label__for__input__file__custom__wrapper__aboutPage">
                        <span class="span__for__input__file__custom__wrapper__aboutPage">
                            <img class="img__for__input__file__custom__wrapper__aboutPage"
                                 src="{{ asset('image/icons/download.png') }}" alt="Выбрать файл">
                        </span>
                        <span class="text__for__input__file__custom__wrapper__aboutPage">Выберите файл</span>
                    </label>
                    @error('photo')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" id="submit" class="btn__for__save__admin">Изменить</button>
            </form>
        </div>
    </section>
@endsection

@push('script')
    <script>
        let inputFile = document.getElementById('photo__edit__aboutPage__admin');

        inputFile.addEventListener('change', () => {
            let fr = new FileReader();
            fr.readAsDataURL(inputFile.files[0]);
            fr.onload = () => {
                document.querySelector('.img__edit__aboutPage__admin').src = fr.result;
            }
        });
    </script>
@endpush
