$(document).ready(function () {
    $('#saveSnipet').on('click', function () {
        var id = $('#snipId').prop('value');
        var data = {
            js: window.localStorage.getItem('js'),
            css: window.localStorage.getItem('css'),
            html: window.localStorage.getItem('html'),
            id: id
        };
        $.ajax({
            method: "POST",
            url: window.location.protocol + '//' + window.location.host + "/public/create/save",
            cache: false,
            data: data
        })
        .done(function( msg ) {
            alert( "Data Saved: " + msg );
            console.log( msg );
        });
    });

    $("#next-bottom").on("click", "a", function (event) {
        event.preventDefault();

        var id = $(this).attr('href'),

            top = $(id).offset().top;

        $('body, html').animate({scrollTop: top}, 1500);
    });

    particlesJS.load('particles-js', window.location.protocol + '//' + window.location.host + '/public/assets/particles.json', function () {
    });
});