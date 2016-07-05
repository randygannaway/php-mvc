<?php
$title = "Profile";
include(dirname(__DIR__) . "/layout.php");
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">

            <h1 class="page-header">Welcome <?php echo $_SESSION['user']['name']; ?></h1>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Profile settings</h3>
                </div>
                <div class="panel-body">
                    <ul>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="badge"><a href="/home"><?php echo $_SESSION['user']['name']; ?></a></span>
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
        </div>
    </div>
</div>

<?php include(dirname(__DIR__) . "/footer.php"); ?>
