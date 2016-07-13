<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 7/3/16
 * Time: 9:48 PM
 */

$title = 'Send Tasks';
include(dirname(__DIR__) . "/layout.php");
?>

<div class="col-lg-12">
    <div class="col-lg-6">
        <form class="form-signin" action="/tasks/addTasks" method="post">
            <h4 class="form-signin-heading">Send someone a task</h4>


            <label for="for_user_email" class="">Email of the person that the task is for</label>
            <input type="email" name="for_user_email" id="for_user_email" class="form-control"
                   placeholder="joe@email.com" required autofocus>

            <label for="task_name" class="">Task name</label>
            <input type="text" name="task_name" id="task_name" class="form-control"
                   placeholder="Vacuum" required maxlength="140">

            <label for="description" class="">Short description (optional)</label>
            <input type="text" name="description" id="description" class="form-control"
                   placeholder="Vacuum all rooms and the hall." maxlength="140">

            <label for="star_value" class="">Star value of this task</label>
            <input type="number" name="star_value" id="star_value" class="form-control"
                   placeholder="10" step="1" min="0" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Send task</button>

            <p class="lead"></p>
        </form>
    </div>
    <div class="col-lg-6">
        <h4>Tasks you still want completed</h4>
        <table class="table">
            <thead>
            <tr>
                <th>Task</th>
                <th>For</th>
                <th>Sent on</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($args as $task): ?>
                <tr>
                    <td class="task_name"><?php echo htmlspecialchars($task['task_name']); ?></td>
                    <td class="for_user_email"><?php echo htmlspecialchars($task['name']); ?></td>
                    <td class="date"><?php $date = date_create($task['time_created']); echo htmlspecialchars(date_format($date, 'm/d/y')); ?></td>
                    <td class="delete"> <form action="/tasks/deleteTasks" method="POST">
                            <input type="hidden"  name="task_id" value="<?php echo htmlspecialchars($task['id'], ENT_COMPAT, 'UTF-8'); ?> " >
                            <button type="submit" class="pull-right btn btn-link" 
                                    onclick="return confirm('Delete the task: <?php echo htmlspecialchars($task['task_name']); ?>')">
                                <span class="glyphicon glyphicon-trash" title="DELETE"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>

<?php include(dirname(__DIR__) . "/footer.php"); ?>
