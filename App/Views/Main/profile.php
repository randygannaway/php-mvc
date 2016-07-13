<?php
$title = "Profile";
include(dirname(__DIR__) . "/layout.php");
?>

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Profile settings</h3>
    </div>
    <div class="panel-body">
        <ul>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge"><a href="/home"><?php echo htmlspecialchars($_SESSION['user']['name'], ENT_COMPAT, 'UTF-8'); ?></a></span>
                    Name
                </li>
                <li class="list-group-item">
                    <span class="badge">14</span>
                    Email
                </li>
                <li class="list-group-item">
                    <span class="badge">14</span>
                    Password
                </li>
                <li class="list-group-item">
                    <span class="badge">14</span>
                    ???
                </li>
                <li class="list-group-item">
                    <span class="badge">14</span>
                    ???
                </li>
            </ul>
        </ul>
    </div>

</div>

<?php include(dirname(__DIR__) . "/footer.php"); ?>
