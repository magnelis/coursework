@extends('layouts.admin_app')

@section('title', $user->name)

@section('content')
    <section class="section__for__users__admin">

        <div class="block__for__header__for__users__admin">
            <div class="header__section__for__content__users__index__admin"> Подробнее о клиенте </div>
            <a href="{{route('admin.users')}}" class="btn__return__to__back_admin"> Назад </a>
        </div>

        <div class="block__for__content__more__user__admin">
            <div class="info__user__block__for__content__more__user__admin">
                <div class="block__custom__input__more__user__admin">
                    <label for="size" class="label__custom__input__more__user__admin"
                           style="margin-top: 0"> Имя </label>
                    <input type="text" class="custom__input__more__user__admin" value="{{ $user->name }}" disabled>
                </div>

                <div class="block__custom__input__more__user__admin">
                    <label for="size" class="label__custom__input__more__user__admin"> Email </label>
                    <input type="text" class="custom__input__more__user__admin" value="{{ $user->email }}" disabled>
                </div>

                <div class="block__custom__input__more__user__admin">
                    <label for="size" class="label__custom__input__more__user__admin"> Номер телефона </label>
                    <input type="text" class="custom__input__more__user__admin"
                           value="{{'+' . substr($user->numberOfPhone, 0, 1) . '(' . substr($user->numberOfPhone, 1, 3) . ')' . substr($user->numberOfPhone, 4, 3) . '-' . substr($user->numberOfPhone, 7, 2) . '-' . substr($user->numberOfPhone, 9, 2) }}"
                           disabled>
                </div>
            </div>

            <div class="header__table__custom__record__more__user__admin">Записи</div>

            @if(count($records) === 0)
                <div></div>
            @else
                <table class="table__custom__record__more__user__admin">
                    <thead>
                    <tr>
                        <th>Дата</th>
                        <th>Время</th>
                        <th>Стиль</th>
                        <th>Размер</th>
                        <th>Статус</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>{{ date("d.m.Y", strtotime($record->date->date)) }}</td>
                            <td>{{ date("H:i", strtotime($record->time->time)) }}</td>
                            <td>{{ $record->style->style }}</td>
                            <td>{{ $record->size->size }}</td>
                            <td style="width: 150px;">{{ $record->status->status }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>
@endsection
