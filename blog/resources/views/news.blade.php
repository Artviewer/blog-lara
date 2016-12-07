@extends('layouts.app')
@section('content')
    <!-- Bootstrap шаблон... -->
    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода --
        @include('common.errors')
    <!--Текущие задачи -->
    @if (count($news) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Блог
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th>Заголовок</th>
                    <th>Обновлено</th>
                    <th>Действие</th>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($news as $item)
                        <tr>
                            <!-- Имя задачи -->
                            <td class="table-text">
                                <div>{{ $item->title }}</div>
                            </td>
                           <td><div>{{ $item->updated_at }}</div></td>
                            <td>
                                <!-- Кнопка подробнее -->
                                <form action="/concretnews/{{ $item->id }}" method="POST">
                                    {{ csrf_field() }}
                                    <button  class='btn btn-success'>Читать подробнее</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @endif
@endsection