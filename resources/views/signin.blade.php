@extends('layouts.master')
@section('title')Регистрация@endsection
@section('content')
    @include('includes.message')
    <div class="row">
        <div class="col-md-6">
            <br>
            <br>
            <br>
            <br>
            <br>
            <form action="" method="get" class="form-group rounded" enctype="multipart/form-data" style="border: solid 1px" >
                <input class="form-control" type="text" name="email" value="test@test.com" placeholder="Введите email">
                <input class="form-control" type="password" name="pass" value="123456" placeholder="Введите пароль">
                <input class="offset-4 btn btn-info" type="submit" value="Войти"/>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
        <div class="col-md-6">
            <h3 class="text-center">Ваше фото</h3>
            <a  href="{{ route('getUserFile', ['filename' => 'George-1.jpg'])  }}"><img class="lightbox thumbnail img img-fluid rounded col-md-6 col-md-offset-3" src="{{ route('getUserFile', ['filename' => 'George-1.jpg'])  }}" alt=""></a>
        </div>
    </div>
@endsection
