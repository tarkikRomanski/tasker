<?php
require_once '../models/task.php';
$model = new Task();
?>

<?php if(isset($_GET['status'])):
    $user_data = unserialize($_COOKIE['user']);
    switch ($_GET['status']):
        case 'newTask':
            $model->newTask($_GET['text'], $user_data['id']);
            break;
        case 'allTask':
            $tasks = $model->getAllTask($user_data['id']);
            if($tasks !== null):
                foreach ($tasks as $task):?>
                    <tr class="<?= ($task['status']==0)?'complete':'' ?>">
                        <td class="task-text" style="<?= ($task['status']==0)?'text-decoration:line-through':'' ?>"><?=$task['text']?></td>
                        <td class="row <?= ($task['status']==0)?'bg-danger':'bg-success';?> text-xs-center">
                            <i data-task="<?=$task['id']?>" class="col-sm-6 material-icons done" style="<?= ($task['status']==0)?'display: none':'' ?>">&#xE876;</i>
                            <i data-task="<?=$task['id']?>" class="col-sm-6 material-icons revive" style="<?= ($task['status']==1)?'display: none':'' ?>">&#xE8BA;</i>
                        </td>
                    </tr>
            <?php endforeach;
            endif;
            break;
        case 'todayTask':
            $tasks = $model->getTodayTasks($user_data['id']);
            if($tasks !== null):
            foreach ($tasks as $task):?>
                <tr class="<?= ($task['status']==0)?'complete':'' ?>">
                    <td class="task-text" style="<?= ($task['status']==0)?'text-decoration:line-through':'' ?>"><?=$task['text']?></td>
                    <td class="row <?= ($task['status']==0)?'bg-danger':'bg-success';?> text-xs-center">
                        <i data-task="<?=$task['id']?>" class="col-sm-6 material-icons done" style="<?= ($task['status']==0)?'display: none':'' ?>">&#xE876;</i>
                        <i data-task="<?=$task['id']?>" class="col-sm-6 material-icons revive" style="<?= ($task['status']==1)?'display: none':'' ?>">&#xE8BA;</i>
                    </td>
                </tr>
            <?php endforeach;
                endif;
            break;
        case 'doneTask':
            $model->closeTask($_GET['id']);
            break;
        case 'reviveTask':
            $model->openTask($_GET['id']);
            break;
    endswitch;
endif; ?>
