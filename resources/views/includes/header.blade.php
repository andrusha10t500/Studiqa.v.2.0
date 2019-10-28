<header id="header" class="">
    <nav id="navbar">
        {{--<form action="" class="navbar container-fluid">--}}
            @if(Auth::user())
                <div class="row">
                    @if(Auth::user()->note == 'admin')

                        <a id="update" class="col-md-1 btn btn-success">Изменить</a>
                        <a id="save" class="col-md-1 btn btn-success">Сохранить</a>
                        <p class="col-md-6 col-md-offset-1" style="color: white; font-size: 30px; text-align: center">Панель Администратора</p>
                        <img id="ava" height="50px" class="img-fluid img-rounded col-md-offset-1"
                             src="{{ Auth::user()->file ? route('getUserFile', ['filename' => Auth::user()->file]) : 'empty_photo.png' }}" alt="" />
                        <a id="logoff" class="btn btn-success" >Выход</a></div>
                    @else
                    <img id="ava" height="50px" class="img-fluid img-rounded col-md-offset-10"
                         src="{{ Auth::user()->file ? route('getUserFile', ['filename' => Auth::user()->file]) : 'empty_photo.png' }}" alt="" />
                    <a id="logoff" class="btn btn-success" >Выход</a></div>
                    @endif
            <div class="row" id="ava_form" hidden>
                <div  class="row col-md-4 col-md-offset-2" style="position: relative" >
                    <form method="post" class="form-group rounded col-md-6" enctype="multipart/form-data" style="box-shadow: 0 0 10px rgba(0,0,0,0.5); padding: 2px;" >
                        <label class="badge" for="event">Мероприятие:  <input class="form-control" type="text" name="event" value="{{ Auth::user()->event }}" disabled></label>
                        <label class="badge" for="surname">Фамилия:  <input class="form-control" type="text" name="surname" value="{{ Auth::user()->surname }}" disabled></label>
                        <label class="badge" for="name">Имя:  <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}" disabled></label>
                        <label class="badge" for="phone">Телефон:  <input class="form-control" type="text" name="phone" value="{{ Auth::user()->phone }}" disabled></label>
                        <label class="badge" for="education">Образование:  <input class="form-control " type="text" name="education" value="{{ Auth::user()->education }}" disabled></label>
                        <label class="badge" for="ip_adress">ip-Адрес:  <input class="form-control" type="text" name="ip_adress" value="{{ Auth::user()->ip_adress }}" disabled></label>
                    </form>
                </div>
                <div class="col-md-4 text-center">
                    <h3 class="" style="color: white; " id="img_label" for="image_ava" >Ваше фото</h3>
                    <img  height="300px" class="img-rounded " name="image_ava" id="image_ava" src="{{ Auth::user()->file ? route('getUserFile', [Auth::user()->file]) : 'empty_photo.png' }}" alt="">
                </div>
            </div>

            @else
                <input class="btn btn-success col-md-offset-9" type="button" id="signin"  onclick="signin(event)" value="Войти" />
                <input class="btn btn-success" type="button" id="signup" onclick="signup(event)" value="Зарегистрироваться"/>
                {{--<a class="btn btn-success col-md-offset-9" id="signin">Войти</a>--}}
                {{--<a class="btn btn-success" id="signup">Зарегистрироваться</a>--}}
            @endif
    </nav>
</header>

