@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('content')
    <section class="section__profile__for__user">

        <div class="block__for__header__profile__for__user">
            <div class="header__profile__for__user">Личный кабинет</div>
            @include('include.flash')
        </div>

        <div class="block__for__btns__section__profile__for__user">
            <a href="{{route('user.record')}}"
               class="btn__header__profile__for__user btn__block__for__btns__section__profile__for__user">Записаться</a>
            <a href="{{route('user.profile.update')}}" class="btn__header__profile__for__user">Редактировать профиль</a>
        </div>

        @if(count($records) === 0)
            <div class="header__two__profile__for__user">Пока что тут пусто</div>
        @else
            <div class="header__two__profile__for__user">Записи</div>
            <div style="overflow-x:auto;">
                <table class="table__custom__profile__for__user">
                    <thead>
                    <tr>
                        <th>Дата</th>
                        <th>Время</th>
                        <th>Размер</th>
                        <th>Стиль</th>
                        <th>Статус</th>
                        <th style="width: 212px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        @if($record->date->date > date('Y-m-d H:i:s'))
                        <tr>
                            <td>{{ date("d.m.Y", strtotime($record->date->date)) }}</td>
                            <td>{{ date("H:i", strtotime($record->time->time)) }}</td>
                            <td>{{ $record->size->size }}</td>
                            <td>{{ $record->style->style }}</td>
                            <td>{{ $record->status->status }}</td>
                            <td>
                                @if ($record->status_id === 1 && $record->date->date > date('Y-m-d H:i:s'))
                                    <form method="POST" action="{{route('user.deleteRecord', $record->id)}}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn__for__destroy__profile">Отменить запись
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection
