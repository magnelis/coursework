@extends('layouts.app')

@section('title', 'Галерея работ')

@section('content')

    <section class="section__for__content__gallery">
        @foreach($sections->where('id', 4) as $section)
            <div class="section__header__section__for__content__gallery">
                <div class="header__section__for__content__gallery">{{ $section->header }}</div>
                @include('include.filter_in_gallery')
            </div>
        @endforeach
        <div class="works__content__section__gallery">
            @foreach((old('tattoos') ?? $tattoos) as $tattoo)
                <img src="{{ asset($tattoo->photo) }}" alt="{{ $tattoo->name }}" data-style="{{ $tattoo->style->style }}"
                     class="photo__work__section__gallery">
            @endforeach
        </div>

        <div class="pagination__section__gallery">
            {{ $tattoos->appends(['style_id' => request('style')])->links() }}
        </div>

        <div id="modal__window__section__gallery" class="modal__window__section__gallery">
            <div class="content__modal__window__section__gallery">
                <img src="" alt="" class="img__work__modal__section__gallery">
                <div class="description__content__modal__window__section__gallery">
                    <img src="{{asset('image/icons/close.png')}}" class="img__close__modal__section__gallery">
                    <div class="content__description__content__modal__window__section__gallery"></div>
                </div>
            </div>
        </div>

    </section>

@endsection

@push('script')
    <script>
        let modal = document.getElementById("modal__window__section__gallery");
        let image = document.querySelector('.img__work__modal__section__gallery');
        let text = document.querySelector('.content__description__content__modal__window__section__gallery')
        let btnClose = document.querySelector('.img__close__modal__section__gallery');

        modal.classList.add('hide');

        window.onclick = function (e) {
            if (e.target === modal) {
                modal.classList.add('hide');
            }
        }

        btnClose.addEventListener('click', closeModal);

        function closeModal() {
            modal.classList.add('hide');
        }

        modal.addEventListener('click', (e) => {
            if (e.target === e.currentTarget) {
                closeModal();
            }
        });

        document.addEventListener('keydown', e => {
            if (e.code === 'Escape') {
                closeModal();
            }
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('photo__work__section__gallery')) {
                modal.classList.remove('hide');
                image.setAttribute('src', e.target.src);
                image.setAttribute('alt', e.target.alt);
                text.textContent = e.target.dataset.style
            }
        });

        const prevImg = document.querySelector('[aria-label="« Previous"]')
        prevImg.innerHTML = `<img src="{{asset('image/icons/prev.png')}}" class="img__btn__paginat__section__gallery">`;

        const nextImg = document.querySelector('[aria-label="Next »"]')
        nextImg.innerHTML = `<img src="{{asset('image/icons/next.png')}}" class="img__btn__paginat__section__gallery">`;
    </script>
@endpush


