@extends('layouts.admin_app')

@section('title', 'Клиенты')

@section('content')
    <section class="section__for__users__admin">

        <div class="block__for__header__for__users__admin">
            <div class="header__section__for__content__users__index__admin">Клиенты</div>
            <div> @include('include.flash_admin') </div>
        </div>

        <form method="GET" action="{{route('admin.users.searchUser')}}" class="form__for__custom__search__users" autocomplete="off">
            <div class="container__box__for__custom__search__users">
                <span class="icon__container__box__for__custom__search__users"><i class="fa fa-search"></i></span>
                <input type="search" id="search" aria-label="Search" name="search" aria-describedby="search-addon"
                       oninput="this.form.submit()" value="{{old('search')}}" placeholder="Найти клиента...">
            </div>
        </form>

        <div>
            <table class="table__custom__users__for__admin">
                <thead>
                <tr>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Номер телефона</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach((old('users') ?? $users) as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{'+' . substr($user->numberOfPhone, 0, 1) . '(' . substr($user->numberOfPhone, 1, 3) . ')' . substr($user->numberOfPhone, 4, 3) . '-' . substr($user->numberOfPhone, 7, 2) . '-' . substr($user->numberOfPhone, 9, 2) }}</td>
                        <td style="width: 270px;"><a href="{{route('admin.users.show', $user)}}"
                                                     class="btn__for__edit__admin">Подробнее о клиенте</a>
                        </td>
                        <td style="width: 136px;">
                            <form method="POST"
                                  action="{{route('admin.users.destroy', $user->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn__for__destroy__admin">Удалить
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
