$('.lim40').change(function () {
    if($(this).val().length < 40) {
        if(!$(this).hasClass('form-control-success')) {
            $(this).parent().removeClass('has-danger');
            $(this).removeClass('form-control-danger');
            $(this).parent().addClass('has-success');
            $(this).addClass('form-control-success');
            $(this).parent().find('.form-control-feedback').html('');
        }
    } else {
        if(!$(this).hasClass('form-control-danger')) {
            $(this).parent().removeClass('has-success');
            $(this).removeClass('form-control-success');
            $(this).parent().addClass('has-danger');
            $(this).addClass('form-control-danger');
            $(this).parent().find('.form-control-feedback').html(LIM40);
            speak(LIM40);
        }
    }
});

$('#confirmUserPass').change(function(){
    if($(this).val() == $('#newUserPass').val()){
        if(!$(this).hasClass('form-control-success')) {
            $(this).parent().removeClass('has-danger');
            $(this).removeClass('form-control-danger');
            $(this).parent().addClass('has-success');
            $(this).addClass('form-control-success');
            $(this).parent().find('.form-control-feedback').html(CONFIRM);
            speak(CONFIRM);
        }
    } else {
        if(!$(this).hasClass('form-control-danger')) {
            $(this).parent().removeClass('has-success');
            $(this).removeClass('form-control-success');
            $(this).parent().addClass('has-danger');
            $(this).addClass('form-control-danger');
            $(this).parent().find('.form-control-feedback').html(NOCONFIRM);
            speak(NOCONFIRM);
        }
    }
});

$('#reg').submit(function () {
    var status = false;
    var inputs = $(this).find('input');

    inputs.each(function(){
        if($(this).hasClass('form-control-danger')){
            status = true;
        }
        if($(this).val() == '' || $(this).val() == ' '){
            status = true;
            if(!$(this).hasClass('form-control-danger')) {
                $(this).parent().removeClass('has-success');
                $(this).removeClass('form-control-success');
                $(this).parent().addClass('has-danger');
                $(this).addClass('form-control-danger');
                $(this).parent().find('.form-control-feedback').html(EMPTY_FIELD);
            }
        }
    });

    if(status)
        speak(ERR_FIELD);
    else {
        $.get(
            'controller/UsersController.php',
            {
                s:'newUser',
                name: $('#newUserName').val(),
                nickname: $('#newUserNickname').val(),
                password: $('#newUserPass').val()
            },
            function (data) {
                    alert(data);
            }
        );
    }

    return false;
});

$('#signin').submit(function () {
    $.get(
        'controller/UsersController.php',
        {
            s:'signIn',
            nickname: $('#userNickname').val(),
            password: $('#userPass').val()
        },
        function (data) {
            if(data == '9')
                location.href = 'index.php';
            else
                alert(data);
        }
    );
    return false;
});