@extends('layouts.admin_app')

@section('title', 'Расписание')

@section('content')
    <section class="section__for__timeline__admin">

        <div class="block__for__header__for__timeline__admin">
            <div class="header__section__for__content__timeline__index__admin">Расписание</div>
            <div> @include('include.flash_admin') </div>
        </div>

        <div class="block__for__header__two__for__add__timeline__index__admin">
                <form method="GET" action="{{route('admin.timeline.check')}}">
                    <input type="date" class="custom__input__timeline__check__admin" value = "{{ old('checkDate') }}" name="checkDate" onchange="this.form.submit()">
                </form>
            <div class="block__for__btn__for__add__timeline__index__admin">
                <a href="{{ route('admin.time')  }}" class="btn__for__add__admin" style="margin-right: 30px"> Рабочее время </a>
                <a href="{{ route('admin.timeline.create')  }}" class="btn__for__add__admin"> Создать расписание </a>
            </div>
        </div>

        <div class="tab__header__timeline__admin">
            <div class="tab__header__item__timeline__admin active"
                 style="border-right: 1px solid rgba(208, 208, 208, 0.1);" data-target="#tabTL-1">
                Свободное время
            </div>

            <div class="tab__header__item__timeline__admin"
                 style="border-right: 1px solid rgba(208, 208, 208, 0.1); padding-left: 10px;" data-target="#tabTL-2">
                Занятое время
            </div>

            <div class="tab__header__item__timeline__admin" style="padding-left: 10px" data-target="#tabTL-3">
                Полное расписание
            </div>
        </div>

        <div class="tab__body__timeline__admin">
            <div class="tab__body__item__timeline__admin active" id="tabTL-1">
                <table class="table__custom__timeline__for__admin">
                    <thead>
                    <tr>
                        <th>Дата</th>
                        <th>Время</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach((old('timelines') ?? $timelines) as $timeline)
                        @if($timeline->workDay->date > date('Y-m-d H:i:s') && $timeline->freely === 0)
                            <tr>
                                <td>{{ date("d.m.Y", strtotime($timeline->workDay->date)) }}</td>
                                <td>{{ date("H:i", strtotime($timeline->workTime->time)) }}</td>
                                <td style="width: 130px;">
                                    <form method="POST"
                                          action="{{route('admin.timeline.destroy', ['date_id' => $timeline->date_id,'time_id' => $timeline->time_id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn__for__destroy__admin">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="tab__body__item__timeline__admin" id="tabTL-2">
                <table class="table__custom__timeline__for__admin">
                    <thead>
                    <tr>
                        <th>Дата</th>
                        <th>Время</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach((old('timelines') ?? $timelines) as $timeline)
                        @if($timeline->workDay->date > date('Y-m-d H:i:s') && $timeline->freely === 1)
                            <tr>
                                <td>{{ date("d.m.Y", strtotime($timeline->workDay->date)) }}</td>
                                <td>{{ date("H:i", strtotime($timeline->workTime->time)) }}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="tab__body__item__timeline__admin" id="tabTL-3">
                <table class="table__custom__timeline__for__admin">
                    <thead>
                    <tr>
                        <th>Дата</th>
                        <th>Время</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach((old('timelines') ?? $timelines) as $timeline)
                        @if($timeline->workDay->date >date('Y-m-d H:i:s'))
                            <tr>
                                <td>{{ date("d.m.Y", strtotime($timeline->workDay->date)) }}</td>
                                <td>{{ date("H:i", strtotime($timeline->workTime->time)) }}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        const headerItems = document.querySelectorAll('.tab__header__item__timeline__admin');
        const bodyItems = document.querySelectorAll('.tab__body__item__timeline__admin');

        headerItems.forEach(header => {
            header.addEventListener('click', () => {
                clearTab();
                header.classList.add('active');
                document.querySelector(header.dataset.target).classList.add('active');
            });
        });

        function clearTab() {
            headerItems.forEach(item => {
                item.classList.remove('active');
            });

            bodyItems.forEach(item => {
                item.classList.remove('active');
            });
        }

        window.onload = function() {
            let today = new Date();
            let tomorrow = new Date(today.getTime() + (24 * 60 * 60 * 1000));
            let dayTomorrow = tomorrow.toISOString().split('T')[0];
            document.getElementsByName("checkDate")[0].setAttribute('min', dayTomorrow);
        }
    </script>
@endpush
