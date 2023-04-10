@extends('layouts.admin_app')

@section('title', 'Рабочее время')

@section('content')
    <section class="section__for__time__admin">

        <div class="block__for__header__for__time__admin">
            <div class="header__section__for__content__time__index__admin">Рабочее время</div>
            <div> @include('include.flash_admin') </div>
        </div>

        <div class="block__for__btn__for__add__time__admin">
            <a href="{{ route('admin.time.create')  }}" class="btn__for__add__admin"> Добавить время </a>
        </div>

        <table class="table__custom__time__for__admin">
            <thead>
            <tr>
                <th>Время</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach((old('times') ?? $times) as $time)
                <tr>
                    <td>{{ date("H:i", strtotime($time->time)) }}</td>
                    <td style="width: 130px;">
                        <form method="POST" action="{{route('admin.time.destroy', $time->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn__for__destroy__admin">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </section>
@endsection

