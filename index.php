﻿<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tasker</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>

    <style>
        i {
            cursor: pointer;
        }
        
        i:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-warning text-xs-center m-b-3">Tasker</h1>
        </div>
        <div class="col-sm-4 p-t-2 p-b-2 bg-primary">
            <div class="row">
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

<script>

    var showAllTask = function () {
        $.get(
            './controller/TaskController.php',
            {
                status:'todayTask'
            },
            function (data) {
                $('tbody').html(data);
                $('.done').click(function () {
                    var id = $(this).attr('data-task');
                    $.get(
                        './controller/TaskController.php',
                        {
                            status:'doneTask',
                            id:id
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
                            status:'reviveTask',
                            id:id
                        },
                        function () {
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
                status:'allTask'
            },
            function (data) {
                $('tbody').html(data);
                $('.done').click(function () {
                    var id = $(this).attr('data-task');
                    $.get(
                        './controller/TaskController.php',
                        {
                            status:'doneTask',
                            id:id
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
                            status:'reviveTask',
                            id:id
                        },
                        function () {
                            showAllTask();
                        }
                    );
                });
            }
        );

    };

    showAllTask();

    $('#addNewTask').click(function () {
        $.get(
            './controller/TaskController.php',
            {
                status:'newTask',
                text:$('#newTask').val()
            },
            function (data) {
                alert('Таск добавлен');
                showAllTask();
            }
        );
    });

</script>

</body>
</html>