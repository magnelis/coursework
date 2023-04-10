@extends('layouts.app')

@section('title', 'Запись на консультацию')

@section('content')
    <section class="section__record__for__user">
        <form method="POST" action="{{route('user.record.store')}}" class="form__section__record__for__user"
              enctype="multipart/form-data">
            @csrf

            <div class="header__section__record__for__user">Записаться на консультацию</div>

            <div class="block__custom__input__for__record__user">
                <label for="dateRecord" class="label__custom__input__for__record__user">Дата</label>
                <input type="date" name="date" id="dateRecord"
                       class="custom__input__date__record__for__user @error('date') is-invalid @enderror">
                @error('date')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>


            <div class="block__custom__input__for__record__user">
                <label for="time" class="label__custom__input__for__record__user">Время</label>
                <select name="time_id" id="time"
                        class="custom__input__for__record__user @error('time') is-invalid @enderror">
                    <option value="" selected disabled hidden>Выберите время</option>
                </select>
                @error('time')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="block__custom__input__for__record__user">
                <label for="style" class="label__custom__input__for__record__user">Стиль</label>
                <select name="style_id" id="style"
                        class="custom__input__for__record__user @error('style_id') is-invalid @enderror">
                    <option value="" selected disabled hidden>Выберите стиль</option>
                    @foreach($styles as $style)
                        <option data-price="{{$style->price}}" value="{{$style->id}}">{{$style->style}}</option>
                    @endforeach
                </select>
                @error('style_id')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="block__custom__input__for__record__user">
                <label for="size" class="label__custom__input__for__record__user">Размер</label>
                <select name="size_id" id="size"
                        class="custom__input__for__record__user @error('size_id') is-invalid @enderror">
                    <option value="" selected disabled hidden>Выберите размер</option>
                    @foreach($sizes as $size)
                        <option value="{{$size->id}}" data-price="{{$size->price}}">{{$size->size}}</option>
                    @endforeach
                </select>
                @error('size_id')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="avg__price__section__record__for__user">Стоимость работы от: <span
                    class="totalPrice"> 3000 ₽</span></div>

            <div class="block__for__btn__section__record__for__user">
                <a href="{{route('user.profile')}}" class="btn__return__to__back__record responsive__btn__return__to__back__record">Назад</a>
                <button type="submit" id="submit" class="btn__section__record__for__user">Записаться</button>
            </div>
        </form>
    </section>
@endsection

@push('script')
    <script>
        let selectTime = document.getElementById('time');
        let btn = document.querySelector('.btn__section__record__for__user');

        window.onload = function() {
            let today = new Date();
            let tomorrow = new Date(today.getTime() + (24 * 60 * 60 * 1000));
            let dayTomorrow = tomorrow.toISOString().split('T')[0];
            document.getElementsByName("date")[0].setAttribute('min', dayTomorrow);
        }

        async function getData(route, param = null) {
            if (param != null) {
                route += '?' + param;
            }
            console.log(route)
            let response = await fetch(route);
            return await response.json();
        }

        document.getElementById('dateRecord').addEventListener('change', async (e) => {
            async function getTimes() {
                let param = new URLSearchParams();
                param.append('date', e.target.value);

                const times = await getData('{{ route("user.getNumberDay") }}', param);
                const time = document.getElementById('time');
                time.innerHTML = '';
                if (times != 'no' && times.length != 0) {
                    times.forEach(item => {
                        selectTime.disabled = false;
                        let newOption = new Option(item.time, item.id);
                        btn.disabled = false;
                        time.append(newOption);
                    });
                } else if (times.length === 0) {
                    selectTime.disabled = true;
                    let newOption = new Option('Нет доступного времени', 0);
                    btn.disabled = true;
                    time.append(newOption);
                } else {
                    selectTime.disabled = true;
                    let newOption = new Option('Нет доступного времени', 0);
                    btn.disabled = true;
                    time.append(newOption);
                }
            }

            await getTimes();
        });

        let totalPrice = document.querySelector('.totalPrice');

        let selectStyle = document.getElementById("style");
        let selectSize = document.getElementById("size");

        selectStyle.onchange = getTotalPrice;
        selectSize.onchange = getTotalPrice;

        function getTotalPrice() {

            let priceStyle = selectStyle.selectedOptions[0].dataset.price;
            let priceSize = selectSize.selectedOptions[0].dataset.price;

            console.log(priceSize, priceStyle)
            if (priceStyle !== '' && priceSize !== '') {
                totalPrice.textContent = ~~priceStyle + ~~priceSize + "₽";
            }
        }
    </script>
@endpush
