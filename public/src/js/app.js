// $(document).ready(function() {
//     $("img").mouseover(function() {
//         $(this).animate({height: "28%"},100);
//     })
//     $("img").mouseleave(function() {
//         $(this).animate({height: "23%"},100);
//     })
// });
//
// $(document).ready(function() {
//     $('img').click(function () {
//         $(this).nivoZoom();
//     })
// })

// $(window).load(function() {
//     $('body').nivoZoom();
// });

// $(document).ready(function() {
//     $('img').click(function() {
//         $(this).littleLightBox();
//     });
// })

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.lightbox').littleLightBox({
        openMethod: 'changeIn',
        closeMethod: 'elasticOut'
    });

    $('#signin').click(function () {
        $('#form_signup').animate({opacity: 0}, 500);
        $('#form_signin').animate({opacity: 1}, 500);
        $('#form_signup').hide();
        $('#form_signin').show();

    });
    $('#signup').click(function () {
        $('#form_signin').animate({opacity: 0}, 500);
        $('#form_signup').animate({opacity: 1}, 500);
        $('#form_signin').hide();
        $('#form_signup').show();
    });

    $('.dropdown-item').click(function () {
        $("#dropdownMenuButton").text(this.text);
    });
    //Регистрация
    $('#form_signup').on('submit', function(e) {
        e.preventDefault();
        var form = new FormData();
        alert($('#dropdownMenuButton').text());
        form.append('event', $('#event').val());
        form.append('surname', $('#surname').val());
        form.append('name', $('#name').val());
        form.append('tel', $('#tel').val());
        form.append('email', $('#email').val());
        form.append('pass', $('#pass').val());
        form.append('education', $('#dropdownMenuButton').text())
        form.append('_token', $('#_token').val());
        form.append('image',$('#image')[0].files[0]);

        $.ajax({
            type: 'post',
            url: '/signup',
            data: form,
            contentType: false,
            enctype: "multipart/form-data",
            cache: false,
            processData: false,
            success: function (html) {
                $('#form_signin').animate({opacity: 0}, 500);
                $('#form_signup').animate({opacity: 0}, 500);
                $('#form_signup').hide();
                $('#form_signin').hide();
                $('#header').html(html);
                alert("Вы успешно зарегистрированы");
                //Карточка
                $('#ava').click(function(e) {
                    e.preventDefault()
                    if($('#ava_form').is(':visible')) {
                        $('#ava_form').animate({height: "0px"}, 300);
                        $('#ava_form').hide(300);
                    }
                    else {
                        $('#ava_form').animate({height: "360px"}, 300);
                        $('#ava_form').show(300);
                    }
                });
                $('#navbar').click(function(e) {
                    e.preventDefault();
                    if($('#ava_form').is(':visible')) {
                        $('#ava_form').animate({height: "0px"}, 300);
                        $('#ava_form').hide(300);
                    }
                });

                //logoff
                $('#logoff').click(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: '/logout',
                        type: 'get',
                        contentType: false,
                        enctype: "multipart/form-data",
                        cache: false,
                        processData: false,
                        success: function (html) {
                            $('#header').html(html);
                        }
                    });
                });
                // alert("Файл успешно добавлен");
            },
            error: function(jqXHR) {
                str_err="";
                i=1;
                var err = jqXHR.responseJSON;
                $.each(err.errors, function(k,v) {
                    str_err+= (i++) + '. ' + v + '\n';
                });
                alert(jqXHR.responseJSON.message + ':\n' + str_err);
            }
        });
    });

    //Авторизация
    $('#form_signin').on('submit', function(e) {
        e.preventDefault();
        var form = new FormData();
        form.append('email_in', $('#email_in').val());
        form.append('pass_in', $('#pass_in').val());
        form.append('_token', $('#_token').val());

       $.ajax({
            url: '/signin',
            type: 'post',
            data: form,
            contentType: false,
            dataType: 'json',
            enctype: "multipart/form-data",
            cache: false,
            processData: false,
           success: function (response) {
                if(response.message == '1') {
                    $('#form_signin').animate({opacity: 0}, 500);
                    $('#form_signup').animate({opacity: 0}, 500);
                    $('#form_signup').hide();
                    $('#form_signin').hide();
                    $('#header').html(response.view);
                    //Карточка
                    $('#ava').click(function (e) {
                        e.preventDefault()
                        if ($('#ava_form').is(':visible')) {
                            $('#ava_form').animate({height: "0px"}, 300);
                            $('#ava_form').hide(300);
                        }
                        else {
                            $('#ava_form').animate({height: "360px"}, 300);
                            $('#ava_form').show(300);
                        }
                    });
                    $('#navbar').click(function (e) {
                        e.preventDefault();
                        if ($('#ava_form').is(':visible')) {
                            $('#ava_form').animate({height: "0px"}, 300);
                            $('#ava_form').hide(300);
                        }
                    });
                    //logoff
                    $('#logoff').click(function (e) {
                        e.preventDefault();
                        $.ajax({
                            url: '/logout',
                            type: 'get',
                            // dataType: 'json',
                            contentType: false,
                            enctype: "multipart/form-data",
                            cache: false,
                            processData: false,
                            success: function (html) {
                                // console.log('123');
                                $('#header').html(html);
                            }
                        });
                    });
                    //Админка обновить
                    $('#update').click(function() {
                        $("a img").css({"box-shadow": "0 0 10px rgba(255,0,0,1)"});
                        $("a").removeClass('lightbox thumbnail');
                        $("a img").addClass('img-responsive');
                        $("a.col-md-3.col-sm-3 img").click(function (e) {
                            e.preventDefault();
                            // // console.log(e.target.src);
                            $('#edit-modal').modal();
                            var image = e.target.cloneNode();
                            $('#post-body img').remove();
                            $('#post-body').append(image);
                            $('#post-body img').addClass('img-responsive');
                            $('#post-body img').css({'height': '200px'});
                            $('.modal-backdrop').css({'background': '0'});
                            console.log($('#post-body img').length);
                            return false;
                        })

                    });
                    alert("Вы авторизованы");
                } else {
                    alert("Вас нет в базе. Зарегистрируйтесь чтобы войти.");
                }

           },error: function(jqXHR) {
               str_err="";
               i=1;
               var err = jqXHR.responseJSON;
               $.each(err.errors, function(k,v) {
                   str_err+= (i++) + '. ' + v + '\n';
               });
               alert(jqXHR.responseJSON.message + ':\n' + str_err);
           }

       });

    });

    //Карточка
    $('#ava').click(function(e) {
        e.preventDefault()
        if($('#ava_form').is(':visible')) {
            $('#ava_form').animate({height: "0px"}, 300);
            $('#ava_form').hide(300);
        }
        else {
            $('#ava_form').animate({height: "360px"}, 300);
            $('#ava_form').show(300);
        }
    });
    $('#navbar').click(function(e) {
        e.preventDefault();
        if($('#ava_form').is(':visible')) {
            $('#ava_form').animate({height: "0px"}, 300);
            $('#ava_form').hide(300);
        }
    });

    //logoff
    $('#logoff').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: '/logout',
            type: 'get',
            contentType: false,
            enctype: "multipart/form-data",
            cache: false,
            processData: false,
            success: function(html) {
                $('#header').html(html);
            },
            error: function(e) {
                i=1;
                str_err="";
                var err=e.responseJSON;
                $.each(err, function (k,v) {
                    str_err=(i++) + '. ' + v + '\n';
                });
                alert(err.responseJSON.message + ":\n" + str_err);
            }
        });
    });

    //Админка обновить
    $('#update').click(function() {
        $("a img").css({"box-shadow": "0 0 10px rgba(255,0,0,1)"});
        $("a").removeClass('lightbox thumbnail');
        $("a img").addClass('img-responsive');
        $("a.col-md-3.col-sm-3 img").click(function (e) {
            e.preventDefault();
            // // console.log(e.target.src);
            $('#edit-modal').modal();
            var image = e.target.cloneNode();
            $('#post-body img').remove();
            $('#post-body').append(image);
            $('#post-body img').addClass('img-responsive');
            $('#post-body img').css({'height': '200px'});
            $('.modal-backdrop').css({'background': '0'});
            console.log($('#post-body img').length);
            return false;
        })

    });
    //Админка сохранить
    $('#save').click(function(e) {
        e.preventDefault();
        $("a img").css({"box-shadow": " 0 0 10px rgba(0,0,0,0)"});
        console.log(e.target);
        $("a img").removeClass('img-responsive');
        $("a.col-md-3.col-sm-3").addClass('lightbox thumbnail');
        $('#edit-modal').removeAttr('img');
        $("a.lightbox.thumbnail").click(function(e) {
            e.preventDefault();
            return true;
        });
    });

    //Удаление участников
    $('td input').click(function(e) {
        e.preventDefault();
        var $tr = e.target.parentNode.parentNode.childNodes[3].textContent;
        console.log($tr);
        $.ajax({
            url: '/deleteUser',
            type: 'get',
            data:  { 'id_user': $tr, 'token': $('#_token').val()},
            // contentType: false,
            // dataType: 'json',
            // enctype: "multipart/form-data",
            // cache: false,
            // processData: false,
            success: function() {
                alert('Запись удалена');
            }
        });
    })

    // $("#file").change(function() {
    //     var file = this.files[0];
    //     var fileType = file.type;
    //     var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'image/jpeg', 'image/png', 'image/jpg'];
    //     if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
    //         alert('Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.');
    //         $("#file").val('');
    //         return false;
    //     }
    // });
});
function signin(e) {
    e.preventDefault();
    $('#form_signup').animate({opacity: 0}, 500);
    $('#form_signin').animate({opacity: 1}, 500);
    $('#form_signup').hide();
    $('#form_signin').show();
}

function signup(e) {
    e.preventDefault();
    $('#form_signin').animate({opacity: 0}, 500);
    $('#form_signup').animate({opacity: 1}, 500);
    $('#form_signin').hide();
    $('#form_signup').show();
}
