@extends('layouts.admin_app')

@section('title', 'BEZLUNOC')

@section('content')
    <section class="section__for__content__admin__index">
        <div class="block__for__information__for__content__admin__index">

            <div class="block__for__records__for__content__admin__index">
                <div class="block__for__header__table__custom__for__content__admin__index">
                    <div class="header__table__custom__for__content__admin__index">Ближайшие записи</div>
                    <a href="{{route('admin.records')}}" class="link__header__table__custom__for__content__admin__index">Все</a>
                </div>

                <table class="table__custom__for__content__admin__index">
                    <thead>
                    <tr>
                        <th>Дата</th>
                        <th>Время</th>
                        <th>Клиент</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{ date("d.m.Y", strtotime($record->date->date)) }}</td>
                            <td>{{ date("H:i", strtotime($record->time->time)) }}</td>
                            <td>{{ $record->user->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="block__for__records__for__content__admin__index">
                <div class="block__for__header__table__custom__for__content__admin__index">
                    <div class="header__table__custom__for__content__admin__index">Последние зарегистрировавшиеся клиенты</div>
                    <a href="{{route('admin.users')}}" class="link__header__table__custom__for__content__admin__index">Все</a>
                </div>

                <table class="table__custom__for__content__admin__index">
                    <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="block__for__tattoo__for__content__admin__index">
            <div class="block__for__header__table__custom__for__content__admin__index">
                <div class="header__table__custom__for__content__admin__index">Последние добавленные работы</div>
                <a href="{{route('admin.gallery')}}" class="link__header__table__custom__for__content__admin__index">Все</a>
            </div>
            <div class="block__for__imgs__for__content__admin__index">
                @foreach($tattoos as $tattoo)
                    <img src="{{ asset($tattoo->photo) }}" alt="{{ $tattoo->name }}"
                         class="img__tattoo__for__content__admin__index">
                @endforeach
            </div>
        </div>
    </section>
@endsection
