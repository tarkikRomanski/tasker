<?php $user_data = unserialize($_COOKIE['user']) ?>
<nav class="navbar navbar-light bg-faded m-b-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p class="navbar-brand"><?=$user_data['name']?></p>
                <p id="signout" class="btn btn-danger pull-sm-right">Выйти</p>
            </div>
            <div class="col-sm-12">
                <div class="text-xs-center" id="progress-caption">Прогресс выполнения плана на сегодня</div>
                <progress class="progress progress-striped progress-info" value="0" max="100" aria-describedby="progress-caption"></progress>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-warning text-xs-center m-b-3">Tasker</h1>
        </div>
        <div class="col-sm-4">
            <div class="row bg-primary p-t-2 p-b-2">
                <div class="col-sm-12">
                    <h2 class="text-xs-center">Добавить задание:</h2>
                </div>
                <div class="col-sm-12">
                    <textarea id="newTask" rows="4" class="form-control"></textarea>
                </div>
                <div class="col-sm-12">
                    <button id="addNewTask" class="btn btn-success btn-block m-t-1">Добавить</button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button class="btn btn-warning btn-block m-t-1" id="voiceAllTasks">Озвучить все таски</button>
                </div>
            </div>
        </div>
        <div class="col-sm-8 p-t-2 p-b-2 bg-inverse">
            <h3 class="text-xs-center">Таски на сегодня:</h3>
            <table class="table">
                <thead>
                <tr>
                    <td>Задание</td>
                    <td style="width: 20%;">Статус</td>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="js/tasks.js"></script>

<script>
    showAllTask();
    speak('Привет, ' + $('.navbar-brand').html());

    $('#signout').click(function () {
        $.get(
            'controller/UsersController.php',
            {
                s:'logOut'
            },
            function () {
                    location.href = 'index.php';
            }
        );
    });
</script>