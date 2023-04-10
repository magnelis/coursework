<form method="GET" action="{{route('admin.gallery.filter')}}">
    <div class="filter__in__section__gallery__admin">
        <div class="header__filter__in__section__gallery__admin">Отфильтровать по стилю:</div>
        <div class = "block__for__custom__check__admin">

            <div class = "block__for__input__custom__filter__in__section__gallery">
                <input class="input__custom__filter__in__section__gallery" type="radio" name="style" id="all" value="all" onchange="this.form.submit()" checked>
                <label class="label__custom__filter__in__section__gallery" for="all">
                    Все работы
                </label>
            </div>

            @foreach($styles as $style)
                <div class = "block__for__input__custom__filter__in__section__gallery">
                    <input class="input__custom__filter__in__section__gallery" type="radio" name="style" id="{{$style->id}}" value="{{$style->id}}" {{ old('style') == $style->id ? 'checked' : "" }} onchange="this.form.submit()">
                    <label class="label__custom__filter__in__section__gallery" for="{{$style->id}}">
                        {{$style->style}}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</form>





