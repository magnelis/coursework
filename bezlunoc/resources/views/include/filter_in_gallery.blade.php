<form method="GET" action="{{ route('page.gallery') }}" class="form__filter__in__section__gallery">
    <div class="filter__in__section__gallery">
        <div class="header__filter__in__section__gallery">Отфильтровать по стилю:</div>
        <div class="btns__for__sort__form__section__gallery">
            @foreach($styles as $style)
                <div class="block__for__checkbox__form__section__gallery">
                    <input type="checkbox" class="custom__checkbox__form__section__gallery" name="style[]"
                           id="{{$style->id}}" value="{{$style->id}}"
                           {{ in_array($style->id, request('style') ?? []) ? 'checked' : '' }} onchange="this.form.submit()">
                    <label for="{{$style->id}}" class="custom__label__form__section__gallery">{{$style->style}}</label>
                </div>
            @endforeach
        </div>
    </div>
</form>





