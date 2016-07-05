<?php
$title = "Dashboard";
include(dirname(__DIR__) . "/layout.php");
git ?>

    <h1 class="page-header"><?php echo $_SESSION['user']['name']; ?>'s Dashboard</h1>
    <h4>You have earned: <?php echo $args[0]; ?> stars!</h4>
    <h4>Your current available tasks are:</h4>
    <ul>
        <?php foreach ($args[1] as $task): ?>
            <li><?php echo $task['task_name']; ?></li>
        <?php endforeach; ?>
    </ul>

<?php include(dirname(__DIR__) . "/footer.php"); ?>