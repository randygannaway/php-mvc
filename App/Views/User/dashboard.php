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
        <h4>Your current available tasks are:</h4>
            <?php foreach ($args[1] as $task): ?>

                <li href="#" class="list-group-item">
                    <?php echo htmlspecialchars($task['task_name'], ENT_COMPAT, 'UTF-8'); ?>
                    <span class="did-it"><a href="#">Did it!</a></span>
                </li>
            <?php endforeach; ?>
    </div>
</div>


<?php include(dirname(__DIR__) . "/footer.php"); ?>

<!--THIS needs to be separate and included-->
<?php include("js/dashboardScripts.php"); ?>
