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
            Редактировать Статью
        </div>
        <form action="admin/edit/{{ $news[0]->id }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $news[0]->id }}">
                    <!-- Заголовок -->
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Заголовок</label>

                <div class="col-sm-6">
                    <input type="text" name="title" id="title" class="form-control" value="{{ $news[0]->title }}">
                </div>
            </div>
            <!-- Текст -->
            <div class="form-group">
                <label for="text" class="col-sm-3 control-label">Статья</label>

                <div class="col-sm-6">
                    <textarea name="text" id="title" class="form-control">{{ $news[0]->text }}</textarea>
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
    <a href="/admin">Назад</a>
@endsection