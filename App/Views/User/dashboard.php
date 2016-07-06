<?php
$title = "Dashboard";
include(dirname(__DIR__) . "/layout.php");
?>

    <h1 class="page-header"><?php echo htmlspecialchars($_SESSION['user']['name'], ENT_COMPAT, 'UTF-8'); ?>'s Dashboard</h1>
    <h4>You have earned: <?php echo $args[0]; ?> stars!</h4>
    <h4>Your current available tasks are:</h4>
    <ul>
        <?php foreach ($args[1] as $task): ?>
            <li><?php echo htmlspecialchars($task['task_name'], ENT_COMPAT, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>

<?php include(dirname(__DIR__) . "/footer.php"); ?>