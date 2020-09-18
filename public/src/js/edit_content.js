$(document).ready(function () {
    $('#B_event').click(function () {
        var url=$('#B_event').text() == 'Событие А' ? '/A_event' : '/B_event';
        $.ajax({
            url: url,
            type: 'get',
            contentType: false,
            enctype: "multipart/form-data",
            cache: false,
            processData: false,
            success: function (html) {
                // плавный эффект
                $("body").css("display", "none");

                $("body").fadeIn(2000);

                $("a.transition").click(function(event){
                    event.preventDefault();
                    linkLocation = this.href;
                    $("body").fadeOut(1000, redirectPage);
                });

                function redirectPage() {
                    window.location = linkLocation;
                }
                $('body').html(html);
                $('#B_event').text(url=='/A_event' ? 'Событие Б' : 'Событие А');
            }
        })
    })

    $('#content_image').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: '/edit_content',
            type: 'post',
            data: { file: $('#content_image')[0].files[0] },
            contentType: false,
            enctype: "multipart/form-data",
            cache: false,
            processData: false,
            success: function(html) {

            }
        })

    });

});
