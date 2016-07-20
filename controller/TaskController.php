<?php
require_once '../models/task.php';
$model = new Task();
?>

<?php if(isset($_GET['status'])):
    switch ($_GET['status']):
        case 'newTask':
            $model->newTask($_GET['text']);
            break;
        case 'allTask':
            $tasks = $model->getAllTask();
            foreach ($tasks as $task):?>
                <tr>
                    <td class="task-text" style="<?= ($task['status']==0)?'text-decoration:line-through':'' ?>"><?=$task['text']?></td>
                    <td class="row <?= ($task['status']==0)?'bg-danger':'bg-success';?> text-xs-center">
                        <i data-task="<?=$task['id']?>" class="col-sm-6 material-icons done" style="<?= ($task['status']==0)?'opacity:0':'' ?>">&#xE876;</i>
                        <i data-task="<?=$task['id']?>" class="col-sm-6 material-icons revive" style="<?= ($task['status']==1)?'opacity:0':'' ?>">&#xE8BA;</i>
                    </td>
                </tr>
        <?php endforeach;
            break;
        case 'todayTask':
            $tasks = $model->getTodayTasks();
            foreach ($tasks as $task):?>
                <tr>
                    <td class="task-text" style="<?= ($task['status']==0)?'text-decoration:line-through':'' ?>"><?=$task['text']?></td>
                    <td class="row <?= ($task['status']==0)?'bg-danger':'bg-success';?> text-xs-center">
                        <i data-task="<?=$task['id']?>" class="col-sm-6 material-icons done" style="<?= ($task['status']==0)?'opacity:0':'' ?>">&#xE876;</i>
                        <i data-task="<?=$task['id']?>" class="col-sm-6 material-icons revive" style="<?= ($task['status']==1)?'opacity:0':'' ?>">&#xE8BA;</i>
                    </td>
                </tr>
            <?php endforeach;
            break;
        case 'doneTask':
            $model->closeTask($_GET['id']);
            break;
        case 'reviveTask':
            $model->openTask($_GET['id']);
            break;
    endswitch;
endif; ?>
