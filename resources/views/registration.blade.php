@extends('layouts.master')
@section('title')Регистрация@endsection
@section('content')
    @include('includes.message')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <br>
            <br>
            <br>
            <form action="{{ route('signup') }}" method="post" class="form-group rounded" enctype="multipart/form-data" style="border: solid 1px" >
                <input class="form-control" type="text" name="event" value="A" placeholder="Введите событие">
                <input class="form-control" type="text" name="surname" value="Голик" placeholder="Введите фамилию">
                <input class="form-control" type="text" name="name" value="George" placeholder="Введите имя">
                <input class="form-control" type="text" name="tel" value="9144279109" placeholder="Введите телефон">
                <input class="form-control" type="text" name="email" value="test@test.com" placeholder="Введите email">
                <input class="form-control" type="password" name="pass" value="123456" placeholder="Введите пароль">
                <input class="form-control" type="text" name="education" value="Высшее" placeholder="Введите уровень образования">
                <input type="file" name="image" class="text-center form-control-file" id="image">
                <input class="offset-4 btn btn-info" type="submit" value="Зарегистрироваться"/>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>

    </div>
    <script>
        var token = '{{ Session::token() }}';
    </script>
@endsection
