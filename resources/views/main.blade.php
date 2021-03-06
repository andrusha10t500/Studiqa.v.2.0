@extends('layouts.master')
@section('title')Главная@endsection
@section('content')
    @include('includes.message')
    <div class="col-md-8">
        <br>
        <br>
        <h1 class="text-center">Главная</h1>
        <div class="row">
            <a href="cadaver.jpg" class="lightbox thumbnail col-md-3 col-sm-3" data-littlelightbox-group="gallery"><img src="cadaver.jpg"
                                                                                  class="img-fluid img-rounded" alt="" /></a>
            <a href="bones.jpg" class="lightbox thumbnail col-md-3 col-sm-3" data-littlelightbox-group="gallery"><img src="bones.jpg"
                                              class="img-fluid img-rounded" alt="" /></a>
            <a href="orbb.jpg" class="lightbox thumbnail col-md-3 col-sm-3" data-littlelightbox-group="gallery"><img src="orbb.jpg"
                                                                                  class="img-fluid img-rounded" alt="" /></a>
            <a href="hunter.jpg" class="lightbox thumbnail col-md-3 col-sm-3" data-littlelightbox-group="gallery"><img src="hunter.jpg"
                                                                                    class="img-fluid img-rounded" alt="" /></a>
        </div>
        <br>
        <div class="row">

            <a href="phobos.jpg" class="lightbox thumbnail col-md-3 col-sm-3" data-littlelightbox-group="gallery"><img src="phobos.jpg"
                                                                                  class="img-fluid img-rounded" alt="" /></a>
            <a href="demia.jpg" class="lightbox thumbnail col-md-3 col-sm-3" data-littlelightbox-group="gallery"><img src="demia.jpg"
                                                                                  class="img-fluid img-rounded" alt="" /></a>
            <a href="uriel.jpg" class="lightbox thumbnail col-md-3 col-sm-3" data-littlelightbox-group="gallery"> <img src="uriel.jpg"
                                                                                  class="img-fluid img-rounded" alt=""/></a>
            <a href="xaero.jpg" class="lightbox thumbnail col-md-3 col-sm-3" data-littlelightbox-group="gallery"> <img src="xaero.jpg"
                                                                                  class="img-fluid img-rounded" alt=""/></a>
        </div>
        <br />
        <div class="row">

            <a href="gorre.jpg" class="lightbox thumbnail col-md-3 col-sm-3" data-littlelightbox-group="gallery"> <img src="gorre.jpg"
                                                                                   class="img-fluid img-rounded" alt=""/></a>
            <a href="razor.jpg" class="lightbox thumbnail col-md-3 col-sm-3" data-littlelightbox-group="gallery"> <img src="razor.jpg"
                                                                                   class="img-fluid img-rounded" alt=""/></a>
            <a href="sarge.jpg" class="lightbox thumbnail col-md-3 col-sm-3" data-littlelightbox-group="gallery"> <img src="sarge.jpg"
                                                                                   class="img-fluid img-rounded" alt=""/></a>
            <a href="grunt.jpg" class="lightbox thumbnail col-md-3 col-sm-3" data-littlelightbox-group="gallery"> <img src="grunt.jpg"
                                                                                   class="img-fluid img-rounded" alt=""/></a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="col-md-offset-1 text-center" id="form_signup" style="margin-top: 8%; " hidden>
            <form method="post" class="form-group rounded" enctype="multipart/form-data" style=" box-shadow: 0 0 10px rgba(0,0,0,0.5); padding: 2px;" >
                <input class="form-control" type="text" name="event" id="event" placeholder="Введите событие (A или B)">
                <input class="form-control" type="text" name="surname" id="surname"  placeholder="Введите фамилию">
                <input class="form-control" type="text" name="name" id="name"  placeholder="Введите имя">
                <input class="form-control" type="text" name="tel" id="tel" placeholder="Введите телефон">
                <input class="form-control" type="text" name="email" id="email"  placeholder="Введите email">
                <input class="form-control" type="password" name="pass" id="pass" placeholder="Введите пароль">
                <div class="dropdown" class="form-control" style="border: solid 1px; color: #2aabd2; border-radius: 5px">
                    <button name="education" class="form-control btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Выберите уровень образования
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="btn dropdown-item" style="text-decoration: none;" >Bachelor</a><br>
                        <a class="btn dropdown-item" style="text-decoration: none;" >Master</a><br>
                        <a class="btn dropdown-item" style="text-decoration: none;" >PhD</a>
                    </div>
                </div>
                <input type="file" class="form-control-file" name="image" id="image">
                {{--<input onclick="signup()" class="col-md-offset-3 col-md-6 btn btn-info" type="button" value="Зарегистрироваться"/>--}}
                <input class="col-md-offset-3 col-md-6 btn btn-info" type="submit" value="Зарегистрироваться"/>
                <input type="hidden" name="_token" id="_token"  value="{{ Session::token() }}">
            </form>
        </div>
        <div class="col-md-offset-1 text-center" id="form_signin" style="margin-top: 8%" hidden>
            <form method="post" class="form-group rounded" enctype="multipart/form-data" style=" box-shadow: 0 0 10px rgba(0,0,0,0.5); padding: 2px;" >
                <input class="form-control" type="text" name="email_in" id="email_in"  placeholder="Введите email">
                <input class="form-control" type="password" name="pass_in" id="pass_in" placeholder="Введите пароль">
                <input class="col-md-offset-4 col-md-4 btn btn-info" type="submit" value="Войти"/>
                <input type="text" name="_token" id="_token" value="{{ Session::token() }}" hidden />
            </form>
        </div>
        @if(Auth::user())
            @if(Auth::user()->note == "admin")
                @include('admin')
            {{--модалка--}}
                <div class="modal" tabindex="-1" role="dialog" id="edit-modal" style="opacity: 1; top: 5%;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-content="modal" aria-label="Close"></button>
                                <h4 class="modal-title">Заменить картинку</h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="col-md-8" id="post-body" >
                                        <label for="post-body">Edit the post</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="btn btn-info col-md-8" type="file" value="Поменять" style="margin-top: 100px;">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer text-center" style="border: solid 1px gray">
                                {{--<button type="button" class="btn btn-primary" id="change" data-dismiss="modal">Change</button>--}}
                                {{--<input type="file" class="btn btn-primary col-md-4" value="Change"/>--}}
                                {{--<button type="button" class="btn btn-primary col-md-4" id="modal-save">Save changes</button>--}}
                                <button type="button" class="btn btn-default col-md-2" id="close" data-dismiss="modal" style="margin-top: 50px;">Close</button>
                                <button type="button" class="btn btn-default col-md-1 col-md-offset-1" id="close" data-dismiss="modal" style="margin-top: 50px;"> Ok</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>
@endsection

