$('#voiceAllTasks').click(function () {
    var allTaskString = "";
    var n = 1;
    $('.task-text').each(function () {
        if (!$(this).parent().hasClass('complete'))
            allTaskString += '!!' + n + '. ' + $(this).html();
        n++;
    });
    speak(allTaskString);
});

var showAllTask = function () {
    $.get(
        './controller/TaskController.php',
        {
            status: 'todayTask'
        },
        function (data) {
            $('tbody').html(data);
            $('.done').click(function () {
                var id = $(this).attr('data-task');
                $.get(
                    './controller/TaskController.php',
                    {
                        status: 'doneTask',
                        id: id
                    },
                    function () {
                        speak('Поздравляю! Таск выполнено');
                        showAllTask();
                    }
                );
            });
            $('.revive').click(function () {
                var id = $(this).attr('data-task');
                $.get(
                    './controller/TaskController.php',
                    {
                        status: 'reviveTask',
                        id: id
                    },
                    function () {
                        speak('Таск возобвленно');
                        showAllTask();
                    }
                );
            });
        }
    );

};

var showArhiveTask = function () {
    $.get(
        './controller/TaskController.php',
        {
            status: 'allTask'
        },
        function (data) {
            $('tbody').html(data);
            $('.done').click(function () {
                var id = $(this).attr('data-task');
                $.get(
                    './controller/TaskController.php',
                    {
                        status: 'doneTask',
                        id: id
                    },
                    function () {
                        showAllTask();
                    }
                );
            });
            $('.revive').click(function () {
                var id = $(this).attr('data-task');
                $.get(
                    './controller/TaskController.php',
                    {
                        status: 'reviveTask',
                        id: id
                    },
                    function () {
                        showAllTask();
                    }
                );
            });
        }
    );

};

$('#addNewTask').click(function () {
    $.get(
        './controller/TaskController.php',
        {
            status: 'newTask',
            text: $('#newTask').val()
        },
        function () {
            $('#newTask').val('');
            showAllTask();
            speak('Таск добавлен');
        }
    );
});