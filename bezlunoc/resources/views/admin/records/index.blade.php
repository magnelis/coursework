@extends('layouts.admin_app')

@section('title', 'Записи')

@section('content')
    <section class="section__for__records__admin">

        <div class="block__for__header__for__records__admin">
            <div class="header__section__for__content__records__index__admin">Записи</div>
            <div> @include('include.flash_admin') </div>
        </div>

        <div class="tab__header__records__admin">
            <div class="tab__header__item__records__admin active"
                 style="border-right: 1px solid rgba(208, 208, 208, 0.1);" data-target="#tabTL-1">
                Ближайшие консультации
            </div>

            <div class="tab__header__item__records__admin"
                 style="border-right: 1px solid rgba(208, 208, 208, 0.1); padding-left: 10px;" data-target="#tabTL-2">
                Прошедшие консультации
            </div>

            <div class="tab__header__item__records__admin"
                 style="border-right: 1px solid rgba(208, 208, 208, 0.1); padding-left: 10px;" data-target="#tabTL-3">
                Отменные консультации
            </div>
        </div>

        <div class="tab__body__records__admin">
            <div class="tab__body__item__records__admin active" id="tabTL-1">
                <table class="table__custom__records__for__admin">
                    <thead>
                    <tr>
                        <th>Дата</th>
                        <th>Время</th>
                        <th>Клиент</th>
                        <th>Стиль</th>
                        <th>Размер</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach((old('recordsImmediate') ?? $recordsImmediate) as $record)
                            <tr>
                                <td>{{ date("d.m.Y", strtotime($record->date->date)) }}</td>
                                <td>{{ date("H:i", strtotime($record->time->time)) }}</td>
                                <td>{{ $record->user->name }}</td>
                                <td>{{ $record->style->style }}</td>
                                <td>{{ $record->size->size }}</td>
                                <td style="width: 270px;"><a href="{{route('admin.users.show', $record->user->id)}}" class="btn__for__edit__admin">Подробнее о клиенте</a>
                                </td>
                                <td style="width: 212px;">
                                    @if ($record->date->date > date('Y-m-d H:i:s'))
                                        <form method="POST" action="{{route('admin.records.cancelRecord', $record->id)}}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn__for__destroy__admin">Отменить запись
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab__body__records__admin">
            <div class="tab__body__item__records__admin" id="tabTL-2">
                <table class="table__custom__records__for__admin">
                    <thead>
                    <tr>
                        <th>Дата</th>
                        <th>Время</th>
                        <th>Клиент</th>
                        <th>Стиль</th>
                        <th>Размер</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach((old('recordsPast') ?? $recordsPast) as $record)
                            <tr>
                                <td>{{ date("d.m.Y", strtotime($record->date->date)) }}</td>
                                <td>{{ date("H:i", strtotime($record->time->time)) }}</td>
                                <td>{{ $record->user->name }}</td>
                                <td>{{ $record->style->style }}</td>
                                <td>{{ $record->size->size }}</td>
                                <td style="width: 252px;"><a href="{{route('admin.users.show', $record->user->id)}}" class="btn__for__edit__admin">Подробнее о клиенте</a></td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab__body__records__admin">
            <div class="tab__body__item__records__admin" id="tabTL-3">
                <table class="table__custom__records__for__admin">
                    <thead>
                    <tr>
                        <th>Дата</th>
                        <th>Время</th>
                        <th>Клиент</th>
                        <th>Стиль</th>
                        <th>Размер</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach((old('recordsCanceled') ?? $recordsCanceled) as $record)
                            <tr>
                                <td>{{ date("d.m.Y", strtotime($record->date->date)) }}</td>
                                <td>{{ date("H:i", strtotime($record->time->time)) }}</td>
                                <td>{{ $record->user->name }}</td>
                                <td>{{ $record->style->style }}</td>
                                <td>{{ $record->size->size }}</td>
                                <td style="width: 252px;"><a href="{{route('admin.users.show', $record->user->id)}}" class="btn__for__edit__admin">Подробнее о клиенте</a></td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection

@push('script')
    <script>
        const headerItems = document.querySelectorAll('.tab__header__item__records__admin');
        const bodyItems = document.querySelectorAll('.tab__body__item__records__admin');

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
    </script>
@endpush
