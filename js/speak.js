var speak = function (text) {
    $.get(
        'controller/SpeakerController.php',
        {
            text: text
        },
        function (data) {
            if($('#response').length == 0)
                $('body').append('<div id="response"></div>');
            $('#response').html(data);
        }
    );
};