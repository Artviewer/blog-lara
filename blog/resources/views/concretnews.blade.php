@extends('layouts.app')
@section('content')
    <!-- Bootstrap шаблон... -->
    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода --
        @include('common.errors')
            @var_dump($news)
    <!--Выбранная статья -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Текущие задачи
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                        <tr>
                            <td class="table-text">
                                <div><h2>{{ $news[0]->title }}</h2></div>
                                <div><i>{{ $news[0]->text }}</i></div>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
        <a href="http://lara-blog.dev/">Назад</a>
@endsection