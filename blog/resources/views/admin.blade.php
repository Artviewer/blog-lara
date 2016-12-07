@extends('layouts.app')
@section('content')
    <!-- Bootstrap шаблон... -->
    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода --
        @include('common.errors')
    <!-- Форма новой задачи -->
        <form action="/admin" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <!-- Заголовок -->
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Заголовок</label>

                <div class="col-sm-6">
                    <input type="text" name="title" id="title" class="form-control">
                </div>
            </div>
            <!-- Текст -->
            <div class="form-group">
                <label for="text" class="col-sm-3 control-label">Статья</label>

                <div class="col-sm-6">
                    <textarea name="text" id="title" class="form-control" placeholder="Введите текст для статьи"></textarea>
                </div>
            </div>
            <!-- Кнопка добавления задачи -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Добавить статью
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!--Текущие задачи -->
    @if (count($news) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Текущие задачи
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th>Задача</th>
                    <th>Действие</th>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($news as $item)
                        <tr>
                            <!-- Имя задачи -->
                            <td class="table-text">
                                <div><h2>{{ $item->title }}</h2></div>
                                <div><i>{{ $item->text }}</i></div>
                            </td>

                            <td>
                                <!-- Кнопка редактировать -->
                                <form action="/admin/edit/{{ $item->id }}" method="POST">
                                    {{ csrf_field() }}
                                    <button  class='btn btn-success'>Редактировать</button>
                                </form>
                                <!-- Кнопка Удалить -->
                                <form action="/news/{{ $item->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button  class='btn btn-danger'>Удалить статью</button>
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