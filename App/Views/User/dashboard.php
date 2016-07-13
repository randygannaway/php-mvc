<?php
$title = "Dashboard";
include(dirname(__DIR__) . "/layout.php");
?>

<h1 class="page-header"><?php echo htmlspecialchars($_SESSION['user']['name'], ENT_COMPAT, 'UTF-8'); ?>'s Dashboard</h1>

<div class="col-lg-12">
    <div id="starGraph" class="col-lg-6">
<!-- TODO add total stars to this-->
        <h4>A look at the last 7 days:</h4>
        <canvas id="myChart"></canvas>

    </div>
    <div id="taskList" class="col-lg-6 list-group">
        <h4>Tasks for you to complete</h4>
        <table class="table">
            <thead>
            <tr>
                <th>Task</th>
                <th>Created On</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($args[1] as $task): ?>
                <tr>
                    <td class="task_name"><?php echo htmlspecialchars($task['task_name']); ?></td>
                    <td class="date"><?php $date = date_create($task['time_created']); echo htmlspecialchars(date_format($date, 'm/d/y')); ?></td>
                    <td class="complete">
                        <form action="/tasks/changeTasks" method="POST">
                            <input type="hidden"  name="task_id" value="<?php echo htmlspecialchars($task['id'], ENT_COMPAT, 'UTF-8'); ?>" >
                                <button type="submit" class="pull-right btn btn-link"
                                        onclick="return confirm('Complete the task: <?php echo htmlspecialchars($task['task_name']); ?>')">
                                    <span class="glyphicon glyphicon-thumbs-up" title="complete"></span>
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

<?php include("js/dashboardScripts.php"); ?>
